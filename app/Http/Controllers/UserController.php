<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Affiliation;
use App\Topic;


use DeepCopy\f006\A;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UserController extends Controller
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
        /* TODO: tenere conto che bisogna passare i dati dell'utente (immagine, ecc)*/
        $publicationList = Auth::user()->author->publications->sortByDesc('year')->take(5);
        /* TODO: vedere come ordinare gruppi (prima quelli di cui è admin, poi utente, ecc)*/
        $groupList = Auth::user()->groups->take(5);
        return view('Pages.User.dashboard', ['publicationList' => $publicationList, 'groupList' => $groupList]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('Pages.User.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roleList = Role::all();
        $affiliationList = Affiliation::all();
        $topicList = Topic::all()->diff($user->topics);
        return view('Pages.User.editUser', ['user' => $user, 'roleList' => $roleList,
            'affiliationList' => $affiliationList, 'topicList' => $topicList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //validation
        /*
        $validator = Validator::make($request->all(), [
            'first_name' => ['bail', 'required', 'regex:/^[A-Za-z\- ]+$/', 'max:255'], //Don't remove the space!
            'last_name' => ['bail', 'required', 'regex:/^[A-Za-z\-àéèìòù ]+$/', 'max:255'], //Don't remove the space!
            'email' => 'bail|required|email|max:255',
            'password' => 'bail|required|confirmed|max:255',
            'password_confirmation' => 'bail|required',
            'picture_path' => 'bail|image|max:15000',
            'role' => 'required|exists:roles,name',
            'personal_link' => 'bail|nullable|url|max:1620'
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.edit', ['id' => Auth::user()->id])
                ->withErrors($validator)
                ->withInput();
        }
*/
        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->birth_date = $request->input('dob');
        $user->email = $request->input('email');
        if ($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        }

        // Handling user picture
        if ($request->hasFile('user_pic')) {

            $file = $request->file('user_pic');

            if ($file->isValid()) {

                $hashName = "/" . md5($file->path() . date('c'));
                $fileName = $hashName . "." . $file->getClientOriginalExtension();
                $filePath = 'images/profilePictures' . $fileName;
                Image::make($file)->fit(200)->save($filePath);
                $user->picture_path = $filePath;
            }
        }

        // Handling add and deletion of publication topics
        $topicList = Topic::all()->pluck('id');
        $userTopicList = $user->topics->pluck('id');
        $newTopicList = collect($request->input('topics'));

        $removeList = $userTopicList->diff($newTopicList); // get items to delete
        $addList = $newTopicList->diff($userTopicList); //intermediate result
        $createList = $addList->diff($topicList); // get items to create
        $addList = $addList->diff($createList); // get items to add

        $user->topics()->detach($removeList);
        $user->topics()->attach($addList);

        foreach($createList as $topic){

            $newTopic = new Topic;
            $newTopic->name = $topic;
            $newTopic->save();

            $user->topics()->attach($newTopic);
        }

        
        $user->role_id = $request->input('role');;
        $user->affiliation_id = $request->input('affiliation');

        $user->reference_link = $request->input('url');

        $user->save();

        return Redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function ajaxInfo()
    {
        $user = Auth::user();
        
        $topicList = $user->topics;
        $role = $user->role;
        $affiliation = $user->affiliation;
        $data = array('topicList' => $topicList, 'role' => $role, 'affiliation' => $affiliation);

        return response()->json($data);
    }
}
