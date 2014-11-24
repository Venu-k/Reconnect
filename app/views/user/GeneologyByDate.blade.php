@extends('layouts.user')


@section('mainBody')
    @parent

    <div class="divMainBody" id="divMainBody" style="width: 940px;">
		<div class="divForm">
		    <div class="divMainGridHeading" id="divmainGridHeading">
		        Geneology BY Date
		    </div>
		    <fieldset>
		        <legend> Options </legend>

		        {{ Form::open(array('url' => 'user/GeneologyByDate','id' => 'formMaster','method' => 'GET')) }}
          
		        <table>
		            <tr>
		                <td>
		                {{ Form::label('irid', 'Enter Member ID to display Geneology:') }} 
		                
		                </td>
		                <td>
		                {{ Form::text('irid',null,array('Required' => true)) }}
		                </td> 
		                <td>
		                {{ Form::label('ddlYear', ' ') }}
		                {{ Form::select('ddlYear',array('1'=>'Select Year','2010' =>'2010','2011' =>'2011','2012' =>'2012','2013' =>'2013','2014' =>'2014','2015' =>'2015')) }}

						{{ Form::label('ddlWeek', ' ') }}
		                {{ Form::select('ddlWeek', array('1' =>'Select Week'),array('id'=>'ddlWeek')) }}
		                </td>   
		            </tr>
		            <tr>
		            <td></td>
		            <td></td>
		            <td>
		           {{ Form::submit('Display Geneology',array('id' => 'btnNetworkTree')) }}
          
		             </td>
		            </tr>
		        </table>
		        {{ Form::close() }}
		    </fieldset>
		    
		        @if($geneologyByDate) 

		    	    <div>
		    	     	<table class="divGrid" cellspacing="0" rules="all" border="1" id="mainBody_gridGeneology" style="border-collapse:collapse;">
		    	     		<tbody>
		    	     			<tr>
		    	     				<th scope="col">SlNo</th><th scope="col">Member ID</th><th scope="col">Name</th><th scope="col">Date</th><th scope="col">Policy Amount</th><th scope="col">Left CUV</th><th scope="col">Right CUV</th>
		    	     			</tr>
		    	     			<?php $i=1?>
		    	     			@foreach ($geneologyByDate as $geneology)
		    	     			<?php if($i%2 == 0){
		    	     			   echo "<tr class='alternate'>";
		    	     			  }
		    	     			  else
		    	     			  {
		    	     			    echo "<tr>";
		    	     			  }
		    	     			  ?>

		    	     			    <td>{{ $i }}</td>
		    	     			    <td>{{ $geneology->display_irid }}</td>
		    	     			    <td>{{ $geneology->name }}</td>
		    	     			    <td>{{ $geneology->txn_date }}</td>
		    	     			    <td>{{ $geneology->policy_amount }}</td>
		    	     			    <td>{{ $geneology->qty }}</td>
		    	     			    <td>{{ $geneology->qty }}</td>
		    	     			  </tr>
		    	     			  <?php $i++ ?>
		    	     			@endforeach

		    	     			@if($inputParameter)           

		    	     			{{ $geneologyByDate->appends($inputParameters))->links(); }}
		    	     			@else
		    	     			{{ $geneologyByDate->links(); }}
		    	     			@endif 
		    	     			
		    	     		</tbody>
		    	     	</table>
		    	    </div>

		    	@endif

		        @if($message)
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