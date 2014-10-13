@extends('layouts.user')


@section('mainBody')

    <div class="divLeftBody" id="divLeftBody" style="width: 170px;">
    {{ Form::open(array('url' => 'user/membersearch','id' => 'formMaster','method' => 'GET')) }}
        <div class="divSideBoxHeading">
        Search
        </div>
        <div class="divSideBox">
          <div>
          {{ Form::label('tbName', 'Name:') }} 
          <br />
          {{ Form::text('tbName',null,array('maxlength' => '20')) }}
          </div>
          <div>
          {{ Form::label('tbMemberID', 'Member ID:') }} 
          <br />
          {{ Form::text('tbMemberID',null,array('maxlength' => '20')) }}
          <br />
          </div>
          <div>
          {{ Form::label('tbStartDate', 'Join Date:') }} 
          <br />
          <input type="date" name="tbStartDate" id='tbStartDate'>
          </div>
          {{ Form::submit('Search',array('id' => 'btnSearch')) }} 
         
        </div>
          {{ Form::close() }}   

    </div>
    <div class="divMainBody" id="divMainBody" style="width: 900px;">
      <div class="divForm">
        <div class="divMainGridHeading">
            Members
        </div>
        <table class="divGrid" cellspacing="0" rules="all" border="1" id="mainBody_grid1" style="border-collapse:collapse;">
            <tbody>
              <tr>
                <th scope="col">Member ID</th>
                <th scope="col">Name</th>
                <th scope="col">Join Date</th>
                <th scope="col">Email</th>
                <th scope="col">Cell Phone</th>
                <th scope="col">Home Phone</th>
              </tr>
              <?php $i=0?>
              @foreach ($policyDetails as $policy)
              <?php if($i%2 == 0){
                 echo "<tr class='alternate'>";
                }
                else
                {
                  echo "<tr>";
                }
                ?>
                  <td>{{ $policy->display_irid }}</td>
                  <td>{{ $policy->name }}</td>
                  <td>{{ $policy->start_date }}</td>
                  <td>{{ $policy->emailaddress }}</td>
                  <td>{{ $policy->phone_mobile }}</td>
                  <td>{{ $policy->phone_home }}</td>
                </tr>
                <?php $i++ ?>
              @endforeach
             
              @if($inputParameter)           

              {{ $policyDetails->appends(array($inputParameter => $inputValue))->links(); }}
              @else
              {{ $policyDetails->links(); }}
              @endif
              
                
            </tbody>
        </table>         
      </div>
    </div>
@stop