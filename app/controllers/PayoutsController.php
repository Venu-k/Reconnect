<?php

class PayoutsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /payouts
	 *
	 * @return Response
	 */
	public function index()
	{

		
		if (Input::has('ddlWeek')) {

			$weekID = Input::get('ddlWeek');
			
			$payouts = Transactions::SelectBalancesForAWeekForPayments($weekID);
			
			if($payouts)
			{			
				return View::make('admin.Payouts')
						->with('message',"")
						->with('payouts',$payouts)
						->with('inputs',Input::all());
			}
			else
			{
				return View::make('admin.Payouts')
						->with('message',"Sorry, we couldn't find that IR in your network.");				

			}
		}
		else {
			return View::make('admin.Payouts')
						->with('message',"");
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /payouts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /payouts
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /payouts/{id}
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
	 * GET /payouts/{id}/edit
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
	 * PUT /payouts/{id}
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
	 * DELETE /payouts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}