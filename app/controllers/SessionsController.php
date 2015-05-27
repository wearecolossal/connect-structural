<?php

class SessionsController extends \BaseController {

	/**
	  * PAGE VIEW
	  * ---------
	  * Login Page
	  *
	  **/
	public function index()
	{
	
		/*PAGE INCLUDES*/
	
	
		/*DISPLAY PAGE*/
		return View::make('admin.auth.login');
	
	}


	/**
	  * NON-VIEW FUNCTION
	  * -----------------
	  * Set Status as Logged In
	  *
	  **/
	public function store()
	{
	
	    //Get All Inputs
	    $input = Input::all();
	    
	    //Save the username and password and check if exists in User Table
	    $username = $input['username'];
	    $password = $input['password'];
	    
	    //If Successful, log in to admin, else show errors
	    if(Auth::attempt(array('username' => $username, 'password' => $password))) {
		    
		    return Redirect::to('admin');
		    
	    } else {
		    return Redirect::back()->withInput(Input::except('password'))->with(Session::flash('error', 'Username or Password is incorrect!'));
	    }
	    
	
	}


	/**
	  * NON-VIEW FUNCTION
	  * -----------------
	  * Set Status as Logged Out
	  *
	  **/
	public function destroy()
	{
	
	    Auth::logout();
	    return Redirect::to('/');
	
	}
	
	


}
