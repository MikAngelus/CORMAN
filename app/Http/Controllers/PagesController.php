<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;

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
        $publ_lis = (new User)::find(1)->publications;
        $gro_lis = (new Group)::all();
        return view('Pages.dashboard', ['publ_lis'=>$publ_lis, 'gro_lis'=>$gro_lis]);
    }

    public function publications(){
        $publication_list = (new User)::find(1)->publications;
        return view('Pages.Publication.publications', $dataPublication=array('publication_list'=>$publication_list));
    }

    public function groups(){
        $group_list = (new Group)::all();
        return view('Pages.Group.groups', $dataGroup=array('group_list'=>$group_list));
    }

    public function groupDetail(){
        $publ_list = (new User)::find(1)->publications;
        $gro_list = (new Group)::all();
        return view('Pages.Group.groupDetail', ['publ_list'=>$publ_list, 'gro_list'=>$gro_list]);
    }
}
