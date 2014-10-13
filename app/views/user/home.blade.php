@extends('layouts.user')


@section('mainBody')
    @parent


    <h2>
    Welcome to reconnect.co.in
    </h2>
    <div class="divForm">
        <div class="divMainGridHeading">
            Announcement
        </div>
        @if(isset($announcement))

        <fieldset>
            <legend>Announcement Details</legend>
            <table class="tblForm">
                <tr>
                    <td class="tdRegistrationTable">
                    Title: 
                    </td>
                    <td>

                        {{ Form::text('title',$announcement->title)  }}
                    </td>
                </tr>
                <tr>
                    <td class="tdRegistrationTable">
                        Message:
                    </td>
                    <td>
                    {{ Form::textarea('message',$announcement->message) }}
                        
                    </td>
                </tr>
                <tr>
                    <td class="tdRegistrationTable">
                        Start Date:
                    </td>
                    <td>
                        {{Form::text('startdate',$announcement->startdate)}}
                    </td>
                </tr>
                <tr>
                    <td class="tdRegistrationTable">
                        End Date:
                    </td>
                    <td>
                       {{Form::text('startdate',$announcement->enddate)}}
                       
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        
                        <asp:Button ID="btnCancel" runat="server" Text="Cancel" OnClick="btnCancel_Click"
                            CausesValidation="false" />
                    </td>
                </tr>
            </table>
        </fieldset>
            
        @else
            <table class="divGrid" cellspacing="0" rules="all" border="1" id="mainBody_grid" style="border-collapse:collapse;">
                <tbody><tr>
                    <td colspan="2">No records found</td>
                </tr>
            </tbody>
            </table>
        @endif

    </div>


    
@stop