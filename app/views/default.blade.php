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

<div class="divMainBody" id="divMainBody" style="font-size: 1.1em; float:left;margin-left:0px">
	<div class="divMainBodyNoLeft" id="divMainBody" style="font-size: 1.1em;margin-left: 0px;">
		<div>
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="750" height="250">
		    <param name="movie" value="public/banners-anim.swf">
		    <param name="quality" value="high">
		    <embed src="{{ asset('assets/site/images/banners-anim.swf') }}" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="790" height="250">
		  </object>
		</div>   
		<div class="dline"></div>
     	<h2>Welcome to reconnect.co.in</h2>
        <p>
            Your portal to manage everything with your "reconnect" network.
        </p>
        <p>
            Follow these simple steps to get started -
        </p>
        <ul>
            <li>Get your network details for your insurance purchase</li>
            <li>Fill up the {{ link_to('public/registration', 'online registration') }} form</li>
            <li>Get your password</li>
            <li>Start using the service</li>
        </ul>

         <!-- Accordion -->
        <h2 class="demoHeaders">
            Features</h2>
        <div id="accordion">
            <div>
                <h3>
                    <a href="#">Members</a></h3>
                <div style="margin: 0px; padding: 0px">
                    <ul>
                        <li>Track your network</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>  
</div>



    <script type="text/javascript">
        $(function () {
            // Accordion
            $("#accordion").accordion({ header: "h3" });
        }
);
    </script>

    <div class="divLeftBody" id="divRightBody"  style="float:right;">
        <div class="divLoginBoxHeading">
            Member area
        </div>
        <div id="divLogin" class="divLoginBox">
        @if(Session::has('message'))
            <div>
                <span id="rightBody_lblInvalidLogin" style="color:Red;">{{ Session::get('message') }}</span>
            </div>
        @endif
        
        {{ Form::open(array('url' => 'user','id' => 'formMaster')) }}     
        {{ Form::label('tbUserName', 'IR ID:') }}
        {{ Form::text('tbUserName',null,array('class' => 'smallTextBox','maxlength' => '50','required' => 'true')) }}
        {{ Form::label('tbPassword', 'Password:') }}
        {{ Form::password('tbPassword',array('class' => 'smallTextBox','maxlength' => '20','required' => 'true')) }}
        {{ Form::submit('Log in') }}
        <br />
        {{ link_to('public/forgotPassword', 'Forgot password',array('id' => 'btnForgotPassword')) }}
       
        {{ Form::close() }}
        </div>

        <div class="divRegisterLinksHeading">
            Not registered yet?</div>
        <div id="divRegister" class="divRegisterLinks">
            <div class="divInfo">
                Build & Manage your network efficiently and effectively.
                {{ link_to('public/registration', 'Click here to get started',array('id' => 'btnGetStarted')) }}
            </div>
            <div class="divInfo">
                If you are not sure about it
                {{ link_to('public/contactus', 'click here to find out more about how reconnect.co.in can help',array('id' => 'btnWhy')) }}
        </div>
    </div>
@stop