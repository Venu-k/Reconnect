@extends('layouts.master')

@section('mainTabNav')
    @parent
    <div class="mainTab" id="divPrivateNavBar" runat="server" visible="false">
        <ul>
            <li>                        
            {{ link_to('default', 'Home',array('class' => 'current')) }}
            </li>
            <li>
            {{ link_to('public/registration', 'Register now!') }}                     
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

    <div class="divLeftBody" id="divLeftBody">
        <div class="divSideBoxHeading">
        Instructions
        </div>
        <div class="divSideBox">
        <ul class="instructions">
        <li>
            Enter your email address. 
        </li>
        <li>
            Click "email me my password" button. 
        </li>
        <li>
            Check your email. 
        </li>
        
        </ul>
        </div>
    </div>


    <div class="divMainBody" id="divMainBody" style="width:790px">
    <div class="divForm">
    <div class="divMainGridHeading">
    Forgot Password
    </div>
    
    <table class="tblForm">
    <tr>
    <td style="text-align:right;">
    Your email address:
    </td>
    <td><wcc:TextBox ID="txtEmail" runat="server" Required="true" TypeOfText="Email"></wcc:TextBox>
    <asp:Label ID="lblInvalidUserName" runat="server" Text=""></asp:Label>
    </td>
    </tr>

    <tr>
    <td>
    &nbsp;
    </td>
    <td>
    <asp:Button ID="btnSubmit" Text="Email me my password" runat="server" OnClick="btnSubmit_Click" />
    <asp:Button ID="btnCancel" Text="Cancel" runat="server" OnClick="btnCancel_Click" CausesValidation="false"/>
    </td>
    </tr>
    
    </table>
    
    
    </div>
    </div>



@stop