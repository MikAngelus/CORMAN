<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Affiliation;
use App\Topic;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return 'all users here';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieve data for signUp view from DB
        $affiliationList = Affiliation::all()->sortBy('name');
        $roleList = Role::all();
        $topicList = Topic::all();
        

        return view('Pages.signUp',[
         'affiliations' => $affiliationList,
         'roles' => $roleList,
         'topics' => $topicList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * 
     * NOTES: 
     * -ucwords() is used for auto-capitalize strings for data normalization.
     * -strtolower() is used for data normalization.
     */
    public function store(Request $request)
    {
        // TODO use laravel's validation to validate fields
        // TODO fix form resubmission due to form error, now the inpt values doesn't persist
<<<<<<< HEAD
    
=======


>>>>>>> 13bfd9263180c3a2924905bda03f848ee9bfbb87
        $request->validate([
            'first_name' => ['bail','required','regex:/^[A-Za-z\- ]+$/','max:255'], //Don't remove the space!
            'last_name' => ['bail','required','regex:/^[A-Za-z\- ]+$/','max:255'], //Don't remove the space!
            'birth_date' => 'bail|required|date|after:01/01/1900|',
            'email' => 'bail|required|email|unique:users|max:255',
            'password' => 'bail|required|confirmed|max:255',
            'password_confirmation' => 'bail|required',
            'profilePic' => 'bail|image|max:15000',
            'role' => 'required|exists:roles,name',
            'affiliation' => 'required|filled',
            'topics.*' => 'filled|max:50',
            'personal_link' => 'bail|nullable|url|max:1620'

        ]);


        $newUser = new User;

        $newUser->first_name = ucwords($request->input('first_name'));
        $newUser->last_name = ucwords($request->input('last_name'));
        $newUser->birth_date = $request->input('birth_date');
        $newUser->email = $request->strtolower(input('email'));
        $newUser->password = bcrypt($request->input('password'));
        $newUser->reference_link = $request->input('personal_link');
        
        //Handling Profile picture  
        //TODO replace default path in database table
        //TODO implement image thumbnailization with some php library to save space
        if( $request->hasfile('profilePic') ){

            $file = $request->file('profilePic');
            if( $file->isValid() ){
                $newUser->picture_path = $file->store('/','profilePicturesDisk'); // store method return the stored file's name
            }
        }

        //Search and retrieve the affiliation from db
        $affiliationInput = ucwords($request->input('affiliation'));
        $affiliation = Affiliation::where('name',$affiliationInput)->first();
        //Check if the affiliation is already in the db, otherwise create a new one and attach to the user
        if( $affiliation != null){
            $newUser->affiliation_id = $affiliation->id;
        }
        else
        {
            $newAffiliation = new Affiliation;
            $newAffiliation->name = $affiliationInput;
            $newAffiliation->save();
            
            $newUser->affiliation_id = $newAffiliation->id;
        }
         
        //Set and retrieve the associated id with role name (from the form)
        $roleInput = $request->input('role');
        $newUser->role_id = Role::where('name',$roleInput)->first()->id;

        $newUser->save();

        // Handling topics  
        $topicInputList = $request->input('topics');
        foreach( $topicInputList as $topicKey => $topicInput ){
            $topicInput = strtolower($topicInput);
            //Search and retrieve the topic from db
            $topic = Topic::where('name', $topicInput)->first();
            //Check if the topic is already in the db, otherwise create a new one and attach to the user
            if($topic != null){
                $newUser->topics()->attach($topic->id);
            }
            else{
                $newTopic = new Topic;
                $newTopic->name = $topicInput;
                $newTopic->save();

                $newUser->topics()->attach($newTopic->id);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
