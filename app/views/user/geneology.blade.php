@extends('layouts.user')


@section('mainBody')
    @parent
<div class="divMainBody" id="divMainBody" style="width: 790px;">
        <h2>
            Geneology
        </h2>
        <fieldset>
            <legend>Options</legend>
		{{ Form::open(array('url' => 'user/geneology','id' => 'formMaster','method' => 'GET')) }}

            {{ Form::label('irid', 'Enter starting Member ID to display Geneology:') }} 
         
          {{ Form::text('irid',null,array('Required' => true)) }}
          
          <br />
          
          {{ Form::submit('Display Geneology',array('id' => 'btnNetworkTree')) }} 
           	@if($message)
		          <span id="mainBody_ErrorMessage" style="color:Red;font-weight:bold;">{{ $message }}</span> 
          	@endif
         
        
          {{ Form::close() }}   


        </fieldset>

@if(isset($bTreedata))

	@if($bTreedata['rootID'] != '')
	<a href="geneology?irid=<?= $bTreedata["rootID"] ?>">Move up the tree: {{ $bTreedata['rootName'] }}(Membership ID: {{ $bTreedata['rootID'] }})</a>
	@endif
	
	<div id="treeTableDiv" style="overflow: hidden; height: 224px; border: 3px none rgb(0, 0, 0); position: relative; width: 634px;"> 

		<!-- Root Node -->

		<div style="border-style: inset; position: absolute; bottom: 156px; left: 241.5px; border-width: 0px; width: 151px; height: 68px;">
		
			<span style="white-space: nowrap; display: inline-block;">
				<table class="networkTable">
					<tbody>
						<tr class="networkDetails">
						<td class="networkDetailsCell" colspan="2">
						<span class="networkName">
						{{ $bTreedata['parent'][0]->name }}
						</span>
						<br>
						IR ID:
						<a class="networkLink" href="geneology?irid=<?= $bTreedata["parent"][0]->display_irid?>">
						{{ $bTreedata["parent"][0]->display_irid }}
						</a>
						</td>
						</tr>
						<tr class="networkHeader">
						<td style="text-align:left;"> 
						LCUV: {{ $bTreedata["parent"][0]->lcuv }}
						</td>
						<td style="text-align:right;">
						RCUV: {{ $bTreedata["parent"][0]->rcuv }}
						</td>
						</tr>
						<tr class="networkFooter" cellpadding="0" cellspacing="0">
						<td class="networkFooterCell" colspan="2">Direct Referrals: 0
						</td>
						</tr>
					</tbody>
				</table>
			</span>
		</div>
		<!-- Left Child -->
		
		<div style="border-style: inset; position: absolute; bottom: 78px; left: 80.5px; border-width: 0px; width: 151px; height: 68px;">
			@if($bTreedata['lChild'][0]->display_irid != '')
				<span style="white-space: nowrap; display: inline-block;">
					<table class="networkTable">
						<tbody>
							<tr class="networkDetails">
							<td class="networkDetailsCell" colspan="2">
							<span class="networkName">
							{{ $bTreedata['lChild'][0]->name }}
							</span>
							<br>
							IR ID:
							<a class="networkLink" href="geneology?irid=<?= $bTreedata["lChild"][0]->display_irid?>">
							{{ $bTreedata["lChild"][0]->display_irid }}
							</a>
							</td>
							</tr>
							<tr class="networkHeader">
							<td style="text-align:left;"> 
							LCUV: {{ $bTreedata["lChild"][0]->lcuv }}
							</td>
							<td style="text-align:right;">
							RCUV: {{ $bTreedata["lChild"][0]->rcuv }}
							</td>
							</tr>
							<tr class="networkFooter" cellpadding="0" cellspacing="0">
							<td class="networkFooterCell" colspan="2">Direct Referrals: 0
							</td>
							</tr>
						</tbody>
					</table>
					
				</span>
			@else
				<span style="white-space: nowrap; display: inline-block;">
					<div style="height: 35px;" class="networkVacant">VACANT</div>
				</span>
			@endif
			
		</div>
		
		<!-- Left Child Left node -->
		<div style="border-style: inset; position: absolute; bottom: 0px; left: 0px; border-width: 0px; width: 151px; height: 68px;" id="box1">	
			@if($bTreedata['llChild'][0]->display_irid != '')	
			<span style="white-space: nowrap; display: inline-block;">
				<table class="networkTable">
					<tbody>
						<tr class="networkDetails">
						<td class="networkDetailsCell" colspan="2">
						<span class="networkName">
						{{ $bTreedata['llChild'][0]->name }}
						</span>
						<br>
						IR ID:
						<a class="networkLink" href="geneology?irid=<?= $bTreedata["llChild"][0]->display_irid?>">
						{{ $bTreedata["llChild"][0]->display_irid }}
						</a>
						</td>
						</tr>
						<tr class="networkHeader">
						<td style="text-align:left;"> 
						LCUV: {{ $bTreedata["llChild"][0]->lcuv }}
						</td>
						<td style="text-align:right;">
						RCUV: {{ $bTreedata["llChild"][0]->rcuv }}
						</td>
						</tr>
						<tr class="networkFooter" cellpadding="0" cellspacing="0">
						<td class="networkFooterCell" colspan="2">Direct Referrals: 0
						</td>
						</tr>
					</tbody>
				</table>
			</span>			
			@else
				<span style="white-space: nowrap; display: inline-block;">
					<div style="height: 35px;" class="networkVacant">VACANT</div>
				</span>
			@endif
		</div>
		<!-- Left Child Right node -->
		<div style="border-style: inset; position: absolute; bottom: 0px; left: 161px; border-width: 0px; width: 151px; height: 68px;">	
			@if($bTreedata['lrChild'][0]->display_irid != '')	
			<span style="white-space: nowrap; display: inline-block;">
				<table class="networkTable">
					<tbody>
						<tr class="networkDetails">
						<td class="networkDetailsCell" colspan="2">
						<span class="networkName">
						{{ $bTreedata['lrChild'][0]->name }}
						</span>
						<br>
						IR ID:
						<a class="networkLink" href="geneology?irid=<?= $bTreedata["lrChild"][0]->display_irid?>">
						{{ $bTreedata["lrChild"][0]->display_irid }}
						</a>
						</td>
						</tr>
						<tr class="networkHeader">
						<td style="text-align:left;"> 
						LCUV: {{ $bTreedata["lrChild"][0]->lcuv }}
						</td>
						<td style="text-align:right;">
						RCUV: {{ $bTreedata["lrChild"][0]->rcuv }}
						</td>
						</tr>
						<tr class="networkFooter" cellpadding="0" cellspacing="0">
						<td class="networkFooterCell" colspan="2">Direct Referrals: 0
						</td>
						</tr>
					</tbody>
				</table>
			</span>
			@else
				<span style="white-space: nowrap; display: inline-block;">
					<div style="height: 35px;" class="networkVacant">VACANT</div>
				</span>
			@endif
		</div>
		<!-- Right Child -->
		<div style="border-style: inset; position: absolute; bottom: 78px; left: 402.5px; border-width: 0px; width: 151px; height: 68px;">
			@if($bTreedata['rChild'][0]->display_irid != '')
			<span style="white-space: nowrap; display: inline-block;">
				<table class="networkTable">
					<tbody>
						<tr class="networkDetails">
						<td class="networkDetailsCell" colspan="2">
						<span class="networkName">
						{{ $bTreedata['rChild'][0]->name }}
						</span>
						<br>
						IR ID:
						<a class="networkLink" href="geneology?irid=<?= $bTreedata["rChild"][0]->display_irid?>">
						{{ $bTreedata["rChild"][0]->display_irid }}
						</a>
						</td>
						</tr>
						<tr class="networkHeader">
						<td style="text-align:left;"> 
						LCUV: {{ $bTreedata["rChild"][0]->lcuv }}
						</td>
						<td style="text-align:right;">
						RCUV: {{ $bTreedata["rChild"][0]->rcuv }}
						</td>
						</tr>
						<tr class="networkFooter" cellpadding="0" cellspacing="0">
						<td class="networkFooterCell" colspan="2">Direct Referrals: 0
						</td>
						</tr>
					</tbody>
				</table>

			</span>
			@else
				<span style="white-space: nowrap; display: inline-block;">
					<div style="height: 35px;" class="networkVacant">VACANT</div>
				</span>
			@endif

		</div>

		<!-- Right Child Left node -->
		<div style="border-style: inset; position: absolute; bottom: 0px; left: 322px; border-width: 0px; width: 151px; height: 68px;">
			@if($bTreedata['rlChild'][0]->display_irid != '')
			<span style="white-space: nowrap; display: inline-block;">
				<table class="networkTable">
					<tbody>
						<tr class="networkDetails">
						<td class="networkDetailsCell" colspan="2">
						<span class="networkName">
						{{ $bTreedata['rlChild'][0]->name }}
						</span>
						<br>
						IR ID:
						<a class="networkLink" href="geneology?irid=<?= $bTreedata["rlChild"][0]->display_irid?>">
						{{ $bTreedata["rlChild"][0]->display_irid }}
						</a>
						</td>
						</tr>
						<tr class="networkHeader">
						<td style="text-align:left;"> 
						LCUV: {{ $bTreedata["rlChild"][0]->lcuv }}
						</td>
						<td style="text-align:right;">
						RCUV: {{ $bTreedata["rlChild"][0]->rcuv }}
						</td>
						</tr>
						<tr class="networkFooter" cellpadding="0" cellspacing="0">
						<td class="networkFooterCell" colspan="2">Direct Referrals: 0
						</td>
						</tr>
					</tbody>
				</table>
			</span>
			@else
				<span style="white-space: nowrap; display: inline-block;">
					<div style="height: 35px;" class="networkVacant">VACANT</div>
				</span>
			@endif
		</div>
		<!-- Right Child Right node -->
		<div style="border-style: inset; position: absolute; bottom: 0px; left: 483px; border-width: 0px; width: 151px; height: 68px;">
			@if($bTreedata['rrChild'][0]->display_irid != '')
			<span style="white-space: nowrap; display: inline-block;">
				<table class="networkTable">
					<tbody>
						<tr class="networkDetails">
						<td class="networkDetailsCell" colspan="2">
						<span class="networkName">
						{{ $bTreedata['rrChild'][0]->name }}
						</span>
						<br>
						IR ID:
						<a class="networkLink" href="geneology?irid=<?= $bTreedata["rrChild"][0]->display_irid?>">
						{{ $bTreedata["rrChild"][0]->display_irid }}
						</a>
						</td>
						</tr>
						<tr class="networkHeader">
						<td style="text-align:left;"> 
						LCUV: {{ $bTreedata["rrChild"][0]->lcuv }}
						</td>
						<td style="text-align:right;">
						RCUV: {{ $bTreedata["rrChild"][0]->rcuv }}
						</td>
						</tr>
						<tr class="networkFooter" cellpadding="0" cellspacing="0">
						<td class="networkFooterCell" colspan="2">Direct Referrals: 0
						</td>
						</tr>
					</tbody>
				</table>
			</span>
			@else
				<span style="white-space: nowrap; display: inline-block;">
					<div style="height: 35px;" class="networkVacant">VACANT</div>
				</span>
			@endif
		</div>
		
		<div style="font-size: 0px;">
			<div style="position:absolute;left:152px;top:143px;width:2px;height:6px;clip:rect(0,2px,6px,0);background-color:#000000;overflow:hidden;">
				
			</div>
			<div style="position:absolute;left:72.5px;top:147px;width:162px;height:2px;clip:rect(0,162px,2px,0);background-color:#000000;overflow:hidden;">
				
			</div>
			<div style="position:absolute;left:72.5px;top:147px;width:2px;height:7px;clip:rect(0,2px,7px,0);background-color:#000000;overflow:hidden;">
				
			</div>
			<div style="position:absolute;left:232.5px;top:147px;width:2px;height:7px;clip:rect(0,2px,7px,0);background-color:#000000;overflow:hidden;">
				
			</div>
			<div style="position:absolute;left:313px;top:65px;width:2px;height:6px;clip:rect(0,2px,6px,0);background-color:#000000;overflow:hidden;"></div>
			<div style="position:absolute;left:153px;top:69px;width:323px;height:2px;clip:rect(0,323px,2px,0);background-color:#000000;overflow:hidden;"></div>
			<div style="position:absolute;left:153px;top:69px;width:2px;height:7px;clip:rect(0,2px,7px,0);background-color:#000000;overflow:hidden;"></div>
			<div style="position:absolute;left:474px;top:69px;width:2px;height:7px;clip:rect(0,2px,7px,0);background-color:#000000;overflow:hidden;"></div>
			<div style="position:absolute;left:474px;top:143px;width:2px;height:6px;clip:rect(0,2px,6px,0);background-color:#000000;overflow:hidden;"></div>
			<div style="position:absolute;left:394.5px;top:147px;width:162px;height:2px;clip:rect(0,162px,2px,0);background-color:#000000;overflow:hidden;"></div>
			<div style="position:absolute;left:394.5px;top:147px;width:2px;height:7px;clip:rect(0,2px,7px,0);background-color:#000000;overflow:hidden;"></div>
			<div style="position:absolute;left:554.5px;top:147px;width:2px;height:7px;clip:rect(0,2px,7px,0);background-color:#000000;overflow:hidden;">
				
			</div>
		</div>
	</div>
@endif





       
    </div>

           
    

@stop