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

/** Pages Messages Routes **/
Route::get('/chat', 'MessagesController@index');
Route::get('/chat', 'MessagesController@stampa_utenti');
Route::get('/messages', 'MessagesController@search');
Route::get('/chat/profile/{id}', 'MessagesController@showuser');
Route::get('/chat/messages/{id}', 'MessagesController@show_messages');
Route::get('/chat/send/{id_to}/{message}', 'MessagesController@send');
Route::get('/chat/conversations/add/{id_to}', 'MessagesController@insert_conversations');
Route::get('/chat/conversations', 'MessagesController@show_conversations');
Route::get('/chat/seen/{id}', 'MessagesController@seen');
Route::get('/notifications_chat', 'MessagesController@show_notifications_chat');

//INSERIAMO LA ROUTE PER L'INVIO DI ALLEGATI
Route::get('/chat/send/attach/{id_to}/{attach}', 'MessagesController@send_attach');
//INSERIAMO LA RUOTE UTILE PER CARICARE I FILE NELLA CARTELLA UPLOADS
Route::post('/chat','MessagesController@showUploadFile');




/** Pages Controller Routes **/
Route::get('/', 'PagesController@landingPage')->name('landing');
Route::get('/tutorial', 'PagesController@tutorial');
Route::get('/sitemap', 'PagesController@sitemap');
Route::get('/memberProfile', 'PagesController@memberProfile');




/** User Routes **/
// Resource Controller
Route::resource('users','UserController',['except' => ['create', 'store']]);
// Ajax routes
Route::get('ajaxUserInfo', 'UserController@ajaxInfo');




/** Publication Routes **/
Route::resource('publications','PublicationController');
Route::get('syncronize','PublicationController@syncPublications');
// Ajax routes
Route::get('ajaxPublicationInfo', 'PublicationController@ajaxInfo');
Route::get('ajaxGetPublications', 'PublicationController@ajaxGetPublications');
Route::get('syncDBLP', 'PublicationController@syncDBLP');
Route::post('syncToCorman', 'PublicationController@syncToCorman');





/** Group Routes **/
Route::resource('groups','GroupController');
// Ajax routes
Route::get('ajaxGroupInfo', 'GroupController@ajaxInfo');
Route::post('share', 'GroupController@share');
Route::post('leave', 'GroupController@leave');




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
Route::resource('notifications/{id}','NotificationController');
