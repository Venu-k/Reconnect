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

    <div class="divMainBody" id="divMainBody" style="
    width: 100%;
    margin-left: 0px;
    margin-right: 0px;
">

    <div class="divForm">
    <div class="divMainGridHeading">
    Contact Us
    </div>
    {{ Form::open(array('id' => 'formMaster','method'=>'POST')) }}
    <table class="tblForm">
    <tr>
    <td style="text-align:right;">
    Your name:
    </td>
    <td>
    {{ Form::text('txtName',null,array('required' => 'true')) }}
    
    </td>
    </tr>

    <tr>
    <td style="text-align:right;">
    Your email address:
    </td>
    <td>
     {{ Form::email('txtEmail',null,array('required' => 'true')) }}
    </td>
    </tr>
    
    <tr>
    <td style="text-align:right;">
    Comments:
    </td>
    <td>
     {{ Form::textarea('txtComments',null,array('required' => 'true','class' => 'details','style' => 'width:200px; height: 100px;')) }}
   
    </td>
    </tr>
    
    <tr>
    <td>&nbsp;
    </td>
    <td>
      {{ Form::submit('Submit',array('id' => 'btnSubmit',)) }}
      {{ Form::button('Cancel',array('id' => 'btnCancel','onclick' =>'location.href="../default"')) }} 
      {{ Form::close() }}
   
    </td>
    </tr>
    
    </table>
    
    
    </div>

</div>    

@stop