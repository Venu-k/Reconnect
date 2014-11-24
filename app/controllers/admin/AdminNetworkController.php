<?php

class AdminNetworkController extends \BaseController {



	public function GeneologyByDate(){

		return View::make('admin.GeneologyByDate');

	}

	public function GeneologyUV(){

		return View::make('admin.GeneologyUV');

	}

	public function get_IRPerformance(){
		if (Input::has('irid')) {
			$searchID = Input::get('irid');
			$irid = IR::GetIrIdByDisplayId($searchID);
			if ($irid) {
				$IRPerformance = Transactions::SelectPerformanceOfAnIR($irid);
			}
			else {
				$IRPerformance = false;
			}

			if($IRPerformance)
			{
			//dd($performance);			
			return View::make('admin.IRPerformance')
						->with('message',"")
						->with('IRPerformance',$IRPerformance)
						->with('inputs',Input::all());
			}
			else
			{
				return View::make('admin.IRPerformance')
						->with('message',"Sorry, we couldn't find that IR in your network.");				

			}
		}
		else {
			return View::make('admin.IRPerformance')
					->with('message',"");
		}

	}


	public function get_Performance(){

		if (Input::has('ddlWeek')) {
			$weekID = Input::get('ddlWeek');
			$weeks = Common::getWeekDates($weekID);
			if ($weeks) {
				$performance = Transactions::SelectTransactionsForAWeek($weeks);
			}
			else {
				$performance = false;
			}

			if($performance)
			{			
				return View::make('admin.Performance')
						->with('message',"")
						->with('performance',$performance)
						->with('inputs',Input::all());
			}
			else
			{
				return View::make('admin.Performance')
						->with('message',"Sorry, we couldn't find that IR in your network.");				

			}
		}
		else {
			return View::make('admin.Performance')
						->with('message',"");
		}
		

	}

	


	public function SpecialIncentives(){

		if (Input::has('ddlWeek')) {
			$start_week_id = Input::get('ddlWeek');
			$end_week_id = Input::get('ddlWeek1');
			$incentives = Payment::GetSpecialIncentivesDetails($start_week_id, $end_week_id);
			
			if($incentives)
			{			
				return View::make('admin.SpecialIncentives')
						->with('message',"")
						->with('incentives',$incentives)
						->with('inputs',Input::all());
			}
			else
			{
				return View::make('admin.SpecialIncentives')
						->with('message',"Sorry, we couldn't find that IR in your network.");				

			}
		}
		else {
			return View::make('admin.SpecialIncentives')
						->with('message',"");
		}

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