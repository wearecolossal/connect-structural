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
		$projects = Project::where('archive', 0)->where('draft', 0)->orderby('name', 'asc')->get();
	
		/*DISPLAY PAGE*/
		return View::make('admin.index', 
					 compact(
						 'projects' //Use the Projects Table
					 ));
	
	}
	
	/**
	  * PAGE VIEW
	  * ---------
	  * New Project
	  *
	  **/
	public function newProject()
	{
	
		//Check If Logged in
		if(Auth::guest()) {
			return Redirect::to('/');
		}
	
		/*DISPLAY PAGE*/
		return View::make('admin.new-project', 
					 compact(
						 'project' // Get Single Project
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
	  * PAGE VIEW
	  * ---------
	  * Admin Projects Section - Edit Single Project [DRAFT]
	  *
	  **/
	public function draftProject($id)
	{
		//Check If Logged in
		if(Auth::guest()) {
			return Redirect::to('/');
		}
		/*PAGE INCLUDES*/
		//Get Single Project
		$project = Project::find($id);
	
		/*DISPLAY PAGE*/
		return View::make('admin.draft-project', 
					 compact(
						 'project' // Get Single Project
					 ));
	
	}
	
	/**
	  * PAGE VIEW
	  * ---------
	  * Admin Projects Section - Edit Single Project [ARCHIVE]
	  *
	  **/
	public function archiveProject($id)
	{
		//Check If Logged in
		if(Auth::guest()) {
			return Redirect::to('/');
		}
		/*PAGE INCLUDES*/
		//Get Single Project
		$project = Project::find($id);
	
		/*DISPLAY PAGE*/
		return View::make('admin.archive-project', 
					 compact(
						 'project' // Get Single Project
					 ));
	
	}
	
	/**
	  * NON-VIEW FUNCTION
	  * -----------------
	  * Edit Basic Project Info
	  *
	  **/
	public function editProject($id)
	{
		
		//Get current Project
		$project = Project::find($id);
		
		//Get All Inputs
	    $input = Input::all();
	    
	    //Project Thumbnail
		if(Input::hasFile('thumbnail')) {
			// check if previous photo exists and delete it.
			$project->deletePhoto($project->thumbnail, '/uploads/thumbnails/');
			// generate a random file name
			$filename = 'proj-thumb-'.urlencode(strtolower(str_replace('-', '', str_replace('#', '', str_replace(':', '', str_replace(' ', '-', $input['name'])))))).'-'.date('Y-m-d-H-i-s');
			// assinged file input to a variable
			$image = $input['thumbnail'];
			// get original image file extension
			$extension = $image->getClientOriginalExtension();
			// open image file
			$photo = Image::make($image->getRealPath());
			$photo->resize(347, null, function ($constraint) {
			    $constraint->aspectRatio();
			});
			$photo->crop(347, 261);
			// final file name
			$filename = $filename . '.' . $extension;
			// save file with medium quality
			$photo->save(public_path() . '/uploads/thumbnails/'. $filename, 100);
			// store file name in database	
			$project->thumbnail = $filename;
		}
		
		//Feature Thumbnail for Category?
		if(Input::get('category_featured') == 1) {
			//Change all projects that are featured to NULL first
			Project::where('category_id', $input['category_id'])->update(array('category_featured' =>  NULL));
			//Make this project featured
			$project->category_featured = 1;
		} else {
			$project->category_featured = NULL;
		}
		
		//Project Name
		$project->name = $input['name'];
		//Project Description
		$project->description = $input['description'];
		//Project Category
		$project->category_id = $input['category_id'];
		//Get Draft Status of Project
		$project->draft = $input['draft'];
		//Get Archive Status of Project
		$project->archive = $input['archive'];
		//Save Project
		$project->save();
		
		//If Archive is unset, make sure draft is unset as well
		if($input['archive'] == 0) {
			$project->draft = 0;
			$project->save();
		}
	    
	    //Redirect to ARCHIVE if set to archive
	    if($project->archive == 1) {
		    return Redirect::to('admin/project/archive/'.$project->id)->with(Session::flash('Success', '<strong>Project Updated!</strong>'));
	    }
	    //Redirect to DRAFT if set to draft
	    else if($project->draft == 1) {
		    return Redirect::to('admin/project/draft/'.$project->id)->with(Session::flash('Success', '<strong>Project Updated!</strong>'));
	    }  else {
		    //ELSE Redirect back to page
		     return Redirect::to('admin/project/'.$project->id)->with(Session::flash('Success', '<strong>Project Updated!</strong>'));
	    }
	    
	    
	    
	
	}
	
	/**
	  * NON-VIEW FUNCTION
	  * -----------------
	  * Create New Project
	  *
	  **/
	public function createNewProject()
	{
		
		//Get current Project
		$project = new Project;
		
		//Get All Inputs
	    $input = Input::all();
	    
	    //Required Fields
	    $required = array(
		    $input['thumbnail'],
		    $input['name'], 
		    $input['description'],
		    $input['category_id']
	    );
	    
	    //Check if any fields have NULL or 0
	    if(in_array(NULL, $required)) {
		    
		    return Redirect::back()->with(Session::flash('Error', '<strong>Required fields are missing</strong>'));
		    
	    }
	    
	    //Project Thumbnail
		if(Input::hasFile('thumbnail')) {
			// check if previous photo exists and delete it.
			$project->deletePhoto($project->thumbnail, '/uploads/thumbnails/');
			// generate a random file name
			$filename = 'proj-thumb-'.urlencode(strtolower(str_replace('-', '', str_replace('#', '', str_replace(':', '', str_replace(' ', '-', $input['name'])))))).'-'.date('Y-m-d-H-i-s');
			// assinged file input to a variable
			$image = $input['thumbnail'];
			// get original image file extension
			$extension = $image->getClientOriginalExtension();
			// open image file
			$photo = Image::make($image->getRealPath());
			$photo->resize(347, null, function ($constraint) {
			    $constraint->aspectRatio();
			});
			$photo->crop(347, 261);
			// final file name
			$filename = $filename . '.' . $extension;
			// save file with medium quality
			$photo->save(public_path() . '/uploads/thumbnails/'. $filename, 100);
			// store file name in database	
			$project->thumbnail = $filename;
		}
		
		//Feature Thumbnail for Category?
		if(Input::get('category_featured') == 1) {
			//Change all projects that are featured to NULL first
			Project::where('category_id', $input['category_id'])->update(array('category_featured' =>  NULL));
			//Make this project featured
			$project->category_featured = 1;
		} else {
			$project->category_featured = NULL;
		}
		
		//Project Name
		$project->name = $input['name'];
		//Project Description
		$project->description = $input['description'];
		//Project Category
		$project->category_id = $input['category_id'];
		//Get Draft Status of Project
		$project->draft = $input['draft'];
		//Save Project
		$project->save();

	    //Redirect to DRAFT if set to draft
	    if($project->draft == 1) {
		    return Redirect::to('admin/project/draft/'.$project->id)->with(Session::flash('Success', '<strong>Project Updated!</strong>'));
	    }  else {
		    //ELSE Redirect back to page
		     return Redirect::to('admin/project/'.$project->id)->with(Session::flash('Success', '<strong>Project Updated!</strong>'));
	    }
	    
	    
	    
	
	}
	
	/**
	  * NON-VIEW FUNCTION
	  * -----------------
	  * Upload Project Photo
	  *
	  **/
	public function uploadPhoto($id)
	{
		
	    //Get All Inputs
	    $input = Input::all();
	    
	    //Get Project
	    $p = Project::find($id);
	    
	    //Create new Project Photo
	    $project = new ProjectPhoto;
	    
	    //Project Photo and Thumbnail
		if(Input::hasFile('photo')) {
			//PROJECT IMAGE
			// check if previous photo exists and delete it.
			$project->deleteProjectPhoto($project->image, '/uploads/');
			// generate a random file name
			$filename = 'proj-'.urlencode(strtolower(str_replace('-', '', str_replace('#', '', str_replace(':', '', str_replace(' ', '-', $p->name)))))).'-'.date('Y-m-d-H-i-s');
			// assinged file input to a variable
			$image = $input['photo'];
			// get original image file extension
			$extension = $image->getClientOriginalExtension();
			// open image file
			$photo = Image::make($image->getRealPath());
			$photo->resize(960, null, function ($constraint) {
			    $constraint->aspectRatio();
			});
			//$photo->crop(347, 261);
			// final file name
			$filename = $filename . '.' . $extension;
			// save file with medium quality
			$photo->save(public_path() . '/uploads/'. $filename, 100);
			// store file name in database	
			$project->image = $filename;
			
			//PROJECT IMAGE THUMBNAIL
			// check if previous photo exists and delete it.
			$project->deleteProjectPhoto($project->thumbnails, '/uploads/thumbnails/');
			// generate a random file name
			$filename = 'proj-thumb-'.urlencode(strtolower(str_replace('-', '', str_replace('#', '', str_replace(':', '', str_replace(' ', '-', $p->name)))))).'-'.date('Y-m-d-H-i-s');
			// assinged file input to a variable
			$image = $input['photo'];
			// get original image file extension
			$extension = $image->getClientOriginalExtension();
			// open image file
			$photo = Image::make($image->getRealPath());
			$photo->resize(960, null, function ($constraint) {
			    $constraint->aspectRatio();
			});
			$photo->crop(480, 480);
			// final file name
			$filename = $filename . '.' . $extension;
			// save file with medium quality
			$photo->save(public_path() . '/uploads/thumbnails/'. $filename, 100);
			// store file name in database	
			$project->thumbnail = $filename;
		} else {
			return Redirect::back()->with(Session::flash('Error', '<strong>Please Choose A Photo Before Submitting!</strong>'));
		}
		
		$project->project_id = $p->id;
		
		$project->save();
		
		return Redirect::back()->with(Session::flash('Success', '<strong>Project Updated!</strong>'));
	    
	
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
	  * NON-VIEW FUNCTION
	  * -----------------
	  * Feature Project
	  *
	  **/
	public function featureProject($id)
	{
	
	    //Get Project
	    $project = Project::find($id);
	    //Toggle Featured Status
	    if($project->featured == 1) {
		    $project->featured = 0;
	    } else {
		    $project->featured = 1;
	    }
	    $project->save();
	    
	    return Redirect::back()->with(Session::flash('Success', '<strong>Feature Status Updated!</strong>'));
	
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
