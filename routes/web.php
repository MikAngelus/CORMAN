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

Route::get('/', 'PagesController@landingPage');

Route::get('dashboard', 'PagesController@dashboard');




// @TODO Replace clousure based routes with resource controller routes

Route::get('/groups', function () {
    $groups = array("Group 1", "Group 2", "Group 3", "Group 4");
    $data = array('groups' => $groups);
    
    return view('Pages.Group.groups',$data);
});

Route::get('/pubblication', function () {
    return view('Pages.Pubblication.pubblication');
});

Route::get('/createPubblication', function () {
    $authors = array("AAA", "BBB", "CCC", "DDD");
    $topics = array("top1", "top2", "top3", "top4", "top5");
    $data = array('authors' => $authors, 'topics' => $topics);
   
    return view('Pages.Pubblication.createPubblication',$data);
});

Route::get('/signUp', function () {
    return view('Pages.signUp');
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

