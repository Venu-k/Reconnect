@extends('layouts.admin')


@section('mainBody')
<div class="divMainBodyNoLeftRight" id="divMainBody">
    <div class="divForm">
        <div class="divMainGridHeading">
        Perfomance Overview</asp:Literal>
        </div>
        <fieldset>
            <legend>Performance by Week</legend>
            <div style="padding-top: 20px;">
	           
            	{{ Form::open(array('url' => 'admin/Network/Performance','id' => 'formMaster','method' => 'GET')) }}
          
					{{ Form::label('ddlYear', 'Selct Week:') }}
					{{ Form::select('ddlYear',array('1'=>'Select Year','2010' =>'2010','2011' =>'2011','2012' =>'2012','2013' =>'2013','2014' =>'2014','2015' =>'2015')) }}

					{{ Form::label('ddlWeek', ' ') }}
					{{ Form::select('ddlWeek', array('1' =>'Select Week'),array('id'=>'ddlWeek')) }}
					<br />
					<br />

					{{ Form::submit('Display selected week\'s performance',array('id' => 'btnWeekPerformance')) }}
					{{ Form::button('Export selected week\'s performance',array('id' => 'btnExport')) }}
			             
		        {{ Form::close() }}
                
            </div>
            <br />   
            @if(isset($performance))   
	            <div id="ctl00_mainBody_divPerformance">
	                Transactions for the selected week:
	                <span id="ctl00_mainBody_lblIRName">RTS</span>
	                <div>
	                <table class="divGrid" cellspacing="0" rules="all" border="1" id="ctl00_mainBody_gridTransactions" style="border-collapse:collapse;">
	                		<tbody>
	                		<tr>
	                			<th scope="col">MemberID</th><th scope="col">Name</th><th scope="col">Date</th><th scope="col">Policy</th><th scope="col">Amount</th><th scope="col">Status</th><th scope="col">Referred by</th>
	                		</tr>

	                		<?php 
		            		$i=1;
		            		?>
			     			@foreach ($performance as $data)
				     			<?php if($i%2 == 0){
				     			   echo "<tr class='alternate'>";
				     			  }
				     			  else
				     			  {
				     			    echo "<tr>";
				     			  }					     			
			            			$i++;
				     			  ?>
		                			<td>
		                			<a href="../Members/Member/{{ $data->irMemberID }}">
										{{ $data->irMemberID }}
									</a>
		                			</td>
		                			<td>{{ $data->irName }}</td>
		                			<td>{{  date('d/m/Y',strtotime($data->txn_date)) }}</td>
		                			<td>{{ $data->policyName }}</td>
		                			<td>{{ $data->policy_amount }}</td>
		                			<td>{{  GlobalVariables::getStatus($data->status)}}</td>
		                			<td>{{ $data->introduced_by }}</td>
		                		</tr>
							@endforeach
							@if($inputs)
		    					{{ $performance->appends($inputs)->links(); }}
	    					@else
		    					{{ $performance->links(); }}
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