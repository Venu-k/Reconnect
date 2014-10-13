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
            {{ link_to('public/FAQ', 'FAQ') }}                      
            </li>
            <li>
            {{ link_to('public/contactus', 'Contact Us',array('class' => 'current')) }}                     
            </li>
        </ul>
    </div>
@stop

@section('mainBody')
    @parent

<div class="divMainBody" id="divMainBody" >


    <div class="divForm">
    <div class="divMainGridHeading">
    Thank you for registering with Reconnect!
    </div>

    <div>
    <p>
    Dear {{ $data['name'] }},
    <h2>
    Welcome to Reconnect network.
    </h2>
    Welcome message.
    </p>

    <p>
    Your Membership ID is:{{ $data['userName'] }}</b>
    </p>

    <p>
    You can login and track your network activity anytime you like. To login, please go to <% =Request.ApplicationPath %>,
    enter your membership ID as username and your password.
    
    </p>

    Thank you.
    </div>
    </div>
</div>
</div>    

@stop