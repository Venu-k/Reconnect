@extends('layouts.master')

@section('mainTabNav')
    @parent
    <div class="mainTab" id="divPrivateNavBar" runat="server" visible="false">
        <ul>
            <li>                        
            {{ link_to('default', 'Home') }}
            </li>
            <li>
            {{ link_to('public/registration', 'Register now!',array('class' => 'current')) }}                     
            </li>
            <li>
            {{ link_to('public/FAQ', 'FAQ') }}                      
            </li>
            <li>
            {{ link_to('public/contactus', 'Contact Us') }}                     
            </li>
        </ul>
    </div>
@stop


@section('mainBody')
    @parent

    <div class="divLeftBody" id="divLeftBody" >
        <div class="divSideBoxHeading">
            Instructions
        </div>
        <div class="divSideBox">
            <ul class="instructions">
        <li>
            Fill in the details. 
        </li>
        <li>
            Get confirmation email. 
        </li>
        <li>
            Login and start using the service! 
        </li>
        
            </ul>
        </div>
    </div>
    <div class="divMainBody" id="divMainBody" style="width: 790px;">
    
        <div class="divForm">
    
            <div class="divMainGridHeading">
                Register to Reconnect!
            </div>
            <div class="divInstruction">
            <?php 

            ?>
                Fill-up the form below to register with reconnect.
                <div  class="divErrorMessage" runat="server" id="divErrorMessage" style="display:none">
                    Introducer ID or placement ID is not correct. Please check the entered values and try again.
                </div>
            </div>
            {{ Form::open(array('url' => 'public/registration','id' => 'formMaster')) }}
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
                       {{ Form::radio('position', 'L', true, array('name' => 'tbPlacementPosition')) }}
                       {{ Form::label('Left') }}

                       <br/>

                         {{ Form::radio('position', 'R', true, array('name' => 'tbPlacementPosition')) }}
                       {{ Form::label('Right') }}

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
                      
                        
                   </tr>

                </table>
            </fieldset>
           <fieldset>
             <legend>Personal Details</legend>
             <table class="tblForm">
                 <tr>

                   <!-- Name -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbName', 'Name:') }}
                       <span style="color:Red">*</span>
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbName',null,array('maxlength' => '50','required' => 'true')) }}                            
                   </td>

                    <!-- Father/Husband Name: -->

                   <td class="tdRegistrationTable">
                       {{ Form::label('tbFather_HusbandName', 'Father/Husband Name:') }}
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbFather_HusbandName',null,array('maxlength' => '50')) }}                            
                   </td>

                  </tr>
             
                  <tr>
                    <!-- Address1 -->
                     <td class="tdRegistrationTable">
                         {{ Form::label('tbAddress1', 'Address1:') }}
                         <span style="color:Red">*</span>
                     </td>
                     <td class="tdRegistrationTable">
                         {{ Form::text('tbAddress1',null,array('maxlength' => '100','required' => 'true')) }}                            
                     </td>

                      <!-- Address2 -->
                     <td class="tdRegistrationTable">
                         {{ Form::label('tbAddress2', 'Address2:') }}
                     </td>
                     <td class="tdRegistrationTable">
                         {{ Form::text('tbAddress2',null,array('maxlength' => '100')) }}                            
                     </td>
                  </tr>
             
                <tr>

                <!-- Town/City -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbTown_City', 'Town/City:') }}
                       <span style="color:Red">*</span>
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbTown_City',null,array('maxlength' => '50','required' => 'true')) }}                            
                   </td>

                  <!-- State -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('ddlState', 'State:') }}                       
                   </td>
                   <td class="tdRegistrationTable">
                      {{ Form::select('ddlState', $stateOpt) }}                            
                   </td>            
                </tr>            
              <tr>


                <!-- District -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('ddlDistrict', 'District:') }}                       
                   </td>
                   <td class="tdRegistrationTable">
                      {{ Form::select('ddlDistrict', $districtOpt) }}                            
                   </td>    


                    <!-- Postal/Zip Code -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbPostalCode', 'Postal/Zip Code:') }}
                       <span style="color:Red">*</span>
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbPostalCode',null,array('maxlength' => '20','required' => 'true')) }}                            
                   </td>
              </tr>
              <tr>
               <!-- Home Phone Number -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbResidenceNo', 'Home Phone Number:') }}
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbResidenceNo',null,array('maxlength' => '20')) }}                            
                   </td>
                   <!-- Mobile Phone Number -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbMobile', 'Mobile Phone Number:') }}
                       <span style="color:Red">*</span>
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbMobile',null,array('maxlength' => '20','required' => 'true')) }}                            
                   </td>
                </tr>

                <tr>

                 <!-- Email Address -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbEmail', 'Email Address:') }}
                       <span style="color:Red">*</span>
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::email('tbEmail',null,array('maxlength' => '50','required' => 'true')) }}                            
                   </td>
                </tr>

                <tr>

                 <!-- Password -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbPassword', 'Password:') }}
                       <span style="color:Red">*</span>
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::password('tbPassword',null,array('maxlength' => '20','required' => 'true')) }}    
                       <div id="divPasswordValidation" style="color:red;"></div>                        
                   </td>

                    <!-- Confirm Password -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbConfirmPassword', 'Confirm Password:') }}
                       <span style="color:Red">*</span>
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::password('tbConfirmPassword',null,array('maxlength' => '20','required' => 'true')) }}   
                       <div id="divConfirmPasswordValidation" style="color:red;"></div>                          
                   </td>
                </tr>
             </table>
         </fieldset>

        <fieldset>
            <legend>Bank Details</legend>
            <table class="tblForm">
              <tr>
                   <!-- Identity Proof -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('ddlIdentityProof', 'Identity Proof:') }}
                   </td>
                   <td class="tdRegistrationTable">
                      {{ Form::select('ddlIdentityProof',$idProofOpt) }}                            
                   </td>  
                    <!-- Details -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbDetails', 'Details:') }}
                       <span style="color:Red">*</span>
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbDetails',null,array('maxlength' => '20','required' => 'true')) }}                            
                   </td>
                </tr>

                <tr>
                <!-- PAN Number -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbPanNumber', 'PAN Number:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbPanNumber',null,array('maxlength' => '20')) }}                            
                   </td>

                   <!-- Payee Name -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbPayeeName', 'Payee Name:') }}                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbPayeeName',null,array('maxlength' => '50')) }}                            
                   </td>
                </tr>

                <tr>
                <!-- Bank Name -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbBankName', 'Bank Name:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbBankName',null,array('maxlength' => '50')) }}                            
                   </td>
                    <!-- Branch -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbBranch', 'Branch:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbBranch',null,array('maxlength' => '50')) }}                            
                   </td>
                </tr>

                <tr>
                <!-- Account Number -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbAccountNumber', 'Account Number:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbAccountNumber',null,array('maxlength' => '50')) }}                            
                   </td>
                </tr>

                <tr>
                 <!-- Nominee -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbNominee', 'Nominee:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbNominee',null,array('maxlength' => '50')) }}                            
                   </td>
                   <!-- Nominee Relation -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbNomineeRelation', 'Nominee Relation:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbNomineeRelation',null,array('maxlength' => '50')) }}                            
                   </td>
                </tr>
            </table>

        </fieldset>

        <fieldset>
          <legend>Policy Details</legend>
          <table class="tblForm">
            <tr>
              <!-- Policy Holder Name -->
               <td class="tdRegistrationTable">
                   {{ Form::label('tbPolicyHolderName', 'Policy Holder Name:') }}
                   <span style="color:Red">*</span>
               </td>
               <td class="tdRegistrationTable">
                   {{ Form::text('tbPolicyHolderName',null,array('maxlength' => '50','required' => 'true')) }}                            
               </td>
                <!-- Policy Name -->
               <td class="tdRegistrationTable">
                   {{ Form::label('ddlPolicyName', 'Policy Name:') }}
               </td>
               <td class="tdRegistrationTable">
                   {{ Form::select('ddlPolicyName', $productOpt) }}                            
               </td>
            </tr>
            <tr>
             <!-- Policy Date -->
               <td class="tdRegistrationTable">
                   {{ Form::label('tbPolicyDate', 'Policy Date:') }}
               </td>
               <td class="tdRegistrationTable">
                   <input type="date" name="tbPolicyDate" id='tbPolicyDate'>                           
               </td>

                <!-- Policy Amount -->
               <td class="tdRegistrationTable">
                   {{ Form::label('ddlPolicyAmount', 'Policy Amount:') }}
               </td>
               <td class="tdRegistrationTable">
                   {{ Form::select('ddlPolicyAmount', array('30000' => '30000', '15000' => '15000','7500' => '7500')) }}                            
               </td>
            </tr>
            <tr>
             <!-- Policy Nominee Name -->
               <td class="tdRegistrationTable">
                   {{ Form::label('tbPolicyNomineeName', 'Policy Nominee Name:') }}
                   <span style="color:Red">*</span>
               </td>
               <td class="tdRegistrationTable">
                   {{ Form::text('tbPolicyNomineeName',null,array('maxlength' => '50','required' => 'true')) }}                            
               </td>
               <!-- Policy Nominee Relation -->
               <td class="tdRegistrationTable">
                   {{ Form::label('tbPolicyNomineeRelation', 'Policy Nominee Relation:') }}
                   <span style="color:Red">*</span>
               </td>
               <td class="tdRegistrationTable">
                   {{ Form::text('tbPolicyNomineeRelation',null,array('maxlength' => '50','required' => 'true')) }}                            
               </td>
          </tr>
        </fieldset>
    </table>

    </fieldset>
    {{ Form::submit('Submit',array('id' => 'btnSubmit')) }} 
    {{ Form::button('Cancel',array('id' => 'btnCancel','onclick' =>'location.href="../default"')) }}     

    {{ Form::close() }}    
        </div>
    </div>
    <script type="text/javascript">
         function ScheduleEnableDisablePositions() 
        {
            document.getElementById('divPlacementValidation').style.display = 'none';
            setTimeout('EnableDisablePositions()', 1);
        }

        function EnableDisablePositions() 
        {
            var retVal = document.getElementById('divPlacementValidation').innerHTML;
            if (retVal == '') { setTimeout('EnableDisablePositions()', 1); return; }

            var rbLeft = document.getElementById('<% =rbPlacementPosition.ClientID %>_0');
            var rbRight = document.getElementById('<% =rbPlacementPosition.ClientID %>_1');


            if (retVal == '1^0') { rbLeft.disabled = true;
                document.getElementById('divPlacementValidation').style.display = 'none';  }
            else if (retVal == '1^1') {
                rbLeft.disabled = true; rbRight.disabled = true;
                

                document.getElementById('divPlacementValidation').innerHTML = "<span style='color:red;'>No postions are available for this placement ID. Please check and enter again.</span>";
             document.getElementById('divPlacementValidation').style.display = 'block'; }
         else if (retVal == '0^1') { rbRight.disabled = true;
                 document.getElementById('divPlacementValidation').style.display = 'none'; }
         else if (retVal == '0^0') { rbLeft.disabled = false; rbRight.disabled = false;
                document.getElementById('divPlacementValidation').style.display = 'none'; }
            else document.getElementById('divPlacementValidation').style.display = 'block';

        }





          function IRExtensionEnableDisablePositions(id)
        {
            document.getElementById('divIRExtensionValidation').style.display = 'none';
            setTimeout("IRExtensionEnableDisablePositions1(" + id + ")", 1);
        }

        function IRExtensionEnableDisablePositions1(id)
        {
            var retVal1 = document.getElementById('divIRExtensionValidation').innerHTML;
            if (retVal1 == '') { setTimeout('IRExtensionEnableDisablePositions1()', 1); return; }

            var rbExtension1 = document.getElementById('ctl00_mainBody_rbExtentionNumber_0');
            var rbExtension2 = document.getElementById('ctl00_mainBody_rbExtentionNumber_1');

            if (retVal1 == '1^0') { rbExtension1.disabled = true;rbExtension2.disabled = false;
                document.getElementById('divIRExtensionValidation').style.display = 'none';  }
            else if (retVal1 == '1^1') {
                rbExtension1.disabled = true; rbExtension2.disabled = true;
            }

         else if (retVal1 == '0^1') { rbExtension2.disabled = true; rbExtension1.disabled = false;
                 document.getElementById('divIRExtensionValidation').style.display = 'none'; }
         else if (retVal1 == '0^0') { rbExtension1.disabled = false; rbExtension2.disabled = false;
                document.getElementById('divIRExtensionValidation').style.display = 'none'; }
            else document.getElementById('divIRExtensionValidation').style.display = 'block';
        
        
            }
        
      
          
          function SetExtentionNumberStatus(checkbox,id1)
          {
           if(checkbox.checked)
                document.getElementById(id1).style.display = 'block';
           else
            {
            
            document.getElementById('ctl00_mainBody_rbExtentionNumber_0').checked = false;
            document.getElementById('ctl00_mainBody_rbExtentionNumber_1').checked = false;
                    
                document.getElementById(id1).style.display = 'none';
            }


        }
    </script>
          
          

@stop