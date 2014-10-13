<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
				'tbIntroducerId' => 'required',
				'tbReceiptNumber' => 'required',
				'tbPlacementId' => 'required',
				'tbName' => 'required',
				'tbAddress1' => 'required',
				'tbTown_City' => 'required',
				'tbPostalCode' => 'required',
				'tbMobile' => 'required',
				'tbEmail' => 'required',
				'tbPassword' => 'required',
				'tbConfirmPassword' => 'required',
				'tbDetails' => 'required',
				'tbPolicyHolderName' => 'required',
				'tbPolicyNomineeName' => 'required',
				'tbPolicyNomineeRelation' => 'required',

				);


	
	public static function getProfile($id){
		$userProfile = DB::table('ir')	 	
	 	->join('transactions', 'ir.id', '=', 'transactions.ir_id')
	 	->join('bankdetails', 'ir.id', '=', 'bankdetails.ir_id')
	 	->join('user', 'ir.id', '=', 'user.ir_id')
	 	->join('state', 'ir.state', '=', 'state.id')	 	
	 	->join('districts', 'ir.district', '=', 'districts.id')
	 	->join('product', 'transactions.product_id', '=', 'product.id')
	 	->select('*','ir.display_irid','ir.placementid','ir.name','ir.fathername','ir.address1','ir.address2','ir.city','districts.district_name','districts.id AS district_id','state.statename','state.id AS state_id','ir.postalcode','ir.phone_home','ir.phone_mobile','ir.emailaddress','transactions.policy_holder_name','product.name as product_name','transactions.policy_amount','transactions.policy_nominee_name','transactions.policy_nominee_relation','transactions.status')
	    ->where('ir.id',$id)
	    ->get();
		if($userProfile)
		{
		    foreach ($userProfile as $key => $value)
			{
				
				
				$profile = $value;
				
			}
			
			return $profile;
		}
        
	}





}