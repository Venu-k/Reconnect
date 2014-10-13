<?php

class RegistrationController extends \BaseController {

	
	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		$idProofOpt = Common::getIdProofList();
		$productOpt = Common::getProductsList();
		$stateOpt = Common::getStatesList();
		$districtOpt = Common::getDistrictsList();
        return View::make('public.registration',array('idProofOpt' => $idProofOpt,'productOpt' => $productOpt,'stateOpt' => $stateOpt,'districtOpt' => $districtOpt));
       
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->passes())
		{
			$placementid = IR::GenerateIrId(Input::get('ddlDistrict'));					
			
			try {
					DB::transaction(function($placementid) use ($placementid)
					{	
						/*Create  IR */		    
					    $ir = new IR;
					    $ir->name = Input::get('tbName');
					    $ir->fathername = Input::get('tbFather_HusbandName');
					    $ir->address1 = Input::get('tbAddress1');
					    $ir->address2 = Input::get('tbAddress2');
					    $ir->city = Input::get('tbTown_City');
					    $ir->district = Input::get('ddlDistrict');
					    $ir->state = Input::get('ddlState');
					    $ir->country = 1;
					    $ir->postalcode = Input::get('tbPostalCode');
					    $ir->phone_home = Input::get('tbResidenceNo');
					    $ir->phone_mobile = Input::get('tbMobile');
					    $ir->emailaddress = Input::get('tbEmail');
					    $ir->start_date = date('Y-m-d');
					    $ir->display_irid = $placementid;
					    $ir->placementid = $placementid;
					    $ir->proposal_number = Input::get('tbProposalNumber');
					    $ir->save();
					    $irid = $ir->id;
					    /* Create User */

				    	$user = new User;
				    	$user->userName = $placementid;
				    	$user->password = Input::get('tbPassword');
				    	$user->ir_id = $irid;			
				    	$user->save();		    

				    	/* Create Bank Details */
				    	$bankdetails = DB::table('bankdetails')->insert(
				    					    array(
				    					    	'ir_id' => $irid, 
				    					    	'idproof_type_id' => Input::get('ddlIdentityProof'),
				    					    	'idproof_details' => Input::get('tbDetails'),
				    					    	'pan_number' => Input::get('tbPanNumber'),
				    					    	'payee_name' => Input::get('tbPayeeName'),
				    					    	'bank_name' => Input::get('tbBankName'),
				    					    	'bank_branch' => Input::get('tbBranch'),
				    					    	'account_number' => Input::get('tbAccountNumber'),
				    					    	'nominee' => Input::get('tbNominee'),
				    					    	'nominee_relation' => Input::get('tbNomineeRelation')

				    					    	)
				    					);


				    	/* Create Transaction */
				    	$transactions = new Transactions;
				    	$transactions->product_id = Input::get('ddlPolicyName');
				    	$transactions->ir_id = $irid;
				    	$transactions->policy_holder_name = Input::get('tbPolicyHolderName');			
				    	$transactions->policy_amount = Input::get('ddlPolicyAmount');
				    	$transactions->policy_nominee_name = Input::get('tbNominee');		
				    	$transactions->policy_nominee_relation = Input::get('tbPolicyNomineeRelation');			
				    	$transactions->receipt_number = Input::get('tbReceiptNumber');
				    	$transactions->referring_ir_id = IR::GetIrIdByDisplayId(Input::get('tbIntroducerId'));			
				    	$transactions->policy_date = Input::get('tbPolicyDate');
				    	$transactions->isExtension = 0;
				    	$transactions->save();

				    	$placementID	= IR::GetIrIdByDisplayId(Input::get('tbPlacementId'));
						$position = Input::get('tbPlacementPosition');
						$isNetworkExsists = Network::checkNetworkPosition($placementID);				    	

				    	if ($isNetworkExsists) {

				    		$network  = DB::table('network')
								           ->where('ir_id', $placementID);
				    		$position == "L" ? $network->update(array('left_ir_id' => $irid)) : $network->update(array('right_ir_id' => $irid));
				    		
				    		
				    	} else {

				    		$network = new Network;
				    		$network->ir_id = $placementID;
				    		$position == "L" ? $network->left_ir_id = $irid : $network->right_ir_id = $irid;
							$network->save();
				    		
				    	}

				    	$irOccupied  = DB::table('ir')
								         ->where('id', $placementID);
				    	$position == "L" ? $irOccupied->update(array('left_occupied' => 1)) : $irOccupied->update(array('right_occupied' => 1));


				    	
					    
					});
				
			} catch (Exception $e) {

				return Redirect::to('public/registration')
								->with('message', 'Something went wrong')							
								->withInput();
				
			}

			/*
			* Send registration confirm E mail
			*/
			$data = array('userName'=>$placementid,
				'password'=>Input::get('tbPassword'),
				'name'=>Input::get('tbName'),
				'email' =>Input::get('tbEmail')
				);
			
			Mail::send('emails.welcome', $data, function($message) use ($data)
			{
			  $message->to($data['email'], $data['name'])
			          ->subject('Welcome To reconncet.co.in');
			});

			return View::make('public.Confirmation')
					->with('data',$data);

		}	

		return Redirect::to('registration')
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return "Show";
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}