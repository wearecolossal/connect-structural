<?php

class AdminController extends \BaseController {

	/**
	  * PAGE VIEW
	  * ---------
	  * Admin Homepage
	  *
	  **/
	public function index()
	{
		//Check If Logged in
		if(Auth::guest()) {
			return Redirect::to('/');
		}
		/*PAGE INCLUDES*/
		//Use the Projects Table
		$projects = Project::orderby('category_id', 'asc')->get();
	
		/*DISPLAY PAGE*/
		return View::make('admin.index', 
					 compact(
						 'projects' //Use the Projects Table
					 ));
	
	}
	
	/**
	  * PAGE VIEW
	  * ---------
	  * Admin Projects Section - Edit Single Project
	  *
	  **/
	public function project($id)
	{
		//Check If Logged in
		if(Auth::guest()) {
			return Redirect::to('/');
		}
		/*PAGE INCLUDES*/
		//Get Single Project
		$project = Project::find($id);
	
		/*DISPLAY PAGE*/
		return View::make('admin.project', 
					 compact(
						 'project' // Get Single Project
					 ));
	
	}
	
	/**
	  * NON-VIEW FUNCTION
	  * -----------------
	  * Delete Project Photo
	  *
	  **/
	public function deletePhoto($id)
	{
	
	    //Get Photo to Delete
	    $photo = ProjectPhoto::find($id);
	    $photo->delete();
	    
	    //return to page
	    return Redirect::back();
	
	}
	
	/**
	  * PAGE VIEW
	  * ---------
	  * Admin Pages Section
	  *
	  **/
	public function pages()
	{
		//Check If Logged in
		if(Auth::guest()) {
			return Redirect::to('/');
		}
		/*PAGE INCLUDES*/
	
	
		/*DISPLAY PAGE*/
	
	}
	
	/**
	  * NON-VIEW FUNCTION
	  * -----------------
	  * Hash Password
	  *
	  **/
	public function hashPassword($password)
	{
	
	    //Get Password from URL and hash it
	    $hash = Hash::make($password);
	    
	    //Show Password
	    return "Password Hashed: ".$hash;
	
	}

}
