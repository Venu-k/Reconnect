@extends('layouts.admin')


@section('mainBody')
    @parent
   
    <div class="divMainBody" id="divMainBody" style="width: 940px;">
    <div class="divForm">
    {{ Form::open(array('id' => 'formMaster')) }}
    
            <div class="divMainGridHeading">
                My Profile
            </div>           
            
            <fieldset>
                <legend>Personal Details</legend>
                <table class="tblForm">
                    <tbody>
                        <tr>
                            <td class="tdRegistrationTable">
                                {{ Form::label('Member ID:') }}
                            </td>
                            <td class="tdRegistrationTable">
                                {{ Form::label($profile->display_irid) }}
                            </td>
                            <td class="tdRegistrationTable">
                                {{ Form::label('Placement ID:') }}
                            </td>
                            <td class="tdRegistrationTable">
                            {{ Form::label($profile->placementid) }}
                            </td>
                        </tr>
                        <tr>
	                        <td class="tdRegistrationTable">
	                            {{ Form::label('tbReceiptNumber','Receipt Number:') }}
	                        </td>
	                        <td class="tdRegistrationTable">
	                            {{ Form::text('tbReceiptNumber',$profile->receipt_number) }}
	                        </td>
	                        <td class="tdRegistrationTable">
	                            {{ Form::label('tbProposalNumber','Proposal Number:') }}
	                        </td>
	                        <td class="tdRegistrationTable">
	                           {{ Form::text('tbProposalNumber',$profile->proposal_number) }}
	                        </td>
                        </tr>
                        <tr>
                           <!-- Name -->
                           <td class="tdRegistrationTable">
                               {{ Form::label('tbName', 'Name:') }}                             
                           </td>
                           <td class="tdRegistrationTable">
                               {{ Form::text('tbName',$profile->name) }}                            
                           </td>

                            <!-- Father/Husband Name: -->

                           <td class="tdRegistrationTable">
                               {{ Form::label('tbFather_HusbandName', 'Father/Husband Name:') }}
                           </td>
                           <td class="tdRegistrationTable">
                               {{ Form::text('tbFather_HusbandName',$profile->fathername) }}                            
                           </td>
                        </tr>
                        <tr>
                            <!-- Address1 -->
                         <td class="tdRegistrationTable">
                             {{ Form::label('tbAddress1', 'Address1:') }}
                             
                         </td>
                         <td class="tdRegistrationTable">
                             {{ Form::text('tbAddress1',$profile->address1) }}                            
                         </td>

                          <!-- Address2 -->
                         <td class="tdRegistrationTable">
                             {{ Form::label('tbAddress2', 'Address2:') }}
                         </td>
                         <td class="tdRegistrationTable">
                             {{ Form::text('tbAddress2',$profile->address2) }}                            
                         </td>
                        </tr>                      
                        
                        <tr>
                        <!-- Town/City -->
                           <td class="tdRegistrationTable">
                               {{ Form::label('Town/City:') }}                
                           </td>
                           <td class="tdRegistrationTable">
                               {{ Form::text('tbTown_City',$profile->city) }}                            
                           </td>

                        <!-- District -->
                           <td class="tdRegistrationTable">
                               {{ Form::label('District:') }}                       
                           </td>
                           <td class="tdRegistrationTable">
                           {{ Form::select('ddlDistrict', $districtOpt,$profile->district_id) }}                            
                           </td>  
                        </tr> 
                        <tr>
                             <!-- State -->
                               <td class="tdRegistrationTable">
                                   {{ Form::label('State:') }}                       
                               </td>
                               <td class="tdRegistrationTable">
                                   {{ Form::select('ddlState', $stateOpt,$profile->state_id) }}                            
                               </td> 

                                <!-- Postal/Zip Code -->
                               <td class="tdRegistrationTable">
                                   {{ Form::label('tbPostalCode', 'Postal/Zip Code:') }}
                               </td>
                               <td class="tdRegistrationTable">
                                   {{ Form::text('tbPostalCode',
                                    $profile->postalcode) }}                            
                               </td>
                            </tr>
                            <tr>
                           <!-- Home Phone Number -->
                               <td class="tdRegistrationTable">
                                   {{ Form::label('tbResidenceNo', 'Home Phone Number:') }}
                               </td>
                               <td class="tdRegistrationTable">
                                   {{ Form::text('tbResidenceNo',
                                    $profile->phone_home) }}                            
                               </td>
                               <!-- Mobile Phone Number -->
                               <td class="tdRegistrationTable">
                                   {{ Form::label('tbMobile', 'Mobile Phone Number:') }}
                               </td>
                               <td class="tdRegistrationTable">
                                   {{ Form::text('tbMobile',
                                    $profile->phone_mobile) }}                            
                               </td>
                            </tr>
                            <tr>
                             <!-- Email ID -->
                               <td class="tdRegistrationTable">
                                   {{ Form::label('tbEmail', 'Email Address:') }}
                               </td>
                               <td class="tdRegistrationTable">
                                   {{ Form::email('tbEmail',
                                    $profile->emailaddress) }}                            
                               </td>
                               <!-- Password -->
                               <td class="tdRegistrationTable">
                                   {{ Form::label('tbPassword', 'Password:') }}
                               </td>
                               <td class="tdRegistrationTable">
                                   {{ Form::text('tbPassword',
                                    $profile->password) }}                            
                               </td>
                            </tr>
                    </tbody>
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
                   {{ Form::text('tbDetails',
                                    $profile->idproof_details) }}                            
                   </td>
                </tr>

                <tr>
                <!-- PAN Number -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbPanNumber', 'PAN Number:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbPanNumber',
                                    $profile->pan_number) }}                            
                   </td>

                   <!-- Payee Name -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbPayeeName', 'Payee Name:') }}                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbPayeeName',$profile->payee_name) }}                            
                   </td>
                </tr>

                <tr>
                <!-- Bank Name -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbBankName', 'Bank Name:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbBankName',$profile->bank_name) }}                            
                   </td>
                    <!-- Branch -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbBranch', 'Branch:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbBranch',$profile->bank_branch) }}                            
                   </td>
                </tr>

                <tr>
                <!-- Account Number -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbAccountNumber', 'Account Number:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbAccountNumber',$profile->account_number) }}                            
                   </td>
                </tr>

                <tr>
                 <!-- Nominee -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbNominee', 'Nominee:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbNominee',$profile->nominee) }}                            
                   </td>
                   <!-- Nominee Relation -->
                   <td class="tdRegistrationTable">
                       {{ Form::label('tbNomineeRelation', 'Nominee Relation:') }}
                       
                   </td>
                   <td class="tdRegistrationTable">
                       {{ Form::text('tbNomineeRelation',$profile->nominee_relation) }}                            
                   </td>
                </tr>
            </table>

        </fieldset>       


            <fieldset id="mainBody_fsPolicyDetails">
                <legend>Policy Details</legend>
                <table class="tblForm">
                    <tbody>
                    <tr>
                      <!-- Policy Holder Name -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('tbPolicyHolderName', 'Policy Holder Name:') }}
                       </td>
                       <td class="tdRegistrationTable">
                           {{ Form::text('tbPolicyHolderName',
                            $profile->policy_holder_name) }}                          
                       </td>   
                       <!-- Policy Date -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('tbPolicyDate', 'Policy Date:') }}
                       </td>
                       <td class="tdRegistrationTable">
                           <input type="date" name="tbPolicyDate" id='tbPolicyDate' value="<?= date('Y-m-d',strtotime($profile->policy_date)) ?>">                           
                       </td>                     
                    </tr>
                    <tr>
                      <!-- Policy Name -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('ddlPolicyName', 'Policy Name:') }}
                       </td>
                       <td class="tdRegistrationTable">
                           {{ Form::select('ddlPolicyName', $productOpt) }}                            
                       </td>

                       <!-- Policy Amount -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('ddlPolicyAmount', 'Policy Amount:') }}
                       </td>
                       <td class="tdRegistrationTable">
                           {{ Form::text('ddlPolicyAmount',
                            $profile->policy_amount) }}                           
                       </td>
                    </tr>
                    <tr>
                     <!-- Policy Nominee Name -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('tbPolicyNomineeName', 'Policy Nominee Name:') }}
                       </td>
                       <td class="tdRegistrationTable">
                           {{ Form::text('tbPolicyNomineeName',
                            $profile->policy_nominee_name) }}                            
                       </td>

                       <!-- Policy Nominee Relation -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('tbPolicyNomineeRelation', 'Policy Nominee Relation:') }}
                           
                       </td>
                       <td class="tdRegistrationTable">
                           {{ Form::text('tbPolicyNomineeRelation',$profile->policy_nominee_relation) }}                            
                       </td>
                   </tr>
                 </tbody>
                </table>
            </fieldset>

            <fieldset id="mainBody_fsTxnStatus">
                <legend>Member Status</legend>
                <table class="tblForm">
                    <tbody>
                    <tr>
                    <!-- Policy Amount -->
                       <td class="tdRegistrationTable">
                           {{ Form::label('Member Status:') }}
                       </td>
                       <td class="tdRegistrationTable">
                       <?php $status = GlobalVariables::getStatus($profile->status) ?>
                           {{ Form::select('tbstatus',array('1' =>  $status),$status,
                               array('disabled' => 'disabled')) }}               
                       </td>
                       
                        <td colspan="2">
                            &nbsp;
                        </td>
                    </tr>
                </tbody>
                </table>
            </fieldset>   
            {{ Form::submit('Submit',array('id' => 'btnSubmit')) }} 
            {{ Form::button('Cancel',array('id' => 'btnCancel','onclick' =>'location.href="../TransactionsNew"')) }}  

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