<?php

class ProjectPhoto extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'project_photos';
	
	public function deleteProjectPhoto($filename, $source) {

		if( File::exists( public_path() . $source . $filename) && !empty($filename) )
		{
			File::delete(public_path() . $source . $filename);

			return true;
		}

		return false;
	}
}
