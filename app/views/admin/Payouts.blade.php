@extends('layouts.admin')


@section('mainBody')
<div class="divMainBodyNoLeftRight" id="divMainBody">
    <div class="divForm">
        <div class="divMainGridHeading">
        Payments</asp:Literal>
        </div>
        <fieldset>
            <legend>Payments to be made</legend>
            <div style="padding-top: 20px;">
	           
            	{{ Form::open(array('url' => 'admin/Network/Payouts','id' => 'formMaster','method' => 'GET')) }}
          
					{{ Form::label('ddlYear', 'Selct Week:') }}
					{{ Form::select('ddlYear',array('1'=>'Select Year','2010' =>'2010','2011' =>'2011','2012' =>'2012','2013' =>'2013','2014' =>'2014','2015' =>'2015')) }}

					{{ Form::label('ddlWeek', ' ') }}
					{{ Form::select('ddlWeek', array('1' =>'All'),array('id'=>'ddlWeek')) }}

					{{ Form::submit('Show Payments',array('id' => 'btnPendingPayments')) }}
					{{ Form::button('Export Payments',array('id' => 'btnExport')) }}
			             
		        {{ Form::close() }}
                
            </div>
            <br />   
            @if(isset($payouts)) 
             
	            <div id="ctl00_mainBody_divPerformance">
	                Transactions for the selected week:
	                <span id="ctl00_mainBody_lblIRName">RTS</span>
	                <div>
	                <table class="divGrid" cellspacing="0" rules="all" border="1" id="ctl00_mainBody_gridTransactions" style="border-collapse:collapse;">
	                	<tbody>
                		    <tr>
                				<th scope="col">SN</th><th scope="col">IR Id</th><th scope="col">Name</th><th align="right" scope="col">CL</th><th align="right" scope="col">CR</th><th align="right" scope="col">WL</th><th align="right" scope="col">WR</th><th align="right" scope="col">TL</th><th align="right" scope="col">TR</th><th align="right" scope="col">NCL</th><th align="right" scope="col">NCR</th><th align="right" scope="col">Amount</th><th align="right" scope="col">Admin charges</th><th align="right" scope="col">After deduction</th><th align="right" scope="col">TDS</th><th align="right" scope="col">Net amount</th><th></th><th scope="col">Status</th>
                			</tr>

	                		<?php 
		            		$i=0;
		            		?>
			     			@foreach ($payouts as $data)
			     			
				     			<?php
				     				     			
				     			if($i%2 == 0){
				     			   echo "<tr class='alternate'>";
				     			  }
				     			  else
				     			  {
				     			    echo "<tr>";
				     			  }					     			
			            			
				     			  ?>
		                			
        						<td>{{$i+1}}</td>
        						<td>
	        						<a href="../Members/Member/{{ $data->display_irid }}">
										{{ $data->display_irid }}
									</a>
        						</td>
        						<td>{{ $data->name }}</td>
        						<td align="right">
        						{{ $data->carryover_left_units }}</td>
        						<td align="right">
        						{{ $data->carryover_right_units }}</td>
        						<td align="right">{{ $data->left_units }}</td>
        						<td align="right">{{ $data->right_units }}</td>
        						<td align="right">{{ $data->display_irid }}</td>
        						<td align="right">{{ $data->display_irid }}</td>
        						<td align="right">{{ $data->carryover_left_units }}</td>
        						<td align="right">{{ $data->amount }}</td>
        						<td align="right">{{ $data->admin_charges }}</td>
        						<td align="right">{{ $data->amount_before_tds }}</td>
        						<td align="right">{{ $data->tds }}</td>
        						<td align="right">{{ $data->amount_to_pay }}</td>
        						<td><a href="payment.aspx?weekid=564&amp;irId=861">Edit</a></td>
        						<td align="right">{{ $data->pay_status }}</td>

        					</tr>
        					<?php $i++; ?>
							@endforeach
							@if($inputs)
		    					{{ $payouts->appends($inputs)->links(); }}
	    					@else
		    					{{ $payouts->links(); }}
	    					@endif
	                	</tbody>
	                	</table>
		            </div>
	            </div>
            @endif

        </fieldset>

    </div>

</div>
@stop