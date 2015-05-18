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
	public function projects($filter = null, $single = null)
	{
	
		/*PAGE INCLUDES*/
		//If Filter Exists, save as Variable
		if(isset($filter)) {
			//Clean Name of Filter
			$filterUnUrl = str_replace('-', ' ', $filter);
			$cleanFilter = ucwords($filterUnUrl);
		}
		if(isset($single)) {
			//Clean Name of Project
			$singleUnUrl = str_replace('-', ' ', $single);
			$cleanSingle = ucwords($singleUnUrl);
		}
	
		/*DISPLAY PAGE*/
		return View::make('pages.projects', 
					 compact(
						 'filter', //Send Filter
						 'cleanFilter', //Clean Name Of Filter
						 'single', //Single Single
						 'cleanSingle' //Clean Name of Single
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
