<?php

class IR extends \Eloquent {
	protected $fillable = [];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ir';
	public $timestamps = false;
	
	/*
	* get id by display IRID
	*/
	public static function GetIrIdByDisplayId($searchKey)
	{

		$ids = DB::table('ir')			
			    ->where('display_irid',$searchKey)	    
			    ->get(array('id'));			   
			    if ($ids) {			    		    	
			    	return $ids[0]->id;
			    }
			    else{
			    	return false;
			    }
	}

	

	public static function getBTreeData($irid)
	{	

	    $treeData = DB::table('ir')	   					
				->join('balances','ir.id','=','balances.ir_id')	
				->where('ir.id',$irid)
			    ->get(array(
			        DB::raw( 'SUM(balances.left_units) AS lcuv' ),
			        DB::raw( 'SUM(balances.right_units) AS rcuv' ),
			        'ir.id',
			        'ir.name',
			        'ir.display_irid'
			    ));
		if($treeData)
		{
			return  $treeData;  

		}
		else
		{
			return '';
		}
		   
	}


	public static function GenerateIrId($district)
	{
		/*$id = 'ATP1103';
		$str5 = DB::table('ir')
				->where('display_irid','LIKE',$id.'%')
				->where('display_irid','NOT LIKE', '%-%')
				->orderBy('display_irid', 'DESC')								
				->first(array('display_irid'));	
		$uniqueID = substr($str5->display_irid, 0, 7);	
		$sequence = substr($str5->display_irid, 7, 3) + 1;	

		 if ($sequence < 10)
	      {
	        $str6 = $uniqueID."00".$sequence;
	      }
	      else if ($sequence < 100)
	      {
	        $str6 = $uniqueID."0".$sequence;
	      }
	      else
	        $str6 = $uniqueID.$sequence;

	    dd($str6);*/

       
		$district_short_name = DB::table('districts')
									->where('id',$district)
									->get(array('district_short_name'));
		$str1 = $district_short_name[0]->district_short_name.date("y").date("m");
	    $str2 = $str1;
	    $str3 = "001";
	    $str4 = $str1.$str3;
	    $tableData = DB::table('ir')
	    				->where('display_irid',$str4)
	    				->get();
		    if (!$tableData) {
		    	return $str4;
		    } else {

		    	$str5 = DB::table('ir')
					->where('display_irid','LIKE',$str1.'%')
					->where('display_irid','NOT LIKE', '%-%')
					->orderBy('display_irid', 'DESC')								
					->first(array('display_irid'));	
				$uniqueID = substr($str5->display_irid, 0, 7);	
				$sequence = substr($str5->display_irid, 7, 3) + 1;	

				 if ($sequence < 10)
			      {
			        $str6 = $uniqueID."00".$sequence;
			      }
			      else if ($sequence < 100)
			      {
			        $str6 = $uniqueID."0".$sequence;
			      }
			      else
			      {
			      	$str6 = $uniqueID.$sequence;
			      }
			      return $str6;
		            	
	    }
	}


	public static function GetRootIdByIrId($irid)
	{
		$root = DB::table('network')
				->where('left_ir_id',$irid)
			    ->orWhere('right_ir_id',$irid)
				->join('ir','ir.id','=','network.ir_id')
			    ->get(array('ir.display_irid','ir.name'));			    		   
			    if ($root) {	    	
			    	
					return $root;						    
			   }
			    else{
			    	return '';
			    }
	}

	public static function GetChildIrId($irid)
	{	
		$irid = DB::table('network')					    			
						    ->where('ir_id',$irid)
						    ->get(array('left_ir_id','right_ir_id'));	
		if ($irid) {			
			return $irid;
		} else {			
			return false;
		}		
	}

	

	



	


}