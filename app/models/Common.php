<?php

class Common extends \Eloquent {
	protected $fillable = [];


	public static function getAnnouncements(){
		$id = 1;
		if($announcements = DB::table('announcements')
							->where('announcement_id',$id)
    						->get(array('title','message','startdate','enddate'))){

			foreach ($announcements as $key => $value)
			{
				
				$announcement = $value;
				
			}
		
		return $announcement;
		}
        
	}

	

	/*
	| Get districts route
	*/

	public static function getDistricts($stateID){
    	
    	$districts = DB::table('districts')
    					->where('state_id',$stateID)
    					->get(array('id','district_name'));
			
		foreach ($districts as $district)
		{			
		    // Create the products options array
		    $districtOpt[$district->id] = $district->district_name;
		}
		
    	return $districtOpt;	
        
	}
	/*
	| Get Weeks By Year
	*/
	public static function getWeeks($year){		
		$weeks = DB::table('weeks')
	    					->where('week_year',$year)
	    					->get();

	    	if($weeks) 
	    	{
	    		return $weeks;								
	    	}
	    	else{
				return false;
	    	}								
			
			
	}


	/*
	| Get start and end dates by week id
	*/
	public static function getWeekDates($weekID){

		$weeks = DB::table('weeks')
					->where('week_id',$weekID)
					->get(array('start_date','end_date'));
		
    	if($weeks) 
    	{
    		return $weeks;								
    	}
    	else{
			return false;
    	}								
			
			
	}




	/*
	| Validate Placement ID route
	*/

	public static function validatePossition($placementId){
		
		if($introducer = DB::table('ir')->where('placementid', $placementId)->first())
    	{
    		if ($introducer->right_occupied == 0 && $introducer->left_occupied == 0) {
    			return "Both";
    		}
    		elseif ($introducer->right_occupied == 0 || $introducer->left_occupied == 0) {
	    		
		    		if($introducer->left_occupied == 0)
		    		{
		    			return "Left";

		    		}
		    		elseif ($introducer->right_occupied == 0) {
		    			return "Right";
		    		}
	    		}
    		
    		else {

    			return "No postions are available for this placement ID. Please check and enter again.";
    		}
			

		}
		else{
			return "Invalid IR ID. Please check and enter again.";
		}
		
        
	}

	/*
	* Validate Introducer Id route
	*/
	public static function validateIntroducer($introducerId){
    	
    	if($introducer = DB::table('ir')->where('display_irid', $introducerId)->first())
    	{
			return "<span style='color:Blue;' class='divIntroducerValidation'>Introduced by: ".$introducer->name."</span>";

		}
		else{
			return "<span style='color:red;' class='divIntroducerValidation'>Invalid IR ID. Please check and enter again.</span>";
		}	
        
	}


	/*
	* get ID Proof options
	*/
	public static function getIdProofList(){
		$lookup = DB::table('lookup')->get(array('id','lookupValue'));
		foreach ($lookup as $value)
		{			
		    // Create the id proof options array
		    $idProofOpt[$value->id] = $value->lookupValue;
		}
		return $idProofOpt;
	}


	/*
	* get ID Product options
	*/
	public static function getProductsList(){
		$products = DB::table('product')->get(array('id','product.name'));
			
		foreach ($products as $product)
		{			
		    // Create the products options array
		    $productOpt[$product->id] = $product->name;

		}
		return $productOpt;
	}


	/*
	* get ID States options
	*/
	public static function getStatesList(){
		$states = DB::table('state')->get(array('id','statename'));
			
		foreach ($states as $state)
		{			
		    // Create the products options array
		    $stateOpt[$state->id] = $state->statename;
		}
		return $stateOpt;
	}

	
	/*
	* get ID Districts options
	*/
	public static function getDistrictsList(){
		$districts = DB::table('districts')->where('state_id',1)->get(array('id','district_name'));
			
		foreach ($districts as $district)
		{			
		    // Create the products options array
		    $districtOpt[$district->id] = $district->district_name;
		}
		return $districtOpt;
	}

	

	





	

/*
	public static function getSubChildElements($irid,$list)
	{		
		$dataTable = DB::table('network')					    			
					    ->where('ir_id',$irid)
					    ->get(array('left_ir_id','right_ir_id'));

				
		if($dataTable)
		{
			$irid1 = $dataTable[0]->left_ir_id;      		
		}

		if ($irid1 > 0)
		{	


			$list = array_add($list,$irid1,$irid1);	
			
			IR::getChildElements($irid1,$list);						
							
		}
		if($dataTable)
		{			
      		$irid2 = $dataTable[0]->right_ir_id;	
		}
		if ($irid2 > 0)
		{

			$list = array_add($list,$irid2,$irid2);		
			IR::getChildElements($irid2,$list);
		}
	}
	public static function getChildElements($irid,$list)
	{	

		$dataTable = IR::GetChildIrId($irid);


		if($dataTable)
		{
			$irid1 = $dataTable[0]->left_ir_id;      		
		}

		if ($irid1 > 0)
		{
			$list = array_add($list,$irid1,$irid1);			
			IR::getSubChildElements($irid1,$list);
			dd($list);	
		}
		if($dataTable)
		{			
      		$irid2 = $dataTable[0]->right_ir_id;	
		}
		if ($irid2 > 0)
		{

			$list = array_add($list,$irid2,$irid2);		
			IR::getSubChildElements($irid2,$list);
		}

		

		
	}*/


