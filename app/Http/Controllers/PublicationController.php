<?php

namespace App\Http\Controllers;

use Faker\Provider\File;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


use App\Publication;
use App\Journal;
use App\Conference;
use App\Editorship;
use App\Author;
use App\Topic;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $publicationList = Auth::user()->publications->sortByDesc('year');
        return view('Pages.Publication.list', ['publicationList' => $publicationList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorList = Author::all()->where('id', '!=', Auth::user()->author->id)->sortBy('last_name');
        $topicList = Topic::all()->sortBy('title');
        return view('Pages.Publication.create', ['authorList' => $authorList, 'topicList' => $topicList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        /*
        *Create new publications
        * for all fields of the form fill the field of database
        * for all elements of the author field form input 
        */
        // TODO resolve the resubmission

        // TODO completeValidation
        $validator = Validator::make($request->all(), [
            'title' => 'bail|required|filled|max:255',
            'publication_date' => 'bail|required|date',
            'venue' => 'bail|required|filled|max:255',
            'type' => 'bail|required|alpha|in:journal,conference,editorship|max:255',
            //'profilePic' => 'bail|image|max:15000',

            'authors.*' => 'required|filled',
            'topics.*' => 'filled|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('/publications/create')
                ->withErrors($validator)
                ->withInput();
        }


        // Create new publication
        $newPublication = new Publication;

        $newPublication->title = ucwords($request->input('title'));
        $newPublication->year = $request->input('publication_date');
        $newPublication->venue = ucwords($request->input('venue'));
        $newPublication->type = $request->input('type');

        if ($request->input('visibility') == 'public') {
            $newPublication->public = 1;
        } else {
            $newPublication->public = 0;
        }


        // TODO Handling Media
        //dd($request->all());
        $folderName = "/" . md5(date('c'));

        if ($request->hasFile('media_file[]')) {

            Storage::disk('mediaDisk')->put('gino', $request->file('media_file[]'));


        } elseif ($request->hasFile('pdf_file')) {

            Storage::disk('mediaDisk')->put('gino', $request->file('pdf_file[]'));


        } else {
            //do nothing;
        }

        $newPublication->multimedia_path = '' . $folderName;
        $newPublication->save();

        /*
                if (($request->hasFile('picture'))) {
                    $file = $request->file('picture');
                    if ($file->isValid()) {

                        $hashName = "/" . md5($file->path() . date('c'));
                        $fileName = $hashName . "." . $file->getClientOriginalExtension();
                        $filePath = 'images/groups' . $fileName;
                        Image::make($file)->fit(200)->save($filePath);
                        $newGroup->picture_path = $filePath;
                    }
                } else {
                    $newGroup->picture_path = '/images/groups/group_icon.png';
                    //TODO replace default path in database table
                }
        */


        // Handling Publication Details
        switch ($newPublication->type) {
            case 'journal':
                $newJournal = new Journal;

                $newJournal->abstract = $request->input('abstract');
                $newJournal->volume = $request->input('volume');
                $newJournal->number = $request->input('number');
                $newJournal->pages = $request->input('pages');
                $newJournal->key = $request->input('key');
                $newJournal->doi = $request->input('doi');
                $newJournal->ee = $request->input('ee');
                $newJournal->url = $request->input('url');

                $newJournal->publication_id = $newPublication->id;
                $newJournal->save();
                break;

            case 'conference':
                $newConference = new Conference;

                $newConference->abstract = $request->input('abstract');
                $newConference->pages = $request->input('pages');
                $newConference->days = $request->input('days');
                $newConference->key = $request->input('key');
                $newConference->doi = $request->input('doi');
                $newConference->ee = $request->input('ee');
                $newConference->url = $request->input('url');

                $newConference->publication_id = $newPublication->id;
                $newConference->save();
                break;

            case 'editorship':
                $newEditorship = new Editorship;

                $newEditorship->abstract = $request->input('abstract');
                $newEditorship->volume = $request->input('volume');
                $newEditorship->publisher = $request->input('publisher');
                $newEditorship->key = $request->input('key');
                $newEditorship->doi = $request->input('doi');
                $newEditorship->ee = $request->input('ee');
                $newEditorship->url = $request->input('url');

                $newEditorship->publication_id = $newPublication->id;
                $newEditorship->save();
                break;
        }


        // Handling topics
        $topicInputList = $request->input('topics');

        if(isset($topicInputList)) {
            foreach( $topicInputList as $topicKey => $topicInput ){
                $topicInput = strtolower($topicInput);
                //Search and retrieve the topic from db
                $topic = Topic::where('name', $topicInput)->first();
                //Check if the topic is already in the db, otherwise create a new one and attach to the user
                if($topic != null){
                    $newPublication->topics()->attach($topic->id);
                }
                else{
                    $newTopic = new Topic;
                    $newTopic->name = $topicInput;
                    $newTopic->save();

                    $newPublication->topics()->attach($newTopic->id);
                }
            }
        }
        // Handling Authors 
        //Add the user as self author
        $newPublication->users()->attach(Auth::user()->id);
        $newPublication->authors()->attach(Auth::user()->author->id); 


        //
        $authorInputList = $request->input('authors');
        if(isset($authorInputList)){    
            foreach( $authorInputList as $authorKey => $authorInput ){
                            
                //Search and retrieve the author from db
                $author = Author::where('name', $authorInput)->first();
                
                //Check if the author is already in the db, otherwise create a new one and attach to the user
                if($author != null){
                    $newPublication->authors()->attach($author->id);
                }
                else{
                    $newAuthor = new Author;
                    $newAuthor->name = $authorInput;
                    $newAuthor->save();

                    $newPublication->authors()->attach($newAuthor->id);
                }
            }
        }

        return redirect()->route('publications.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Auth::user()->publications->where('id', $id)->first();
        return view('Pages.Publication.modal', ['publication' => $publication]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topicList = Topic::all();
        //$authors = Auth::user()->publications->find($id)->first()->authors;
        $authors = Author::all()->where('id', '!=', Auth::user()->author->id)->sortBy('last_name');
        $publication = Auth::user()->publications->where('id',$id)->first();
        return view('Pages.Publication.edit', ['publication'=>$publication, 'authors'=>$authors, 'topicList'=>$topicList] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // TODO add validators


        // Retrieve the publication
        $publication = Publication::find($id);

        $publication->title = ucwords($request->input('title'));
        $publication->year = $request->input('pub_date');
        $publication->venue = ucwords($request->input('venue'));

        if ($request->input('visibility') == 'public') {
            $publication->public = 1;
        } else {
            $publication->public = 0;
        }

        // TODO Handling Media
        $publication->multimedia_path = "path/to/multimedia";

        $publication->save();

        // Handling add and deletion of publication authors
        $authorList = Author::all()->pluck('id');
        $publicationAuthorList = Publication::find($id)->authors->pluck('id');
        $newAuthorList = collect($request->input('authors'));

        
        $removeList = $publicationAuthorList->diff($newAuthorList); // get items to delete
        $addList = $newAuthorList->diff($publicationAuthorList); //intermediate result
        $createList = $addList->diff($authorList); // get items to create
        $addList = $addList->diff($createList); // get items to add

        //dd(['form' => $request->all(), 'rem' => $removeList, 'add' => $addList, 'create' => $createList]);

        $publication->authors()->detach($removeList);
        $publication->authors()->attach($addList);

        foreach($createList as $author){       
            $newAuthor = new Author;
            $newAuthor->name = $author;
            $newAuthor->save();

            $publication->authors()->attach($newAuthor);
        }



        // Handling add and deletion of publication topics
        $topicList = Topic::all()->pluck('id');
        $publicationTopicList = Publication::find($id)->topics->pluck('id');
        $newTopicList = collect($request->input('topics'));

        $removeList = $publicationTopicList->diff($newTopicList); // get items to delete
        $addList = $newTopicList->diff($publicationTopicList); //intermediate result
        $createList = $addList->diff($topicList); // get items to create
        $addList = $addList->diff($createList); // get items to add

        $publication->topics()->detach($removeList);
        $publication->topics()->attach($addList);

        foreach($createList as $topic){

            $newTopic = new Topic;
            $newTopic->name = $topic;
            $newTopic->save();

            $publication->topics()->attach($newTopic);
        }
      
        // Handling Publication Details
        switch ($publication->type) {
            case 'journal':
                $journal = $publication->details;

                $journal->abstract = $request->input('abstract');
                $journal->volume = $request->input('volume');
                $journal->number = $request->input('number');
                $journal->pages = $request->input('pages');
                $journal->key = $request->input('key');
                $journal->doi = $request->input('doi');
                $journal->ee = $request->input('ee');
                $journal->url = $request->input('url');

                $journal->publication_id = $publication->id;
                $journal->save();
                break;

            case 'conference':
                $conference = $publication->details;

                $conference->abstract = $request->input('abstract');
                $conference->pages = $request->input('pages');
                $conference->days = $request->input('days');
                $conference->key = $request->input('key');
                $conference->doi = $request->input('doi');
                $conference->ee = $request->input('ee');
                $conference->url = $request->input('url');

                $conference->publication_id = $publication->id;
                $conference->save();
                break;

            case 'editorship':
                $newEditorship = $publication->details;

                $newEditorship->abstract = $request->input('abstract');
                $newEditorship->volume = $request->input('volume');
                $newEditorship->publisher = $request->input('publisher');
                $newEditorship->key = $request->input('key');
                $newEditorship->doi = $request->input('doi');
                $newEditorship->ee = $request->input('ee');
                $newEditorship->url = $request->input('url');

                $newEditorship->publication_id = $publication->id;
                $newEditorship->save();
                break;
        }


        return redirect()->route('publications.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function syncDBLP(Request $request)
    {
        $count = 100;
        $client = new Client(['base_uri' => 'http://dblp.org/search/publ/api','timeout' =>5.0]);

        //sanitazing for dblp syntax and manually build the parameters' string
        $firstName = str_replace(" ","_",$request->query('first_name'));
        $lastName = str_replace(" ","_",$request->query('last_name'));
        $authName = $firstName.'_'.$lastName;
        $paramString="?q=author"."%3A".$authName."&format=json"."&h=".$count; 

        // Call dblp api and decode response as json
        $response = json_decode($client->request('GET',$paramString)->getBody(),true); #contact dblp web service restful api and get response
        $response=$response['result']['hits']['hit'];
        $pubList= array();
        //dd($response);

        // Clean up DBLP json response for our needs
        foreach($response as $publication){
            $authorList = '';
            $authors = $publication['info']['authors']['author'];
            
            if( is_array($authors) ){ 
                foreach( $authors as $author){
                    if($author === end($authors)){
                        $authorList .= $author; 
                    }
                    else
                    {
                        $authorList .= $author.', '; 
                    }
                }
                $publication['info']['authors'] = $authorList;
            }
            else{ // just one authors
                $publication['info']['authors'] = $authors;
            }
             
            array_push($pubList,$publication['info']);
        }

               
        $jsonInfo = array('data' => $pubList);
        //dd(json_encode($jsonInfo));
        return response()->json($jsonInfo);
    }

    public function syncToCorman(Request $request){
        
        
        foreach($request->all() as $publication){

            $newPublication = new Publication;
            
            $newPublication->title = ucwords($publication['title']);
           
            $date = new \DateTime();
            $date->setDate($publication['year'],1,1);
            $newPublication->year = $date;
            $newPublication->venue = ucwords($publication['venue']);
            $newPublication->public = 1;
            $newPublication->multimedia_path = "default/path/to/mutlimedia";
            $newPublication->type = 'journal';

        }

    }


    public function syncPublications()
    {

        return view('Pages.syncPublications',['user' => Auth::user()]);
    }

    public function ajaxInfo(Request $request)
    {
        $topicList = Publication::find($request->query('id'))->topics;
        $authorList = Publication::find($request->query('id'))->authors;//->where('id','!=',Auth::user()->author->id);
        $data = array('topicList' => $topicList, 'authorList' => $authorList);

        return response()->json($data);
    }
  
}
