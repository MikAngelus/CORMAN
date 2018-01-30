<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Affiliation;

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
        //
        $affiliationList = Affiliation::all()->sortBy('name');
        $roleList = Role::all();
        

        return view('Pages.signUp',[
         'affiliations' => $affiliationList,
         'roles' => $roleList
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
        
        // TODO replace with default path
        $newUser->picture = "path/to/the default/pic";
        $newUser->reference_link = "path/to/some/domain";

        // TODO handling affiliation not in the list

        //Search and retrieve the affiliation from db
        $affiliationInput = $request->input('affiliation');
        $affiliation = Affiliation::where('name',$affiliationInput)->first();
        //Check if the affiliation is already in the db, otherwise create a new one
        if( $affiliation != null){
            $newUser->affiliation_id = $affiliation;
        }
        else
        {
            $newAffiliation = new Affiliation;
            $newAffiliation->name = $affiliationInput;
            $newAffiliation->save();
            
            $newUser->affiliation_id = $newAffiliation->id;
        }
         
       
        //Set and retrieve the associated id with role name (from the form)
        $role = $request->input('role');
        $newUser->role_id = Role::where('name',$role)->first()->id;

         $newUser->save();
        
        
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
