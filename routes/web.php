<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Publication;
use App\User;

// Controllers
Route::get('/', 'PagesController@landingPage');
Route::get('dashboard', 'PagesController@dashboard');

//Resource Controllers
Route::resource('users','UserController');



// @TODO Replace clousure based routes with resource controller routes

Route::get('/groups', function () {
    $groups = array("Group 1", "Group 2", "Group 3", "Group 4");
    $data = array('groups' => $groups);
    
    return view('Pages.Group.groups',$data);
});

Route::get('/publication', function () {
    return view('Pages.Publication.publication');
});

Route::get('/createGroup', function () {
    return view('Pages.Group.createGroup');
});

Route::get('/createPublication', function () {   
    return view('Pages.Publication.createPublication');
});

Route::get('/publications', function () {
    $publication_list = (new User)::find(1)->publications;
    return view('Pages.Publication.publications', $dataPub=array('publication_list'=>$publication_list));
});

Route::get('/signUp', function () {
    return view('Pages.signUp');
});

Route::get('/tutorial', function () {
    return view('Pages.tutorial');
});

Route::get('/about', function () {
    return view('Pages.about');
});

Route::get('/testSeedingDB', function () {
    
    $u = new App\User;

    $u->first_name = 'Giovanni';
    $u->last_name = 'Semeraro';
    $u->birth_date = '1978-10-23';
    
    $u->email = 'gsem@uniba.it';
    $u->password ='sasasnaisnasnpasiao';

    $u->picture ='path/to/somewhere';
    $u->affiliation_id = 1;
    $u->role_id = 2;

    $u->reference_link = 'http://www.goooooogle.com';

    $u->save();
});

