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
        $publicationList = Auth::user()->publications->where('public',1)->sortByDesc('year')->take(5);
        return view('Pages.Publication.list', ['publicationList'=>$publicationList] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorList = Author::all()->sortBy('last_name');
        $topicList = Topic::all()->sortBy('title');
        $selfAuthor = Auth::user();
        return view('Pages.Publication.create', ['authorList' => $authorList, 'topicList' => $topicList, 'selfAutor' => $selfAuthor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        /*
        *Create new publications
        * for all fields of the form fill the field of database
        * for all elements of the author field form input 
        */ 
        // TODO resolve the resubmission
       
        // Validation
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
        //$newPublication->ispublic = $request->input('ispublic'); add to the form in create.blade.php
        
        // TODO Handling Media
        $newPublication->multimedia_path = "path/to/multimedia";


        $newPublication->save();

        // Handling Publication Details
        switch ($newPublication->type){
            case 'journal':
                $newJournal = new Journal;
                
                $newJournal->abstract = $request->input('journal_abstract');
                $newJournal->volume = $request->input('journal_volume');
                $newJournal->number = $request->input('journal_number');
                $newJournal->pages = $request->input('journal_pages');
                $newJournal->key = $request->input('journal_key');
                $newJournal->doi = $request->input('journal_doi');
                $newJournal->ee = $request->input('journal_ee');
                $newJournal->url = $request->input('journal_url');
                
                $newJournal->publication_id = $newPublication->id;
                $newJournal->save();
                break;

            case 'conference':
                $newConference = new Conference;
            
                $newConference->abstract = $request->input('conference_abstract');
                $newConference->pages = $request->input('conference_pages');
                $newConference->days = $request->input('conference_days');
                $newConference->key = $request->input('conference_key');
                $newConference->doi = $request->input('conference_doi');
                $newConference->ee = $request->input('conference_ee');
                $newConference->url = $request->input('conference_url');
                
                $newConference->publication_id = $newPublication->id;
                $newConference->save();
                break;

            case 'editorship':
                $newEditorship = new Editorship;
            
                $newEditorship->abstract = $request->input('editorship_abstract');
                $newEditorship->volume = $request->input('editorship_volume');
                $newEditorship->publisher = $request->input('editorship_publisher');
                $newEditorship->key = $request->input('editorship_key');
                $newEditorship->doi = $request->input('editorship_doi');
                $newEditorship->ee = $request->input('editorship_ee');
                $newEditorship->url = $request->input('editorship_url');
                
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
        //Add the auth as self author
        $newPublication->users()->attach(Auth::user()->id);

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
        $publication = Auth::user()->publications->where('id',$id);
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
        $publication = Auth::user()->publications->where('id',$id)->first();
        return view('Pages.Publication.edit', ['publication'=>$publication] );
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
        //
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
}
