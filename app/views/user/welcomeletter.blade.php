@extends('layouts.user')


@section('mainBody')
    @parent

    <div class="divLeftBody" id="divLeftBody">
        

        <div class="divSideBoxHeading">
        Options
        </div>

        <div class="divSideBox">
        </div>
        

    </div>

    <div class="divMainBody" id="divMainBody" style="width: 790px;">
        <div class="divForm">
            <div class="divMainGridHeading" id="divMainGridHeading">
                <b>WelCome Letter </b>
            </div>
            {{ Form::open() }}
            <fieldset>
                <legend>Personal Details</legend>
                <table>
                    <tr>
                        <td class="tdRegistrationTable" style="font-weight:bold">
                            Member Id
                        </td>
                        <td class="tdRegiatrationTable">
                       {{ Form::label($profile->display_irid) }}
                         </td>
                        <td class="tdRegistrationTable" style="font-weight:bold">
                            Introducer ID
                        </td>
                        <td class="tdRegiatrationTable">
                            {{ Form::label($profile->placementid) }}
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="tdRegistrationTable" style="font-weight:bold">
                            Name </td>
                        <td class="tdRegistrationTable">
                          {{ Form::label($profile->name) }}
                        </td>
                        <td class="tdRegistrationTable" style="font-weight:bold">
                           Introducer Name
                        </td>
                        <td class="tdRegiatrationTable">
                             {{ Form::label($profile->name) }}
                        </td>
                    </tr>

                    
                    <tr>
                        <td class="tdRegistrationTable" style="font-weight:bold">
                            Address</td>
                        <td class="tdRegistrationTable">
                          {{ Form::label($profile->address1.' '.$profile->address2) }}
                        </td>
                        
                     </tr>
                     <tr>   
                        <td class="tdRegistrationTable" style="font-weight:bold">
                            City </td>
                        <td class="tdRegistrationTable">
                          {{ Form::label($profile->city) }}
                        </td>
                        <td class="tdregistrationTable" style="font-weight:bold">
                        Joining Date
                        </td>
                        <td class="tdRegistrationTable">
                              {{ Form::label(date('d-m-Y',strtotime($profile->start_date))) }}
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="tdRegistrationTable" style="font-weight:bold">
                           District
                        </td>
                        <td class="tdRegiatrationTable">
                             {{ Form::label($profile->district_name) }}
                        </td>

                        
                        <td class="tdRegistrationTable" style="font-weight:bold">
                           State
                        </td>
                        <td class="tdRegiatrationTable">
                             {{ Form::label($profile->statename) }}
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td class="tdRegistrationTable" style="font-weight:bold">
                            Pin code </td>
                        <td class="tdRegistrationTable">
                          {{ Form::label($profile->postalcode) }}
                        </td>
                        <td class="tdRegistrationTable" style="font-weight:bold">
                           Email
                        </td>
                        <td class="tdRegiatrationTable">
                             {{ Form::label($profile->emailaddress) }}
                        </td>
                    </tr>
                </table>
                
               
                <br />
                <br />
                <br />
                <br />
                
                
             <p style="font-size:medium">
                Dear   {{ Form::label($profile->name) }} ,
                
                <br />
                
                Welcome to <b> reconncet.co.in </b> We are providing you with a member ID above.
                
                <br />
                
                Please Use this number in any future communicaions with us. 
                <br />
                
                This Welcome letter is a form of receipt from this company. 
                
                <br />
                
            </p>
              {{ Form::close() }}  
                </fieldset>
        </div>
    </div>


@stop