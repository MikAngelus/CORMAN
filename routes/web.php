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
Route::get('/publications', 'PagesController@publications');
Route::get('/groups', 'PagesController@groups');
Route::get('/groupDetail', 'PagesController@groupDetail');

//Resource Controllers
Route::resource('users','UserController');



// @TODO Replace clousure based routes with resource controller routes



Route::get('/createGroup', function () {
    return view('Pages.Group.createGroup');
});



Route::get('/editProfile', function () {
    return view('Pages.editProfile');
});

Route::get('/createPublication', function () {
    return view('Pages.Publication.createPublication');
});

Route::get('/signUp', function () {
    return view('Pages.signUp');
});

Route::get('/tutorial', function () {
    return view('Pages.tutorial');
});

Route::get('/publicationModal', function () {
    return view('Pages.publicationModal');
});

Route::get('/about', function () {
    return view('Pages.about');
});
