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

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/** Pages Controller Routes **/
Route::get('/', 'PagesController@landingPage');
Route::get('/tutorial', 'PagesController@tutorial');
Route::get('/about', 'PagesController@about');
Route::get('/memberProfile', 'PagesController@memberProfile');




/** User Routes **/
// Resource Controller
Route::resource('users','UserController',['except' => ['create', 'store']]);
// Ajax routes
Route::get('ajaxUserInfo', 'PublicationController@ajaxInfo');




/** Publication Routes **/
Route::resource('publications','PublicationController');
Route::get('syncronize','PublicationController@syncPublications');
// Ajax routes
Route::get('ajaxPublicationInfo', 'PublicationController@ajaxInfo');
Route::get('syncDBLP', 'PublicationController@syncDBLP');
Route::post('syncToCorman', 'PublicationController@syncToCorman');





/** Group Routes **/
Route::resource('groups','GroupController');
// Ajax routes
Route::get('ajaxGroupInfo', 'GroupController@ajaxInfo');




// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('signUp', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('signUp', 'Auth\RegisterController@register')->name('register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Notification
Route::get('/markAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
});
