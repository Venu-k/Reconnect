<?php

class UserController extends \BaseController {
		
	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */

	public function index($url)
	{
		
		if(Session::get('userFullName')!= '')
		{

			switch ($url)
		    {
		        case 'home':		        	
		        	$announcement = Common::getAnnouncements();
		        	return View::make('user.home')
		        				->with('announcement',$announcement);	       		            
			        break;
			    case 'member':
				    $id = Session::get('userId');
		        	$profile = User::getProfile($id);
		        	return View::make('user.member')
		        				->with('profile',$profile);	       		            
			        break;
			    case 'CreateIRExtension':
			    	$placementId = Session::get('irid');			    				    	
			    	$isPossitionEmpty = Common::validatePossition($placementId);			    	
			    	if ($isPossitionEmpty =='Right' || $isPossitionEmpty =='Left' || $isPossitionEmpty =='Both') {
			    		return View::make('user.CreateIRExtension');
			    	}
			    	else{
			    		return View::make('user.CreateIRExtension')
			    					->with('possition','No more extensions can be created.');
			    	}
		        		        					       		            
			        break;
			   
			    case 'SpecialIncentives':		        	
		        	return View::make('user.SpecialIncentives');		        					       		            
			        break;
			    case 'ChangePassword':		        	
		        	return View::make('user.ChangePassword');		        					       		            
			        break;
			    case 'support':		        	
		        	return View::make('user.support');		        					       		            
			        break;             
			    case 'logout':
			        Session::flush();
					return Redirect::to('default');            
			        break;        
		    }

			  
		}
		else
		{
			return Redirect::to('default')
			->withErrors('message', 'Your ID or password is wrong. Please try again.');
		}
		
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
	public function store($url)
	{

		if(Session::get('userFullName')!= '')
		{

			switch ($url)
		    {
		        
			    case 'membersearch':
			    	$searchKey = Input::all();
		        	$policyDetails = $this->getPolicyDetailsOnSearch($searchKey);
		        	return View::make('user.membersearch')
		        				->with('policyDetails',$policyDetails);	       		            
			        break;

			     case 'geneology':
			    	$searchKey = Input::all();
			    	dd($searchKey);
		        	$policyDetails = $this->getPolicyDetailsOnSearch($searchKey);
		        	return View::make('user.geneology')
		        				->with('policyDetails',$policyDetails);	       		            
			        break;
			            
		    }

			  
		}
		else
		{
			return Redirect::to('default')
			->withErrors('message', 'Your ID or password is wrong. Please try again.');
		}
		
		
		
	}

	private function getPolicyDetailsOnSearch($searchKey){
		/*$start_date  = date("Y-m-d", $searchKey['tbStartDate']);*/	

		if($policyDetailsResult = DB::table('ir') 
								->where('name',$searchKey['tbName']) 								  							
    							->get())
		{

			foreach ($policyDetailsResult as $key => $value)
			{
				
				$policyDetails[$key] = $value;
				
			}			
			return $policyDetails;
		}

        
	}



	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		
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