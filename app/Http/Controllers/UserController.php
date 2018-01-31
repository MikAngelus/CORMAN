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
     */
    public function store(Request $request)
    {
        // TODO use laravel's validation to validate fields
        $newUser = new User;

        $newUser->first_name = $request->input('first_name');
        $newUser->last_name = $request->input('last_name');
        $newUser->birth_date = $request->input('birth_date');
        $newUser->email = $request->input('email');
        $newUser->password = $request->input('password');
        $newUser->reference_link = "path/to/some/domain";
        
        //Handling Profile picture
        if( $request->hasfile('profilePic') ){
            $file = $request->file('profilePic');
            // TODO replace default path 
            if( $file->isValid() ){
                $path = $file->store('/','profilePicturesDisk');
                $newUser->picture_path = $path;

            }
            
        }
        
        

        //Search and retrieve the affiliation from db
        $affiliationInput = $request->input('affiliation');
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
