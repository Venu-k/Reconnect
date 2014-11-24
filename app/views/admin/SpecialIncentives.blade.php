@extends('layouts.admin')


@section('mainBody')
<div class="divMainBodyNoLeftRight" id="divMainBody">
    <div class="divForm">
        <div class="divMainGridHeading">
        Special Incentives</asp:Literal>
        </div>
        <fieldset>
            <legend>Special Incentives</legend>
            <div style="padding-top: 20px;">
	           
            	{{ Form::open(array('url' => 'admin/Network/SpecialIncentives','id' => 'formMaster','method' => 'GET')) }}
          
					{{ Form::label('ddlYear', 'From Week:') }}
					{{ Form::select('ddlYear',array('1'=>'Select Year','2010' =>'2010','2011' =>'2011','2012' =>'2012','2013' =>'2013','2014' =>'2014','2015' =>'2015')) }}

					{{ Form::label('ddlWeek', ' ') }}
					{{ Form::select('ddlWeek', array('1' =>'Select Week'),array('id'=>'ddlWeek')) }}

					{{ Form::label('ddlYear1', 'To Week:') }}
					{{ Form::select('ddlYear1',array('1'=>'Select Year','2010' =>'2010','2011' =>'2011','2012' =>'2012','2013' =>'2013','2014' =>'2014','2015' =>'2015')) }}

					{{ Form::label('ddlWeek1', ' ') }}
					{{ Form::select('ddlWeek1', array('1' =>'Select Week'),array('id'=>'ddlWeek1')) }}

					<br />
					<br />

					{{ Form::submit('Show Special Incentives',array('id' => 'btnShowIncentives')) }}
					{{ Form::button('Export Special Incentives',array('id' => 'btnExport')) }}
			             
		        {{ Form::close() }}
                
            </div>
            <br />   
            @if(isset($incentives)) 
	            <div>
	            	<table class="divGrid" cellspacing="0" rules="all" border="1" id="ctl00_mainBody_gridSummary" style="border-collapse:collapse;">
	            		<tbody><tr>
	            			<th scope="col">Week</th><th scope="col">Member ID</th><th scope="col">Name</th><th scope="col">Amount</th><th scope="col">Admin Charges</th><th scope="col">TDS</th><th scope="col">Payment</th>
	            		</tr>

	                		<?php 
		            		$i=1;
		            		?>
			     			@foreach ($incentives as $data)
				     			<?php if($i%2 == 0){
				     			   echo "<tr class='alternate'>";
				     			  }
				     			  else
				     			  {
				     			    echo "<tr>";
				     			  }					     			
			            			$i++;

			            			if($data->amount != null){
			            				$formattedAmount = $data->amount;
					                    $formattedAdminCharges = $data->admin_charges;
					                    $formattedTDSCharges = $data->tds_charges;
					                    $formattedNetAmount = $data->amount - $data->admin_charges -$data->tds_charges;
			            			}
			            			else if($data->payout_units != null){

			            				$formattedAmount = $data->payout_units*1000;
					                    $formattedAdminCharges = $formattedAmount*0.05;
					                    $formattedTDSCharges = ($formattedAmount -  $formattedAdminCharges) * 0.1;
					                    $formattedNetAmount = $formattedAmount - $formattedAdminCharges - $formattedTDSCharges;
			            			}
			            			else {
			            				$formattedAmount = 0 ;
			            				$formattedAdminCharges = 0;
					                    $formattedTDSCharges = 0;
					                    $formattedNetAmount = 0;
			            			}
			            			
				     			  ?>
				     			  	<td>{{ $data->week_year.' - '.$data->week_number.' ('.Enums::displayDate($data->start_date).' to '.Enums::displayDate($data->end_date).')' }}</td>
				     			  	<td>{{ $data->display_irid }}</td>
				     			  	<td>{{ $data->name }}</td>
				     			  	<td>{{ '₹'.$formattedAmount }}</td>
				     			  	<td>{{ '₹'.$formattedAdminCharges}}</td>
				     			  	<td>{{ '₹'.$formattedTDSCharges }}</td>
				     			  	<td>{{ '₹'.$formattedNetAmount }}</td>
				     			  </tr>
							@endforeach
							@if($inputs)
		    					{{ $incentives->appends($inputs)->links(); }}
	    					@else
		    					{{ $incentives->links(); }}
	    					@endif
	                	</tbody>
	                </table>
	            </div>
            @endif

        </fieldset>

    </div>

</div>
@stop