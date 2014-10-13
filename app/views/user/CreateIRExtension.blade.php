@extends('layouts.user')

@section('mainBody')
@if($possition)
<script type="text/javascript">  
  alert('No more extensions can be created.');
  window.location.href = "home";
</script>
@else
<div class="divLeftBody" id="divLeftBody">
        <div class="divSideBoxHeading">
            Instructions
        </div>
        <div class="divSideBox">
            <ul class="instructions">
                <li>Fill in the details </li>
                <li>Create Your Extension !!</li>
            </ul>
        </div>
    </div>
    <div class="divMainBody" id="divMainBody" style="width:790px">
        <div class="divForm">
        {{ Form::open(array('url' => 'public/registration','id' => 'formMaster')) }}
            <div class="divMainGridHeading">
                Create Your Extension
            </div>
            
            <fieldset>
                <legend>Referrer Information</legend>
                <table class="tblForm">
           
                    <tr>
                   <!-- Introducer Id -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('tbIntroducerId', 'Introducer Id:') }} 
                           <span style="color:Red">*</span>
                       </td>
                       <td class="tdRegistrationTable">
                           {{ Form::text('tbIntroducerId',null,array('maxlength' => '20','required' => 'true')) }}
                           <div  style="color:Blue;" id='divIRValidation'>
                           
                           </div> 
                       </td>
                       <!-- Receipt Number -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('tbReceiptNumber', 'Receipt Number: ') }} 
                           <span style="color:Red">*</span>
                       </td>
                       <td class="tdRegistrationTable">
                           {{ Form::text('tbReceiptNumber',null,array('maxlength' => '20','required' => 'true')) }}
                           <div id="divReceiptValidation">
                       </div>
                       </td>
                   </tr>

                   <tr>
                   <!-- Placement ID -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('tbPlacementId', 'Placement ID:') }} 
                           <span style="color:Red">*</span>
                       </td>
                       <td class="tdRegistrationTable">
                           {{ Form::text('tbPlacementId',null,array('maxlength' => '20','required' => 'true')) }}
                           <div id="divPlacementValidation" style="color:red;"></div>
                       </td>
                       <!-- Position -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('rbPlacementPosition', 'Position:') }} 
                           <span style="color:Red">*</span>
                       </td>
                       <td class="tdRegistrationTable">
                       {{ Form::radio('position', 'L', true, array('id' => 'lbPlacementPosition')) }}
                       {{ Form::label('lbPlacementPosition', 'Left') }}

                       <br/>

                         {{ Form::radio('position', 'R', true, array('id' => 'rbPlacementPosition')) }}
                       {{ Form::label('rbPlacementPosition', 'Right') }}

                       </td>
                   </tr>
                    <tr>
                    <!-- Proposal Number -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('tbProposalNumber', 'Proposal Number:') }}
                       </td>
                       <td class="tdRegistrationTable">
                           {{ Form::text('tbProposalNumber',null,array('maxlength' => '20')) }}                            
                       </td>                        
                       <td class="tdRegistrationTable">
                        {{ Form::radio('rbExtentionNumber', '002', true) }}
                        {{ Form::label('rbExtentionNumber', '002') }}
                        <br>
                        {{ Form::radio('rbExtentionNumber', '003') }}
                         {{ Form::label('rbExtentionNumber', '003') }}
                           
                        </td>
                    </tr>

                </table>
            </fieldset>
                 {{ Form::submit('Submit',array('id' => 'btnSubmit')) }} 
    {{ Form::button('Cancel',array('id' => 'btnCancel','onclick' =>'location.href="../user"')) }}     

    {{ Form::close() }}
            
        </div>

    </div>
    
     
    @endif

@stop