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
    $authors = array("AAA", "BBB", "CCC", "DDD");
    $topics = array("top1", "top2", "top3", "top4", "top5");
    $data = array('authors' => $authors, 'topics' => $topics);
   
    return view('Pages.Publication.createPublication',$data);
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
