<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//HOMEPAGE
Route::get('/', 'PagesController@index');
//ABOUT US
Route::get('about', 'PagesController@about');
//MEET OUR TEAM
Route::get('team', 'PagesController@team');
//SERVICES & REGISTRATION
Route::get('services', 'PagesController@services');
//PROJECTS
Route::get('projects/{filter?}/{single?}', 'PagesController@projects');
//CONTACT
Route::get('contact', 'PagesController@contact');

//404 AND ERROR
App::missing(function($exception)
{
    return Response::view('pages.404', array(), 404);
});