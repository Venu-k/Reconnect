<?php

class AdminNetworkController extends \BaseController {




	public function Geneology(){
		
		return View::make('admin.Geneology');		
	}

	public function GeneologyByDate(){

		return View::make('admin.GeneologyByDate');

	}

	public function GeneologyUV(){

		return View::make('admin.GeneologyUV');

	}

	public function IRPerformance(){

		return View::make('admin.IRPerformance');

	}

	public function Performance(){

		return View::make('admin.Payouts');

	}

	public function Payouts(){

		return View::make('admin.Payouts');

	}


	public function SpecialIncentives(){

		return View::make('admin.SpecialIncentives');

	}

	public function Reports(){

		return View::make('admin.Reports');

	}



	/**
	 * Display a listing of the resource.
	 * GET /adminnetwork
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminnetwork/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminnetwork
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /adminnetwork/{id}
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
	 * GET /adminnetwork/{id}/edit
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
	 * PUT /adminnetwork/{id}
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
	 * DELETE /adminnetwork/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}