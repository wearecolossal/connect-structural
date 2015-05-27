<?php
	
	//Assign Active Class to Nav Elements
	function isActive($nav) {
		if(strpos(URL::current(), $nav) !== false) {
			return 'active';
		}
	}
	
	//Check if project thumbnail is missing
	function checkThumbnail($photo) {
		if($photo) {
			return URL::asset('uploads/thumbnails').'/'.$photo;
		} else {
			return URL::asset('uploads/thumbnails/proj-thumb-missing.jpg');
		}
	}
	
	//Check if project photo thumbnail is missing
	function checkProjectPhoto($photo) {
		if($photo) {
			return URL::asset('uploads/thumbnails').'/'.$photo;
		} else {
			return URL::asset('uploads/thumbnails/proj-thumb-single-missing.jpg');
		}
	}
	
	
	
	