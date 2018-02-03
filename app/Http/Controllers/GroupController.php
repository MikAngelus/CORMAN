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
        return view('Pages.Group.list', ['groupList' => $groupList]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newGroup = new Group;

        $newGroup->name = $request->input('name');
        $newGroup->description = $request->input('description');
        $newGroup->picture_path = $request->input('picture');
        $newGroup->public = $request->input('privacy-btn');
        $newGroup->save();

        // Adding the creator as admin of the group.
        $newGroup->users()->attach(Auth::id(), ['group_id' => $newGroup->id, 'role' => 'admin', 'state' => 'accepted', 'created_at' => now(), 'updated_at' => now()]);

        // Adding the list of topic
        $topicINList = $request->input('topic[]');
        foreach ($topicINList as $topicKey => $topicInput) {
            $topicInput = strtolower($topicInput);
            //Search and retrieve the topic from db
            $topic = Topic::where('name', $topicInput)->first();
            //Check if the topic is already in the db, otherwise create a new one and attach to the user
            if ($topic != null) {
                $newGroup->topics()->attach($topic->id);
            } else {
                $newTopic = new Topic;
                $newTopic->name = $topicInput;
                $newTopic->save();

                $newGroup->topics()->attach($newTopic->id);
            }
        }

        // Adding the list of members
        $userINList = $request->input('members[]');
        foreach ($userINList as $userIN) {
            $userIN = str_replace(' ', '', $userIN);
            $userDBList = User::all();
            foreach ($userDBList as $userDB) {
                $name = $userDB->last_name . $userDB->first_name;
                $name = str_replace(' ', '', $name);
                if (strcmp($name, $userIN) == 0) {
                    $newGroup->users()->attach($userDB->id, ['role' => 'member', 'state' => 'pending']);
                }
            }
        }

        // TODO handling private field $newGroup->isPrivate =
        // Handling user invitations


        // Handling user as admin

        // Handling users invitation tagging

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Replace with shares of publication-group-model
        $publicationList = Auth::user()->publications;
        $groupList = Auth::user()->groups;
        $group = Auth::user()->groups->where('id', $id)->first();
        return view('Pages.Group.detail', ['publicationList' => $publicationList, 'groupList' => $groupList, 'group' => $group]);
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
        $group = Auth::user()->groups->where('id', $id);
        return view('Pages.Group.edit', ['topicList' => $topicList, 'group' => $group]);

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
        //
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
}
