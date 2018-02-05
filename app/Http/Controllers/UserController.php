<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Affiliation;
use App\Topic;


use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

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
        $publicationList = Auth::user()->publications->sortByDesc('year')->take(5);
        /* TODO: vedere come ordinare gruppi (prima quelli di cui è admin, poi utente, ecc)*/
        $groupList = Auth::user()->groups;
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
        return view('Pages.User.editUser', ['user' => $user, 'roleList' => $roleList,
            'affiliationList' => $affiliationList]);
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

        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->birth_date = $request->input('dob');
        $user->email = $request->input('email');
        if ($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        } else {
            $user->password = $user->password;
        }


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

        $roleid = Role::where('name', $request->input('role'))->first()->id;
        $user->role_id = $roleid;

        $affiliationid = Affiliation::where('name', $request->input('affiliation'))->first()->id;
        $user->affiliation_id = $affiliationid;

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

    public function syncPublications()
    {
    
        return view('Pages.syncPublications',['user' => Auth::user()]);
    }


    public function syncDBLP(Request $request)
    {
        $count = 10; 
        $client = new Client(['base_uri' => 'http://dblp.org/search/publ/api','timeout' =>5.0]);
        
        //sanitazing for dblp syntax and manually build the parameters' string
        $firstName = str_replace(" ","_",$request->query('first_name')); 
        $lastName = str_replace(" ","_",$request->query('last_name')); 
        $authName = $firstName.'_'.$lastName; 
        $paramString="?q=author"."%3A".$authName."&format=json"."&h=".$count; #

        // Call dblp api and decode response as json
        $response = json_decode($client->request('GET',$paramString)->getBody(),true); #contact dblp web service restful api and get response
        $response=$response['result']['hits']['hit'];
        $pubList= array();
        
        
        foreach($response as $publication){
            array_push($pubList,$publication['info']);
        }

        $jsonInfo = array('result' =>'OK','records' => $pubList);
        
        //dd(json_encode($jsonInfo)); 

        return response()->json($jsonInfo);
    }
}