	/* 
	===================
	Admin Operations 
	===================
	*/

	public static function SearchPendingTransactions($name,$memberId,$startDate,$endDate,$status){

		$selectStatement = DB::table('ir')
							->join('transactions AS t','t.ir_id','=','ir.id')
							->join('product AS p','p.id','=','t.product_id')
							->join('ir AS ir1 ','t.referring_ir_id','=','ir1.id')
							->select(
								'ir.id', 
								'ir.display_irid', 
								'ir.name', 
								't.policy_date',
								't.policy_holder_name', 
								'p.name AS productName', 
								'policy_amount', 
								'receipt_number',
								DB::raw("CONCAT(ir1.name, '(', ir1.display_irid, ')') AS introduced_by")
								)
							->where('ir.id','>',0)
							->where('t.status',$status);

							
							if($name != null)
							{															
								$selectStatement = $selectStatement->where('ir.name','LIKE','%'.$name.'%');

							}
							if($memberId != null)
							{
																
								$selectStatement->where('ir.display_irid','LIKE','%'.$memberId.'%');

							}
							if($startDate != null)
							{

								$selectStatement->where('t.policy_date','>=',$startDate);

							}
							if($endDate != null)
							{
								
								$selectStatement->where('t.policy_date','<=',$endDate);

							}

							$selectStatement = $selectStatement->get();						
							
							if($selectStatement)
							{								
								return $selectStatement;
							}							

	}




	public static function Search($name,$memberId,$startDate,$endDate){

		$selectStatement = DB::table('ir')
							->join('transactions AS t','t.ir_id','=','ir.id')							
							->join('ir AS ir1 ','t.referring_ir_id','=','ir1.id')
							->select('*',DB::raw("CONCAT(ir1.name, '(', ir1.display_irid, ')') AS introduced_by"))
							->where('ir.id','>',0)
							->where('t.status',1);
							

							
							if($name != null)
							{															
								$selectStatement = $selectStatement->where('ir.name','LIKE','%'.$name.'%');

							}
							if($memberId != null)
							{
																
								$selectStatement->where('ir.display_irid','LIKE','%'.$memberId.'%');

							}
							if($startDate != null)
							{

								$selectStatement->where('t.policy_date','>=',$startDate);

							}
							if($endDate != null)
							{
								
								$selectStatement->where('t.policy_date','<=',$endDate);

							}
							$selectStatement = $selectStatement->paginate(50);
							
							
							if($selectStatement)
							{

								return $selectStatement;
							}

	}


	public static function SearchActivePolicies($name, $memberId, $productId, $policyAmount)
    {
    	$selectStatement = DB::table('ir')
							->join('transactions AS t','t.ir_id','=','ir.id')							
							->join('product AS p ','p.id','=','t.product_id')
							->select('ir.id','ir.display_irid','ir.name','t.policy_holder_name','t.policy_date','p.name AS productName','policy_amount','receipt_number','t.txn_date',DB::raw("IF(policy_amount = 15000, 1.0, 2.0) AS cuv"))
							->where('ir.id','>',0)
							->where('t.status',1);
							if($name != null)
							{															
								$selectStatement = $selectStatement->where('ir.name','LIKE','%'.$name.'%');

							}
							if($memberId != null)
							{
																
								$selectStatement->where('ir.display_irid','LIKE','%'.$memberId.'%');

							}
							if($productId > 0)
							{

								$selectStatement->where('t.product_id',$productId);

							}
							if($policyAmount > 0 )
							{
								
								$selectStatement->where('t.policy_amount',$policyAmount);

							}
							$selectStatement = $selectStatement->paginate(50);
							
							
							if($selectStatement)
							{								
								return $selectStatement;
							}

    }

    
}