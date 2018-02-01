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
Route::get('/dashboard', 'PagesController@dashboard');
Route::get('/publications', 'PagesController@publications');
Route::get('/groups', 'PagesController@groups');
Route::get('/groupDetail', 'PagesController@groupDetail');

//Resource Controllers routes
Route::resource('users','UserController',['except' => ['index', 'create', 'store']]);

// Auth routes

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('signUp', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('signUp', 'Auth\RegisterController@register')->name('register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');




// @TODO Replace clousure based routes with resource controller routes

Route::get('/editPublication', function() {
    return view('Pages.Publication.editPublication');
});

Route::get('/createGroup', function () {
    return view('Pages.Group.createGroup');
});

Route::get('/editGroup', function () {
    return view('Pages.Group.editGroup');
});



Route::get('/editProfile', function () {
    return view('Pages.editProfile');
});

Route::get('/createPublication', function () {
    return view('Pages.Publication.createPublication');
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
