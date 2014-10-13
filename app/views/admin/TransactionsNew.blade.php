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
         {{ Form::open(array('url' => 'admin/Members/TransactionsNew','id' => 'formMaster','method' => 'GET')) }}

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
	        {{ Form::label('tbStartDate', 'Transaction Start Date:') }} 
	        <br />
	        <input type="date" name="tbStartDate" id='tbStartDate'>
	        </div>
        

	        <div>
	        {{ Form::label('tbEndDate', 'Transaction End Date:') }} 
	        <br />
	        <input type="date" name="tbEndDate" id='tbEndDate'>	        
	        </div>
	         {{ Form::submit('Search',array('id' => 'btnSearch')) }}
	        {{ Form::close() }} 
        </div>
        

    </div>
    
    <div class="divMainBody" id="divMainBody" style="width: 790px;">
    <div class="divForm">

    <div class="divMainGridHeading">
       <span id="ctl00_mainBody_lblTitle">New Customers</span>
    </div>

    @if($TransactionsNew)	   

	    <div>
	    {{ Form::open(array('url' => 'admin/TransactionsNew','id' => 'formMaster','method' => 'POST')) }}
	    	<table class="divGrid" cellspacing="0" rules="all" border="1" id="ctl00_mainBody_grid" style="border-collapse:collapse;">
	    		<tbody>
		    		<tr>
		    			<th scope="col">
		    			&nbsp;
		    			</th>
		    			<th scope="col">SN</th>
		    			<th scope="col">Member ID</th>
		    			<th scope="col">Name</th>
		    			<th scope="col">Policy Date</th>
		    			<th scope="col">Policy Holder Name</th>
		    			<th scope="col">Policy Name</th>
		    			<th scope="col">Policy Amount</th>
		    			<th scope="col">Receipt Number</th>
		    			<th scope="col">Introduced by</th>
		    		</tr>
					<?php $i=1?>
	     			@foreach ($TransactionsNew as $Transaction)
	     			
	     			<?php if($i%2 == 0){
	     			   echo "<tr class='alternate'>";
	     			  }
	     			  else
	     			  {
	     			    echo "<tr>";
	     			  }
	     			  ?>
						<td>
						<input id="ctl00_mainBody_grid_ctl02_chkSelect" type="checkbox" name="ctl00$mainBody$grid$ctl02$chkSelect">
						</td>
						<td>{{ $i }}</td>
						<td>
						<a href="Member/{{ $Transaction->display_irid }}">
							{{ $Transaction->display_irid }}
						</a></td>

						<td>{{ $Transaction->name }}</td>
						<td>{{ date("d-m-Y", strtotime($Transaction->policy_date)) }}</td>
						<td>{{ $Transaction->policy_holder_name }}</td>
						<td>{{ $Transaction->productName }}</td>
						<td>{{ $Transaction->policy_amount }}</td>
						<td>{{ $Transaction->receipt_number }}</td>
						<td>{{ $Transaction->introduced_by }}</td>
					</tr>
					<?php $i++ ?>
					@endforeach
		    	</tbody>
	    	</table>
	    	{{ Form::submit('Approve Selected',array('id' => 'btnSubmit','method'=>'post')) }}
		    {{ Form::close() }}
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