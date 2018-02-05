<?php

namespace App\Http\Controllers;

use App\Notifications\GroupNotification;
use Illuminate\Support\Facades\Redirect;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $userList = User::where('id', '!=', Auth::id())->get()->sortBy('last_name');

        return view('Pages.Group.create', ['topicList' => $topicList, 'userList' => $userList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|unique:groups|alpha_num|max:255',
            'description' => 'bail|nullable|max:1620',
            'picture_path' => 'bail|image|nullable|max:255',

            'members.*' => 'required|distinct',
            'topics.*' => 'max:50',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        //dd($request->all());
        $newGroup = new Group;

        $newGroup->name = $request->input('name');
        $newGroup->description = $request->input('description');
        //$newGroup->picture_path = $request->input('picture');

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

        if ($request->input('visibility') == 'public') {
            $newGroup->public = 'public';
        } else {
            $newGroup->public = 'private';
        }


        //Increment count for the first member
        $newGroup->subscribers_count = 1;
        $newGroup->save();

        // Adding the creator as admin of the group.
        $newGroup->users()->attach(Auth::id(), ['group_id' => $newGroup->id, 'role' => 'admin', 'state' => 'accepted', 'created_at' => now(), 'updated_at' => now()]);

        // Adding the list of topic
        $topicINList = $request->input('topics');
        if (isset($topicINList)) {
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
        }
        // Adding the list of members
        $userINList = $request->input('users');
        if (isset($userINList)) {

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
        }

        //Notification
        auth()->user()->notify(new GroupNotification($newGroup));

        return redirect()->route('groups.show', ['id' => $newGroup->id]);
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
        $groupList = Auth::user()->groups->where('id', '<>', $id);
        $group = Auth::user()->groups->where('id', $id)->first();
        //TODO controllare "se è logico passare anche" ['group' => $group]
        return view('Pages.Group.detail', ['publicationList' => $publicationList, 'groupList' => $groupList, 'theGroup' => $group, 'group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Replace with shares of publication-group-model
        $publicationList = Auth::user()->publications;
        //$groupList = Auth::user()->groups;
        $group = Auth::user()->groups->where('id', $id)->first();
        $userList = User::where('id', '<>', Auth::user()->id)->get()->sortBy('last_name');
        $memberList = Group::find($id)->users->where('id', '<>', Auth::user()->id);
        $topicList = Group::find($id)->topics;
        return view('Pages.Group.edit', ['topicList' => $topicList, 'publicationList' => $publicationList, /*'groupList' => $groupList, */
            'group' => $group, 'userList' => $userList, 'memberList' => $memberList]);
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

        //dd($request->all());


        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|unique:groups|alpha_num|max:255',
            'description' => 'bail|nullable|max:1620',
            'picture_path' => 'bail|image|nullable|max:255',

            'members.*' => 'required|distinct',
            'topics.*' => 'max:50',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $group = Group::find($id);
        $group->name = $request->input('group_name');
        $group->description = $request->input('description');


        if (($request->hasFile('profile_photo'))) {
            $file = $request->file('profile_photo');
            if ($file->isValid()) {

                $hashName = "/" . md5($file->path() . date('c'));
                $fileName = $hashName . "." . $file->getClientOriginalExtension();
                $filePath = 'images/groups' . $fileName;
                Image::make($file)->fit(200)->save($filePath);
                $group->picture_path = $filePath;
            }
        }

        // Adding the list of topic
        $topicList = Group::find($id)->topics;


        // Adding the list of members
        $memberList = Group::find($id)->users->pluck('id');
        $newMemberList = collect($request->input('users'));

        $remove = $memberList->diff($newMemberList);
        $add = $newMemberList->diff($memberList);
/*
        $newMembers = array();
        foreach($add as $member){
            array_push($newMembers, [$member => ['role' => 'member']]);
        }
*/      
        
        $group->users()->detach($remove);
        $group->users()->attach($add);

        if ($request->input('visibility') == 'public') {
            $group->public = 'public';
        } else {
            $group->public = 'private';
        }
        $group->save();

        return redirect()->route('groups.show', ['id' => $group->id]);

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

    public function ajaxInfo(Request $request)
    {
        $topicList = Group::find($request->query('id'))->topics;
        $memberList = Group::find($request->query('id'))->users->where('id','<>',Auth::user()->id);
        $data = array('topicList' => $topicList, 'memberList' => $memberList);

        return response()->json($data);
    }
}
