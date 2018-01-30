<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /*
     This controller is meant for handling pages request,
     not every page is handled by this controller, because some of them
     (eg.createPublication,createGroup...) are handled in the respective resource controller
    */

    public function landingPage(){

        return view('Pages.landing');
    }

    public function dashboard(){
        
        return view('Pages.dashboard');
    }

}
