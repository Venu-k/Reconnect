<?php

class MemberController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 * GET /membersearch
	 *
	 * @return Response
	 */
	public function membersearch()
	{	
						
		

		if(Input::get('tbName') != '')
		{
			$inputParameter = 'tbName';
			$inputValue = Input::get('tbName');
			$policyDetails = DB::table('ir')
							->where('name',$inputValue)
							->paginate(25);
		}
		elseif (Input::get('tbMemberID') != '') {
			$inputParameter = 'tbMemberID';
			$inputValue = Input::get('tbMemberID');
			$policyDetails = DB::table('ir')
							->where('display_irid', 'LIKE', '%'.$inputValue.'%')
							->paginate(25);
		}
		elseif (Input::get('tbStartDate') != '') {

			$inputParameter = 'tbStartDate';			
			$inputValue = Input::get('tbStartDate');

			$policyDetails = DB::table('ir')
							->where('start_date',$inputValue)
							->paginate(25);
		}
		else{
			$inputParameter = 'inputParameter';
			$inputValue = 'inputValue';
			$policyDetails = DB::table('ir')
							->paginate(25);

		}					


		
		if($policyDetails != '')
			{		


				return View::make('user.membersearch')
			        	->with('policyDetails',$policyDetails)
			        	->with('inputParameter',$inputParameter)
			        	->with('inputValue',$inputValue);

				
			}
			else
			{
				return View::make('user.membersearch')
			        	->with('message','No records found');

			}
		
	}




	/**
	 * Display a listing of the resource.
	 * GET /member
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /member/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /member
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /member/{id}
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
	 * GET /member/{id}/edit
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
	 * PUT /member/{id}
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
	 * DELETE /member/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}