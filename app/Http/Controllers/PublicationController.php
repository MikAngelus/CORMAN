<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Publication;
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
        $authorList = Author::all();
        $topicList = Topic::all();
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
        /*
        *Create new publications
        * for all fields of the form fill the field of database
        * for all elements of the author field form input 
        */

        $newPublication = new Publication;

        $newPublication->title = ucwords($request->input('title'));
        $newPublication->year = $request->input('publication_date');
        $newPublication->venue = ucwords($request->input('venue'));



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


        // Handling Authors TOFO continue to implemnt, make sure to extraxct from input the name
        // and last name and add 2 where clauses in and
        $authorInputList = $request->input('authors');
        foreach( $authorInputList as $authorKey => $authorInput ){
            $authorInput = strtolower($authorInput);
            //Search and retrieve the topic from db
            $author = Topic::where('name', $authorInput)->first();
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
        $publication = Auth::user()->publications->where('id',$id);
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
