<?php

class Transactions extends \Eloquent {
	protected $fillable = [];
	protected $table = 'transactions';
	public $timestamps = false;


	public static function SelectPerformanceOfAnIR($irid){
		
		$IRPerformance = DB::table('balances AS b')
						->join('weeks AS w','b.week_id','=','w.week_id')
						->leftJoin('payments AS p', function($join)
                         {
                            $join->on('p.ir_id','=','b.ir_id');
                            $join->on('p.week_id','=','b.week_id');
                         })
						->where('b.ir_id',$irid)
						->select('b.*','w.*','p.amount')
						->orderBy('b.week_id', 'desc')
						//->get();
						->paginate(100);						
		
		if($IRPerformance)
		{			
			return $IRPerformance;
		}
		else {
			return false;
		}
        
	}

	
	public static function SelectTransactionsForAWeek($weeks){
		
		$performance = DB::table('transactions AS t')
						->join('ir AS ir','t.ir_id','=','ir.id' )
						->join('product AS p','p.id','=','t.product_id')
						->join('ir AS irReferrer','t.referring_ir_id','=','irReferrer.id')						
						->select('ir.id AS irId', 
								'ir.name AS irName', 
								'ir.display_irid AS irMemberID', 
								'txn_date', 
								'p.name AS policyName', 
								'policy_amount', 
								't.status', 
								DB::raw("CONCAT(irReferrer.name, '(', irReferrer.display_irid, ')') AS introduced_by")								
							)
						->whereBetween('t.txn_date', array($weeks[0]->start_date, $weeks[0]->end_date))
						->paginate(50);
		if($performance)
		{			
			return $performance;
		}
		else {
			return false;
		}
        
	}

	public static function SelectBalancesForAWeekForPayments($weekID){	
		$payouts = DB::table('balances')
					->join('ir','ir.id','=','balances.ir_id' )
					->join('balances AS b1',function($join) use ($weekID){
						 $join->on('balances.ir_id', '=', 'b1.ir_id');
                         $join->where('balances.week_id','<=',$weekID);
					})
					->join('weeks','weeks.week_id','=','balances.week_id' )
					->leftJoin('payments AS p', function($join)
                     {
                         $join->on('balances.ir_id', '=', 'p.ir_id');
                         $join->on('balances.week_id','=','p.week_id');
                     })					
					->select('balances.*', 
							'ir.id AS irId', 
							'ir.name', 
							'ir.display_irid', 
							'p.amount AS amountPaid'							
						)						
					->where('weeks.week_id',$weekID)
					->where('ir.id','>',0)
					->orderBy('ir.id', 'desc')
					->paginate(20);						

		if($payouts)
		{	
			$i = 0;
			$len = count($payouts);			
			foreach ($payouts as $value) {	
			$payouts[$i]->amount = 0;
			$payouts[$i]->pay_status = 0;
			$payouts[$i]->admin_charges = 0;
			$payouts[$i]->amount_before_tds = 0;
			$payouts[$i]->tds = 0;
			$payouts[$i]->amount_to_pay = 0;			
				if ($i != $len){
					$curWeekId = $payouts[$i]->week_id;
					if($curWeekId == $weekID && $payouts[$i]->payout_units > 0){						
						$amount = $payouts[$i]->amountPaid == null ? $payouts[$i]->payout_units*1000 : $payouts[$i]->amountPaid;
						if($payouts[$i]->payment_id == 0 && $payouts[$i]->payout_units > 0)
							$payStatus = 'Pending';
						else
							$payStatus = "Paid";
						$adminCharge = ($payouts[$i]->payout_units*1000)/100;
						$tds = (($amount - $adminCharge) * 1000) / 100.00;
						$payouts[$i]->amount = $amount;
						$payouts[$i]->pay_status = $payStatus;
						$payouts[$i]->admin_charges = $adminCharge;
						$payouts[$i]->amount_before_tds = $amount - $adminCharge;
						$payouts[$i]->tds = $tds;
						$payouts[$i]->amount_to_pay = $amount - $tds - $adminCharge;
					}
				}

				$i++;
			}
			dd($payouts);
			return $payouts;
		}
		else {

			return false;
		}
        
	}
}
