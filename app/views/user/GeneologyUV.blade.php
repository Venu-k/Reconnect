@extends('layouts.user')

@section('mainBody')
    @parent

     <div class="divMainBody" id="divMainBody" style="width: 940px;">
		<div class="divForm">
		    <div class="divMainGridHeading" id="divmainGridHeading">
		        UV Geneology
		    </div>

		    <fieldset>
		        <legend> Options </legend>
		         {{ Form::open(array('url' => 'user/GeneologyUV','id' => 'formMaster','method' => 'GET')) }}

		         <table>
		            <tr>
		                <td>
		                {{ Form::label('irid', 'Enter Member ID to display UV Geneology:') }} 
		                
		                </td>
		                <td>
		                {{ Form::text('irid',null,array('Required' => true)) }}
		                </td>
		            </tr>
		            <tr>		           
		            <td></td>
		            <td>
		           {{ Form::submit('Display UV Geneology',array('id' => 'btnSubmit')) }}
          
		             </td>
		            </tr>
		        </table>		       
		        {{ Form::close() }}
		    </fieldset>
		   
		    @if(isset($GeneologyUV)) 

			    <div>
			     	<table class="divGrid" cellspacing="0" rules="all" border="1" id="mainBody_gridGeneology" style="border-collapse:collapse;">
			     		<tbody>
			     			<tr>
			     				<th scope="col">SlNo</th><th scope="col">Member ID</th><th scope="col">Name</th><th scope="col">Date</th><th scope="col">Policy Amount</th><th scope="col">Left CUV</th><th scope="col">Right CUV</th>
			     			</tr>
			     			<?php $i=1?>
			     			@foreach ($GeneologyUV as $geneology)
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

			     			{{ $GeneologyUV->appends(array($inputParameter => $inputValue))->links(); }}
			     			@else
			     			{{ $GeneologyUV->links(); }}
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