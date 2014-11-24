@extends('layouts.admin')


@section('mainBody')
	<div class="divMainBodyNoLeftRight" id="divMainBody">
	    <div class="divForm">
	        <div class="divMainGridHeading">
	        Perfomance by IR</asp:Literal>
	        </div>
	        <fieldset>
	            <legend>Performance by IR</legend>
	            <div style="padding-top: 20px;">
	            <center>
	            		{{ Form::open(array('url' => 'admin/Network/IRPerformance','id' => 'formMaster','method' => 'GET')) }}

	                        {{ Form::label('irid', 'IR ID:') }} 
	                     
	            	          {{ Form::text('irid',null,array('Required' => true)) }}
	            	          <br />
	            	          <br />
	            	          {{ Form::submit('Display selected IR\'s performance',array('id' => 'btnIRPerformance')) }}
	            	        @if($message)
	          		          <span id="mainBody_ErrorMessage" style="color:Red;font-weight:bold;">{{ $message }}</span> 
							@endif

	                    {{ Form::close() }}
	                    </center>
	            </div>
	            <br />   
	            @if(isset($IRPerformance))   
		            <div id="ctl00_mainBody_divPerformance">
		                Performance details of the selected IR: 
		                <span id="ctl00_mainBody_lblIRName">RTS</span>
		                <div>
			            	<table class="divGrid" cellspacing="0" rules="all" border="1" id="ctl00_mainBody_gridIRPerformance" style="border-collapse:collapse;">
			            		<tbody>
			            		<tr>
			            			<th scope="col">Week#</th><th scope="col">PW CF-L</th><th scope="col">PW CF-R</th><th scope="col">Total-L</th><th scope="col">Total-R</th><th scope="col">CW-L</th><th scope="col">CW-R</th><th scope="col">Paid</th><th scope="col">Amount</th><th scope="col">CW CF-L</th><th scope="col">CW CF-R</th>
			            		</tr>
			            		<?php 
			            		$i=0;
			            		$len = count($IRPerformance);
			            		$leftTotal= 0;
			            		$rightTotal= 0;
			            		?>
				     			@foreach ($IRPerformance as $data)
					     			<?php if($i%2 == 0){
					     			   echo "<tr class='alternate'>";
					     			  }
					     			  else
					     			  {
					     			    echo "<tr>";
					     			  }
						     			$leftTotal += $data->left_units;
				            			$rightTotal += $data->right_units;
				            			$amount = ($data->amount!='')?$data->amount:'0.00';			            			
					     			  ?>
				            			<td>
				            			{{ $data->week_year. ' - '.' #'. $data->week_number  }}
				            			</td>

				            			<?php 
				            				if ($i != $len - 1) {  

				            					echo '<td>'.$IRPerformance[$i+1]->carryover_left_units.'</td>';
				            					echo '<td>'.$IRPerformance[$i+1]->carryover_right_units.'</td>';
				            			    }
				            			    else
				            			    {
				            			    	echo '<td>0</td>';
				            					echo '<td>0</td>';
				            			    }

				            			?>
				            			<td>{{$leftTotal}}</td>
				            			<td>{{$rightTotal}}</td>
				            			<td>{{$data->left_units}}</td>
				            			<td>{{$data->right_units}}</td>
				            			<td>{{$data->payout_units}}</td>
				            			<td>{{'₹ '.$amount }}</td>
				            			<td>{{$data->carryover_left_units}}</td>
				            			<td>{{$data->carryover_right_units}}</td>
				            		</tr>
				            		<?php $i++; ?>			            		
								@endforeach
								@if($inputs)
			    					{{ $IRPerformance->appends($inputs)->links(); }}
		    					@else
			    					{{ $IRPerformance->links(); }}
		    					@endif

				            	</tbody>
			            	</table>
			            </div>
		            </div>
	            @endif

	        </fieldset>


			<p style="margin-left:10px;">
			<b>Legend:</b>
			<br />
			<b>PW CF-L:</b> Prior Week Carry Forward Left UV count
			<br />
			<b>PW CF-R:</b> Prior Week Carry Forward Right UV count
			<br />
			<b>CW-L:</b> Current Week Left UV count
			<br />
			<b>CW-R:</b> Current Week Right UV count
			<br />
			<b>CW CF-L:</b> Current Week Carry Forward Left UV count
			<br />
			<b>CW CF-R:</b> Current Week Carry Forward Right UV count
			</p>


	    </div>

	</div>

@stop