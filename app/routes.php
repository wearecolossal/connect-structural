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
//NEW PROJECT PAGE
Route::get('admin/project/new', 'AdminController@newProject');
//CREATE NEW PROJECT
Route::post('admin/project/new', 'AdminController@createNewProject');
//GET SINGLE PROJECT
Route::get('admin/project/{id}', 'AdminController@project');
//GET SINGLE PROJECT - DRAFT
Route::get('admin/project/draft/{id}', 'AdminController@draftProject');
//GET SINGLE PROJECT - ARCHIVE
Route::get('admin/project/archive/{id}', 'AdminController@archiveProject');
//FEATURE A PROJECT
Route::get('admin/project/{id}/feature', 'AdminController@featureProject');
//EDIT PROJECT
Route::post('admin/project/{id}/edit', array('as' => 'project.edit', 'uses' => 'AdminController@editProject'));
//UPLOAD PROJECT PHOTO
Route::post('admin/project/photo/{id}/upload', array('as' => 'project.upload', 'uses' => 'AdminController@uploadPhoto'));
//DELETE PROJECT PHOTO
Route::get('admin/project/photo/{id}/delete', 'AdminController@deletePhoto');
//HASH PASSWORD
Route::get('hash-password/{password}', 'AdminController@hashPassword');



//404 AND ERROR
App::missing(function($exception)
{
    return Response::view('pages.404', array(), 404);
});