<?php

class GeneologyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /geneology
	 *
	 * @return Response
	 */
	public function geneology(){

		if (Input::all()) {

			$searchKey = Input::all();
			$userId = Session::get('userId');			
			$irid = IR::GetIrIdByDisplayId($searchKey);					
			$root = IR::GetRootIdByIrId($irid);
			if ($root != '') {
				$rootID = $root[0]->display_irid;
				$rootName = $root[0]->name;			
			} else {
				$rootID = '';
				$rootName = '';
			}
			
			if($irid >= $userId)
			{
				$childs = IR::GetChildIrId($irid);
				
				if ($childs) {					
					$lChild = $childs[0]->left_ir_id;
					$rChild = $childs[0]->right_ir_id;				
					$leftChilds = IR::GetChildIrId($lChild);
					$rightChilds = IR::GetChildIrId($rChild);
					if($leftChilds)
					{
						$llChild = $leftChilds[0]->left_ir_id;
						$lrChild = $leftChilds[0]->right_ir_id;
						
					}
					else{
						$llChild = '';
						$lrChild = '';
					}

					if($rightChilds)
					{
						$rlChild = $rightChilds[0]->left_ir_id;
						$rrChild = $rightChilds[0]->right_ir_id;

					}
					else{
						$rlChild = '';
						$rrChild = '';
					}
				
				} else {					
					$lChild = '';
					$rChild = '';
					$llChild = '';
					$lrChild = '';
					$rlChild = '';
					$rrChild = '';
					
				}	
								
				
				$btreeIds = array(					
					'parent' => $irid,
					'lChild' => $lChild,
					'rChild' => $rChild,
					'llChild' => $llChild,
					'lrChild' => $lrChild,
					'rlChild' => $rlChild,
					'rrChild' => $rrChild );
				

				foreach ($btreeIds as $key => $value) {
					$bTreedata[$key] = IR::getBTreeData($value);
				}

				if($bTreedata)
				{					
					$bTreedata = array_add($bTreedata, 'rootID', $rootID);
					$bTreedata = array_add($bTreedata, 'rootName', $rootName);
					return View::make('user.geneology')
					->with('message',"")
					->with('bTreedata',$bTreedata);
							
				}
				else{
					return View::make('user.geneology')
							->with('message',"Sorry, we couldn't find that IR in your network.");
				}	

				
									
			}
			else{

				return View::make('user.geneology')
							->with('message',"Sorry, we couldn't find that IR in your network.");

			}
		}
		else
		{
			return View::make('user.geneology')
							->with('message',"");

		}
	}

	/**
	 * Display a listing of the resource.
	 * GET /GeneologyByDate
	 *
	 * @return Response
	 */
	public function GeneologyByDate(){
		if(Input::get('ddlWeek'))
		{

			$searchKey = Input::get('irid');
			$year = Input::get('ddlYear');
			$week = Input::get('ddlWeek');			
			$irid = IR::GetIrIdByDisplayId($searchKey);			
			$weekDates = Common::getWeekDates($week);
			if ($weekDates) {
				$startDate = $weekDates[0]->start_date;
				$endDate = $weekDates[0]->end_date;
			}
			else{
				$startDate = '';
				$endDate = '';
			}
			/*
			$list = array();
			IR::getChildElements($irid,$list);*/

						
					

						

			
			




			/*if($childIRIDs = DB::table('network')
							->join('ir', 'ir.id', '=', 'network.ir_id')
							->where('ir.display_irid',$irid)
							->get(array('left_ir_id','right_ir_id')))
			{
				foreach ($childIRIDs as $childIRID)
				{
					$left_ir_id = $childIRID->left_ir_id;	
					$right_ir_id = $childIRID->right_ir_id;					
				}
			}
			else{
				return View::make('user.GeneologyByDate');	
			}
			
				


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
				return View::make('user.GeneologyByDate');
			}
			
			 ->get(array('ir.display_irid','ir.name','transactions.txn_date','transactions.policy_amount','transactions.qty'));
		    
		    
		   $inputParameters = array('irid'=>$irid,'ddlYear'=>$year, 'ddlWeek'=>$week);
		    dd($inputParameters);
			

		    if($geneologyByDate = ){
		    	return View::make('user.GeneologyByDate')
						->with('geneologyByDate',$geneologyByDate )
						->with('inputParameters',$inputParameters);
			        	
		    }
		    else{
		    	return View::make('user.GeneologyByDate')
						->with('message','No records found');
		    }*/
			
		}
		else
		{	
				
			return View::make('user.GeneologyByDate')
						->with('message','No records found');
		}
	}

	/**
	 * Display a listing of the resource.
	 * GET /geneology
	 *
	 * @return Response
	 */
	public function GeneologyUV(){
		
		if(Input::get('irid') != '')
		{			
			$irid = Input::get('irid');
			$inputParameter = 'irid';
			$inputValue = $irid;

		    if($GeneologyUV = DB::table('transactions')
								->join('ir','transactions.ir_id','=','ir.id')							    
							    ->where('status',1)
							    ->where('isExtension',0)
							    ->paginate(25)){		    	
		    	return View::make('user.GeneologyUV')
						->with('GeneologyUV',$GeneologyUV )
						->with('inputParameter',$inputParameter)
			        	->with('inputValue',$inputValue);
		    }
			else
			{
				return View::make('user.GeneologyUV')
						->with('message','No records Found');
			}
			
		}
		else
		{
			
			return View::make('user.GeneologyUV')
						->with('message','No records Found');
		}
	}





	/**
	 * Display a listing of the resource.
	 * GET /geneology
	 *
	 * @return Response
	 */
	public function index(){
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /geneology/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /geneology
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /geneology/{id}
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
	 * GET /geneology/{id}/edit
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
	 * PUT /geneology/{id}
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
	 * DELETE /geneology/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}