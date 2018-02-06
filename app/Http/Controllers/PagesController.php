<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Group;

class PagesController extends Controller
{
    /*
     This controller is meant for handling pages request,
     not every page is handled by this controller, because some of them
     (eg.createPublication,createGroup...) are handled in the respective resource controller
    */
    public function __construct()
    {
        $this->middleware('auth')->except(['landingPage','tutorial','about']);
    }

    public function landingPage(){
        return view('Pages.landing');
    }

    public function tutorial(){
        $publication=Auth::user()->publications->first();
        return view('Pages.tutorial', ['publication' => $publication]);
    }

    public function about(){
        return view('Pages.about');
    }

    public function memberProfile(){
        /* rivedere gli array */
        $user=Auth::user();
        $publicationList=Auth::user()->publications->sortByDesc('year');
        $groupList=Auth::user()->groups;
        return view('Pages.memberProfile', ['publicationList'=>$publicationList, 'groupList'=>$groupList, 'user'=>$user]);
    }
}
