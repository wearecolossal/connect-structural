<?php

/*
|--------------------------------------------------------------------------
| Pages Routes
|--------------------------------------------------------------------------
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
Route::get('projects/{category_id?}/{category_name?}/{single_id?}/{single_name?}', 'PagesController@projects');
//CONTACT
Route::get('contact', 'PagesController@contact');

/*
|--------------------------------------------------------------------------
| Admin Section
|--------------------------------------------------------------------------
*/

//LOGIN ROUTES
Route::resource('login', 'SessionsController');
//LOGOUT
Route::get('logout', 'SessionsController@destroy');
//ADMIN HOMEPAGE
Route::get('admin', 'AdminController@index');
//GET SINGLE PROJECT
Route::get('admin/project/{id}', 'AdminController@project');
//DELETE PROJECT PHOTO
Route::get('admin/project/photo/{id}/delete', 'AdminController@deletePhoto');
//HASH PASSWORD
Route::get('hash-password/{password}', 'AdminController@hashPassword');



//404 AND ERROR
App::missing(function($exception)
{
    return Response::view('pages.404', array(), 404);
});