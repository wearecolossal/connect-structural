<?php
	
	//Assign Active Class to Nav Elements
	function isActive($nav) {
		if(strpos(URL::current(), $nav) !== false) {
			return 'active';
		}
	}