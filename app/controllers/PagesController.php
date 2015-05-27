<?php

class PagesController extends BaseController {


	/**
	  * PAGE VIEW
	  * ---------
	  * Display homepage
	  *
	  **/
	public function index()
	{
	
		/*PAGE INCLUDES*/
	
	
		/*DISPLAY PAGE*/
		return View::make('pages.home');
	
	}
	
	/**
	  * PAGE VIEW
	  * ---------
	  * Display about
	  *
	  **/
	public function about()
	{
	
		/*PAGE INCLUDES*/
	
	
		/*DISPLAY PAGE*/
		return View::make('pages.about');
	
	}
	
	/**
	  * PAGE VIEW
	  * ---------
	  * Display meet our team
	  *
	  **/
	public function team()
	{
	
		/*PAGE INCLUDES*/
	
	
		/*DISPLAY PAGE*/
		return View::make('pages.team');
	
	}
	
	/**
	  * PAGE VIEW
	  * ---------
	  * Display homepage
	  *
	  **/
	public function services()
	{
	
		/*PAGE INCLUDES*/
	
	
		/*DISPLAY PAGE*/
		return View::make('pages.services');
	
	}
	
	/**
	  * PAGE VIEW
	  * ---------
	  * Display projects
	  *
	  **/
	public function projects($category_id = null, $category_name = null, $single_id = null, $single_name = null)
	{
		
		/*PAGE INCLUDES*/
		//Get Category
		if($category_id) {
			$category = Category::find($category_id);
		}
		//Get Single Project
		if($single_id) {
			$single = Project::find($single_id);
		} else {
			$single = null;
		}
		
	
		/*DISPLAY PAGE*/
		return View::make('pages.projects', 
					 compact(
						 'category', // Get Category
						 'single' // Get Single Project
					 ));
	
	}
	
	/**
	  * PAGE VIEW
	  * ---------
	  * Display contact page
	  *
	  **/
	public function contact()
	{
	
		/*PAGE INCLUDES*/
	
	
		/*DISPLAY PAGE*/
		return View::make('pages.contact');
	
	}
	
	

}
