<?php

class SummaryController extends \BaseController {





	/**
	 * Display a listing of the resource.
	 * GET /geneology
	 *
	 * @return Response
	 */
	public function IRSummary()
	{
		if(Input::get('ddlWeek') != '')
		{
			
			$year = Input::get('ddlYear');
			$week = Input::get('ddlWeek');

			if($weeks = DB::table('weeks')						
							->where('week_id',$week)
							->get(array('start_date','end_date')))
			{
				foreach ($weeks as $week)
				{
				
					$start_date = (string)$week->start_date;	
					$end_date = (string)$week->end_date;

				}

			}
			else{
				return View::make('user.IRSummary');
			}

		    $inputParameter = 'ddlWeek';
			$inputValue = Input::get('ddlWeek');

		    if($IRSummary = DB::table('transactions')
								->join('ir','transactions.ir_id','=','ir.id')
							    ->whereBetween('txn_date', array($start_date, $end_date))							    
							    ->paginate(25)){
		    	
		    	return View::make('user.IRSummary')
						->with('IRSummary',$IRSummary )
						->with('inputParameter',$inputParameter)
			        	->with('inputValue',$inputValue);
		    }
		    else{
		    	
		    	return View::make('user.IRSummary')
						->with('message','No records found');
		    }
			
		}
		else
		{
			return View::make('user.IRSummary');
		}
	}



	/**
	 * Display a listing of the resource.
	 * GET /summary
	 *
	 * @return Response
	 */
	public function welcomeletter()
	{

		$id = Session::get('userId');

		
		$userProfile = DB::table('ir')	 	
	 	->join('transactions', 'ir.id', '=', 'transactions.ir_id')
	 	->join('bankdetails', 'ir.id', '=', 'bankdetails.ir_id')
	 	->join('user', 'ir.id', '=', 'user.ir_id')
	 	->join('state', 'ir.state', '=', 'state.id')
	 	->join('districts', 'ir.district', '=', 'districts.id')
	 	->join('product', 'transactions.product_id', '=', 'product.id')
	    ->where('ir.id',$id)
	    ->get();
		

		if($userProfile)
		{ 			

			foreach ($userProfile as $key => $value)
			{
				
				$profile = $value;
				
			}

			return View::make('user.welcomeletter')
						->with('profile',$profile);
		}
		/*
		else
		{
			return View::make('user.welcomeletter');
		}*/
		
		
	}


	/**
	 * Display a listing of the resource.
	 * GET /summary
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /summary/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /summary
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /summary/{id}
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
	 * GET /summary/{id}/edit
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
	 * PUT /summary/{id}
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
	 * DELETE /summary/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}