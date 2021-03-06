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
			$name = Input::get('tbName')? Input::get('tbName') : false; 			
			$memberId = Input::get('tbMemberID')? Input::get('tbMemberID') : false; 
			$startDate = Input::get('tbStartDate')? Input::get('tbStartDate') : false; 
			$policyDetails = Common::memberSearch($name,$memberId,$startDate);
			return View::make('user.membersearch')
	        	->with('policyDetails',$policyDetails)
	        	->with('inputs',Input::all());
		
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