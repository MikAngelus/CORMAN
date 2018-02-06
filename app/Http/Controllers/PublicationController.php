<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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
        return view('Pages.Publication.list', ['publicationList'=>$publicationList] );
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
     * @param  \Illuminate\Http\Request  $request
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
        
        if($request->input('visibility') == 'public'){
            $newPublication->public = 1;
        }
        else{
            $newPublication->public = 0;
        }
                
        // TODO Handling Media
        $newPublication->multimedia_path = "path/to/multimedia";


        $newPublication->save();

        // Handling Publication Details
        switch ($newPublication->type){
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

        // Handling Authors 
        //Add the user as self author
        $newPublication->users()->attach(Auth::user()->id);
        $newPublication->authors()->attach(Auth::user()->author->id); 


        //
        $authorInputList = $request->input('authors');
        foreach( $authorInputList as $authorKey => $authorInput ){
            $authorInput = explode(' ',strtolower($authorInput),2); // split the string for first name and last name, conventions: last name after!
            
            //Search and retrieve the author from db
            $author = Author::where('last_name', $authorInput[0])->where('first_name',$authorInput[1])->first();
               
            
            //Check if the author is already in the db, otherwise create a new one and attach to the user
            if($author != null){
                $newPublication->authors()->attach($author->id);
            }
            else{
                $newAuthor = new Author;
                $newAuthor->first_name = $authorInput[1];
                $newAuthor->last_name = $authorInput[0];
                $newAuthor->save();

                $newPublication->authors()->attach($newAuthor->id);
            }
        }

        return redirect()->route('publications.index');

       
    }










    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Auth::user()->publications->where('id',$id)->first();
        return view('Pages.Publication.modal', ['publication'=>$publication] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
        
        if($request->input('visibility') == 'public'){
            $publication->public = 1;
        }
        else{
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
            $author = explode(' ',strtolower($author),2); // split first-last name
            
            $newAuthor = new Author;
            $newAuthor->last_name = $author[0];
            $newAuthor->first_name = $author[1]; 
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



















        //dd($publication);
        // Handling Publication Details
        switch ($publication->type){
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajaxInfo(Request $request)
    {
        $topicList = Publication::find($request->query('id'))->topics;
        $authorList = Publication::find($request->query('id'))->authors->where('id','!=',Auth::user()->author->id);
        $data = array('topicList' => $topicList, 'authorList' => $authorList);

        return response()->json($data);
    }
  
}
