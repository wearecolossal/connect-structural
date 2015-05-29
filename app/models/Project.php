<?php

class Project extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projects';

	public function deletePhoto($filename, $source) {

		if( File::exists( public_path() . $source . $filename) && !empty($filename) )
		{
			File::delete(public_path() . $source . $filename);

			return true;
		}

		return false;
	}

}
