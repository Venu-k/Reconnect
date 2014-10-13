@extends('layouts.user')


@section('mainBody')
    @parent

     <div class="divMainBody" id="divMainBody" style="width: 940px;">
		<div class="divForm">
		    <div class="divMainGridHeading" id="divmainGridHeading">
		        Summary
		    </div>

		     <fieldset>
		        <legend> Options </legend>

		        {{ Form::open(array('url' => 'user/IRSummary','id' => 'formMaster','method' => 'GET')) }}
          
		        <table>
		            <tr>
		                
		                <td>
		                {{ Form::label('ddlYear', 'Selct Week:') }}
		                {{ Form::select('ddlYear',array('2010' =>'2010','2011' =>'2011','2012' =>'2012','2013' =>'2013','2014' =>'2014','2015' =>'2015')) }}

						{{ Form::label('ddlWeek', ' ') }}
		                {{ Form::select('ddlWeek', array('1' =>'All'),array('id'=>'ddlWeek')) }}
		                </td>   
		            </tr>
		            <tr>
		            
		            <td>
		           {{ Form::submit('Display Summary',array('id' => 'btnNetworkTree')) }}
          
		             </td>
		            </tr>
		        </table>
		        {{ Form::close() }}
		    </fieldset>
		   
		    @if(isset($IRSummary)) 

			    <div>
			     	<table class="divGrid" cellspacing="0" rules="all" border="1" id="mainBody_gridGeneology" style="border-collapse:collapse;">
			     		<tbody>
			     			<tr>
			     				<th scope="col">SlNo</th><th scope="col">Member ID</th><th scope="col">Name</th><th scope="col">Date</th><th scope="col">Policy Amount</th><th scope="col">Left CUV</th><th scope="col">Right CUV</th>
			     			</tr>
			     			<?php $i=1?>
			     			@foreach ($IRSummary as $Summary)
			     			<?php if($i%2 == 0){
			     			   echo "<tr class='alternate'>";
			     			  }
			     			  else
			     			  {
			     			    echo "<tr>";
			     			  }
			     			  ?>

			     			    <td>{{ $i }}</td>
			     			    <td>{{ $Summary->display_irid }}</td>
			     			    <td>{{ $Summary->name }}</td>
			     			    <td>{{ $Summary->txn_date }}</td>
			     			    <td>{{ $Summary->policy_amount }}</td>
			     			    <td>{{ $Summary->qty }}</td>
			     			    <td>{{ $Summary->qty }}</td>
			     			  </tr>
			     			  <?php $i++ ?>
			     			@endforeach

			     			@if($inputParameter)           

			     			{{ $IRSummary->appends(array($inputParameter => $inputValue))->links(); }}
			     			@else
			     			{{ $IRSummary->links(); }}
			     			@endif 
			     			
			     		</tbody>
			     	</table>
			    </div>

		    @elseif(isset($message))
		    <div>
		    	<table class="divGrid" cellspacing="0" rules="all" border="1" id="mainBody_gridGeneology" style="border-collapse:collapse;">
		    		<tbody>
			    		<tr>
			    			<td colspan="7">{{ $message }}</td>
			    		</tr>
			    	</tbody>
		    	</table>
		    </div>
		    @endif

		   

		</div>
		
	</div>

@stop