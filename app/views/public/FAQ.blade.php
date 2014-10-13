@extends('layouts.master')

@section('mainTabNav')
    @parent
    <div class="mainTab" id="divPrivateNavBar" runat="server" visible="false">
        <ul>
            <li>                        
            {{ link_to('default', 'Home') }}
            </li>
            <li>
            {{ link_to('public/registration', 'Register now!') }}                     
            </li>
            <li>
            {{ link_to('public/FAQ', 'FAQ',array('class' => 'current')) }}                      
            </li>
            <li>
            {{ link_to('public/contactus', 'Contact Us') }}                     
            </li>
        </ul>
    </div>
@stop

@section('mainBody')
    @parent
<div class="divMainBody" id="divMainBody" style="
    width: 100%;
    margin-left: 0px;
    margin-right: 0px;
">
    <div class="divForm">
        <div class="divMainGridHeading">
        Frequently Asked Questions
        </div>
        <table class="tblForm">
            <tr>
                <td>Coming soon!</td>
            </tr>        
        </table>
    </div>
</div>     

@stop