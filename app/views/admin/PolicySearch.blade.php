@extends('layouts.admin')


@section('mainBody')
    <div class="divLeftBody" id="divLeftBody" style="width: 170px;">

        <div class="divSideBoxHeading">
        Options
        </div>
        <div class="divSideBox">
	        <ul class="options">
	        <li><asp:LinkButton ID="lbExport" runat="server" Text="Export Pending Transactions" OnClick="ExportResultSet"></asp:LinkButton></li>
	        </ul>
        </div>

        <div class="divSideBoxHeading">
        Search
        </div>

        <div class="divSideBox">
         {{ Form::open(array('url' => 'admin/Members/PolicySearch','id' => 'formMaster','method' => 'GET')) }}

	        <div>
		        {{ Form::label('tbName', 'Name:') }}
		        Name:<br />
		        {{ Form::text('tbName',null,array('maxlength' => '20')) }}
	        </div>

	        <div>
				{{ Form::label('tbMemberID', 'Member ID:') }} 
				<br />
				{{ Form::text('tbMemberID',null,array('maxlength' => '20')) }}
	        </div>

	        <div>
	        {{ Form::label('ddlPolicyName', 'Policy Name:') }} 
	        <br />
	        <select name='ddlPolicyName' id='ddlPolicyName'>
	            <option value="0">All</option>
	            @foreach($products as $product)
	            <option value="{{ $product->id }}">{{ $product->name }}</option>
	            @endforeach
	        </select>       	        
	         
	        </div>
	        <div>
	        {{ Form::label('tbPolicyAmount', 'Policy Amount:') }} 
	        <br />
	        {{ Form::text('tbPolicyAmount',null,array('maxlength' => '20')) }}        
	        </div>
	         {{ Form::submit('Search',array('id' => 'btnSearch')) }}
	        {{ Form::close() }} 
        </div>
        

    </div>
    <div class="divMainBody" id="divMainBody" style="width: 790px;">
	    <div class="divForm">

		    <div class="divMainGridHeading">
		        Active Policies
		    </div>
		        @if($PolicySearch)   
		        	
		    	    <div>		    	   
		    	    	<table class="divGrid" cellspacing="0" rules="all" border="1" id="ctl00_mainBody_grid" style="border-collapse:collapse;">
		    	    		<tbody>
		    		    		<tr>
		    		    			<th scope="col">SN</th>
		    		    			<th scope="col">Member ID</th>
		    		    			<th scope="col">Name</th>
		    		    			<th scope="col">Policy Holder</th>
		    		    			<th scope="col">Purchase Date</th>
		    		    			<th scope="col">Policy Name</th>
		    		    			<th scope="col">Receipt Number</th>
		    		    			<th scope="col">Policy Amount</th>
		    		    			<th scope="col">Approved on</th>
		    		    			<th scope="col">CUV</th>
		    		    		</tr>
		    					<?php $i=1?>
		    					@foreach ($PolicySearch as $Policy)
		    					<?php if($i%2 == 0){
		    					   echo "<tr class='alternate'>";
		    					  }
		    					  else
		    					  {
		    					    echo "<tr>";
		    					  }
		    					  ?>
		    					  <td>{{ $i }}</td>
		    					  <td>
									<a href="Member/{{$Policy->display_irid}}">
										{{ $Policy->display_irid }}
									</a>
									</td>
		    					    <td>{{ $Policy->name }}</td>
		    					    <td>{{ $Policy->policy_holder_name }}</td>
		    					    <td>{{ date("d-m-Y", strtotime($Policy->policy_date)) }}</td>
		    					    <td>{{ $Policy->productName }}</td>
		    					    <td>{{ $Policy->receipt_number }}</td>
		    					    <td>{{ $Policy->policy_amount }}</td>
		    					    <td>{{ date("d-m-Y", strtotime($Policy->txn_date)) }}</td>
		    					    <td>{{ $Policy->cuv }}</td>
		    					    
		    					  </tr>
		    					  <?php $i++ ?>
		    					@endforeach
		    					@if($inputs)
			    					{{ $PolicySearch->appends($inputs)->links(); }}
		    					@else
			    					{{ $PolicySearch->links(); }}
		    					@endif
		    					
		    		    	</tbody>
		    	    	</table>		    	    	
		    	    </div>

		        @else
		    	    <div>
		    	    	<table class="divGrid" cellspacing="0" rules="all" border="1" id="ctl00_mainBody_grid" style="border-collapse:collapse;">
		    	    		<tbody><tr>
		    	    			<td colspan="11">No records found</td>
		    	    		</tr>
		    	    	</tbody></table>
		    	    </div>
		    	@endif
	        
	    </div>
    </div>
   
@stop