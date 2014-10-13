@extends('layouts.adminLogin')


@section('mainBody')
    @parent

    <div class="divMainBody" id="divMainBody" style="font-size: 1.1em;width: 790px;">
        <h2>
            Welcome to reconnect.co.in - Administration Console
        </h2>
        <p>
            Enter your username and password to log in.
        </p>
    
        <div class="divLeftBody" id="divRightBody" style="width: 325px;">
            <div class="divLoginBoxHeading">
                Adminstrator Log-in
            </div>
            <div id="divLogin" class="divLoginBox">
            {{ Form::open(array('url' => 'admin','id' => 'formMaster')) }}
       
        
                <table width=100%>
                <tr>
                <td colspan=2>
                <asp:Label ID="lblInvalidLogin" runat="server" Text="Your ID or password is wrong. Please try again." ForeColor="Red" Visible="false">
                    
                </asp:Label>
                </td>
                </tr>
                <tr>
                <td>
                {{ Form::label('tbUserName', '
Username:') }}
                </td>
                <td>
                {{ Form::text('tbUserName',null,array('class' => 'smallTextBox','maxlength' => '50','required' => 'true')) }}
                </td>
                </tr>
                <tr>
                <td>
               {{ Form::label('tbPassword', 'Password:') }}
                </td>
                <td>
               {{ Form::password('tbPassword',array('class' => 'smallTextBox','maxlength' => '20','required' => 'true')) }}
                </td>
                </tr>
                <tr>
                <td>
                &nbsp;
                </td>
                <td>
                {{ Form::submit('Log in') }}
                </td>
                </tr>
                </table>
                {{ Form::close() }}
            </div>
        </div>


@stop