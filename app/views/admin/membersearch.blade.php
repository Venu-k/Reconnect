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
         {{ Form::open(array('url' => 'admin/Members/membersearch','id' => 'formMaster','method' => 'GET')) }}

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
	        {{ Form::label('tbStartDate', 'Join Date From:') }} 
	        <br />
	        <input type="date" name="tbStartDate" id='tbStartDate'>
	        </div>
        

	        <div>
	        {{ Form::label('tbEndDate', 'Join Date To:') }} 
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
		        Members
		    </div>
		        @if($membersearch)	   

		    	    <div>		    	   
		    	    	<table class="divGrid" cellspacing="0" rules="all" border="1" id="ctl00_mainBody_grid" style="border-collapse:collapse;">
		    	    		<tbody>
		    		    		<tr>
		    		    			<th scope="col">SN</th>
		    		    			<th scope="col">Member ID</th>
		    		    			<th scope="col">Name</th>
		    		    			<th scope="col">Join Date</th>
		    		    			<th scope="col">Email</th>
		    		    			<th scope="col">Mobile</th>
		    		    			<th scope="col">Home</th>
		    		    			<th scope="col">Introduced by</th>
		    		    		</tr>
		    					<?php $i=0?>
		    					@foreach ($membersearch as $member)
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
									<a href="Member/{{ $member->display_irid }}">
										{{ $member->display_irid }}
									</a>
									</td>		    					   
		    					    <td>{{ $member->name }}</td>
		    					    <td>{{ date("d-m-Y", strtotime($member->start_date)) }}</td>
		    					    <td>{{ $member->emailaddress }}</td>
		    					    <td>{{ $member->phone_mobile }}</td>
		    					    <td>{{ $member->phone_home }}</td>
		    					    <td>{{ $member->introduced_by }}</td>
		    					  </tr>
		    					  <?php $i++ ?>
		    					@endforeach
		    					@if($inputs)
			    					{{ $membersearch->appends($inputs)->links(); }}
		    					@else
			    					{{ $membersearch->links(); }}
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