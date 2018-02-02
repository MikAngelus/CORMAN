<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Topic;
use App\Group;


class GroupController extends Controller
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
        /* vedere todo dashboard pubblicazioni*/
        $groupList = Auth::user()->groups;
        return view('Pages.Group.list', [ 'groupList' => $groupList ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // Retrieve data from DB
        $topicList = Topic::all();
         
        return view('Pages.Group.create', ['topicList' => $topicList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newGroup = new Group;

        $newGroup->name = $request->input('name');
        $newGroup->description = $request->input('description');
       // TODO handling private field $newGroup->isPrivate = 
        // Handling user invitations


        // Handling user as admin

        // Handling users invitation tagging

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Replace with shares of publication-group-model
        $publicationList = Auth::user()->publications;
        $groupList = Auth::user()->groups;
        return view('Pages.Group.detail', ['publicationList'=>$publicationList, 'groupList'=>$groupList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $group = Auth::user()->groups->where('id',$id);
        return view('Pages.Group.edit');
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
