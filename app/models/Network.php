<?php

class Network extends \Eloquent {
	protected $fillable = [];

	protected $table = 'network';
	public $timestamps = false;


	

	/* Check netwrok for placement id*/

	public static function checkNetworkPosition($irid)
	{

		$irid = DB::table('network')					    			
						    ->where('ir_id',$irid)
						    ->get();
						    
		return $irid ? true : false;

	}


}