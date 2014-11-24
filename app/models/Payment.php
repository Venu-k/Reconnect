<?php

class Payment extends \Eloquent {
	protected $fillable = [];
	protected $table = 'payments';


	public static function GetSpecialIncentivesDetails($start_week_id, $end_week_id){
		
		$incentives = DB::table('weeks')
						->join('balances','weeks.week_id','=','balances.week_id')
						->leftJoin('payments', function($join)
                         {
                             $join->on('balances.ir_id','=','payments.ir_id');
                             $join->on('balances.week_id','=','payments.week_id');
                         })
						->join('ir','balances.ir_id','=','ir.id')
						->where('balances.payout_units','>',0)
						->whereBetween('weeks.week_id', array($start_week_id, $end_week_id))
						->select('ir.display_irid', 
								'ir.name', 
								'weeks.*', 
								'balances.*', 
								'payments.*' )
						->paginate(100);
		if($incentives)
		{			
			return $incentives;
		}
		else {
			return false;
		}
        
	}
}
