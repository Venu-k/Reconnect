<?php

class AdminGeneologyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admingeneology
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.Geneology')
					->with('message',"");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admingeneology/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admingeneology
	 *
	 * @return Response
	 */
	public function store()
	{
		$irid = Input::get('irid');
		return Redirect::to('admin/Network/Geneology/'.$irid);
	}

	/**
	 * Display the specified resource.
	 * GET /admingeneology/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$searchKey = $id;	
		$irid = IR::GetIrIdByDisplayId($searchKey);
		if ($irid) {
				$bTreedata = Common::getGeneology($irid);
			}
			else
			{
				$bTreedata = false;
			}	
		
		if($bTreedata)
		{ 			
		return View::make('admin.Geneology')
						->with('message',"")
						->with('bTreedata',$bTreedata);
		}
		else
		{
			return View::make('admin.Geneology')
						->with('message',"Sorry, we couldn't find that IR in your network.");				

		}	
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admingeneology/{id}/edit
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
	 * PUT /admingeneology/{id}
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
	 * DELETE /admingeneology/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}