<?php

class AdminMemberController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 * GET /Member
	 *
	 * @return Response
	 */
	public function getMemberProfile($irid)
	{	

		$id = IR::GetIrIdByDisplayId($irid);			
	    $profile = User::getProfile($id);
	    $idProofOpt = Common::getIdProofList();
		$productOpt = Common::getProductsList();
		$stateOpt = Common::getStatesList();
		$districtOpt = Common::getDistrictsList();			    	    	    
    	return View::make('admin.Member',array('idProofOpt' => $idProofOpt,'productOpt' => $productOpt,'stateOpt' => $stateOpt,'districtOpt' => $districtOpt))
    				->with('profile',$profile);
					
	}



	/**
	 * Display a listing of the resource.
	 * POST /Member
	 *
	 * @return Response
	 */
	public function updateMemberProfile($placementid)
	{	

		try {

			$irid = IR::GetIrIdByDisplayId($placementid);

			
			/* Update IR */

			IR::where('id','=',$irid)->update(array(
				'name' => Input::get('tbName'),
				'fathername' => Input::get('tbFather_HusbandName'),
				'address1' => Input::get('tbAddress1'),
			    'address2' => Input::get('tbAddress2'),
			    'city' => Input::get('tbTown_City'),
			    'district' => Input::get('ddlDistrict'),
			    'state' => Input::get('ddlState'),
			    'country' => 1,
			    'postalcode' => Input::get('tbPostalCode'),
			    'phone_home' => Input::get('tbResidenceNo'),
			    'phone_mobile' => Input::get('tbMobile'),
			    'emailaddress' => Input::get('tbEmail'),		   
			    'proposal_number' => Input::get('tbProposalNumber')

				));

			/* Update Bank details */
			DB::table('bankdetails')
				->where('ir_id','=',$irid)
				->update(
					array(

				    	'idproof_type_id' => Input::get('ddlIdentityProof'),
				    	'idproof_details' => Input::get('tbDetails'),
				    	'pan_number' => Input::get('tbPanNumber'),
				    	'payee_name' => Input::get('tbPayeeName'),
				    	'bank_name' => Input::get('tbBankName'),
				    	'bank_branch' => Input::get('tbBranch'),
				    	'account_number' => Input::get('tbAccountNumber'),
				    	'nominee' => Input::get('tbNominee'),
				    	'nominee_relation' => Input::get('tbNomineeRelation')

		    	));	 

		    /* Update Transactions details */  	

	    	Transactions::where('ir_id','=',$irid)->update(
									    		array(
										    		'policy_holder_name' => Input::get('tbPolicyHolderName'),			
											    	'policy_amount' => Input::get('ddlPolicyAmount'),
											    	'qty' => (Input::get('ddlPolicyAmount')/15000),
											    	'policy_nominee_name' => Input::get('tbNominee'),		
											    	'policy_nominee_relation' => Input::get('tbPolicyNomineeRelation'),
											    	'product_id' => Input::get('ddlPolicyName'),		
											    	'receipt_number' => Input::get('tbReceiptNumber'),			
											    	'policy_date' => Input::get('tbPolicyDate')

								    		));


    	} catch (Exception $e) {

				return Redirect::intended('admin/Members/Member/'.$placementid);
				
			}


		return Redirect::intended('admin/Members/Member/'.$placementid);


					
	}

	/**
	 * Display a listing of the resource.
	 * GET /membersearch
	 *
	 * @return Response
	 */
	public function membersearch()
	{

	    $name = Input::get('tbName'); 
		$memberId = Input::get('tbMemberID');
		$startDate = Input::get('tbStartDate');
		$endDate = Input::get('tbEndDate');		
		
		$membersearch = Common::search($name,$memberId,$startDate,$endDate);

		return View::make('admin.membersearch')
					->with('membersearch',$membersearch)
					->with('inputs',Input::all());
					
	}



	/**
	 * Display a listing of the resource.
	 * GET /TransactionNew
	 *
	 * @return Response
	 */
	public function TransactionsNew()
	{		
	    $name = Input::get('tbName'); 
		$memberId = Input::get('tbMemberID');
		$startDate = Input::get('tbStartDate');
		$endDate = Input::get('tbEndDate');
		if (Input::get('status')) {
			$status = Input::get('status');
		} else {
			$status = 0;
		}

		$TransactionsNew = Common::SearchPendingTransactions($name,$memberId,$startDate,$endDate,$status);
		return View::make('admin.TransactionsNew')
					->with('TransactionsNew',$TransactionsNew);
	}



	/**
	 * Display a listing of the resource.
	 * GET /TransactionPending
	 *
	 * @return Response
	 */
	public function TransactionsPending()
	{
		$name = Input::get('tbName'); 
		$memberId = Input::get('tbMemberID');
		$startDate = Input::get('tbStartDate');
		$endDate = Input::get('tbEndDate');
		if (Input::get('status')) {
			$status = Input::get('status');
		} else {
			$status = 3;
		}

		$TransactionsPending = Common::SearchPendingTransactions($name,$memberId,$startDate,$endDate,$status);
		return View::make('admin.TransactionsPending')
					->with('TransactionsPending',$TransactionsPending);
		
	}




	/**
	 * Display a listing of the resource.
	 * GET /PolicySearch
	 *
	 * @return PolicySearch
	 */
	public function PolicySearch()
	{
		$products = DB::table('product')->get(array('id','name'));
		$name = Input::get('tbName'); 
		$memberId = Input::get('tbMemberID');
		$productId = Input::get('ddlPolicyName');
		$policyAmount = Input::get('tbPolicyAmount');		
		
		$PolicySearch = Common::SearchActivePolicies($name, $memberId, $productId, $policyAmount);

		return View::make('admin.PolicySearch')
					->with('products',$products)
					->with('PolicySearch',$PolicySearch)
					->with('inputs',Input::all());
	}




	/**
	 * Display a listing of the resource.
	 * GET /adminmember
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminmember/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminmember
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /adminmember/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /adminmember/{id}/edit
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
	 * PUT /adminmember/{id}
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
	 * DELETE /adminmember/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}