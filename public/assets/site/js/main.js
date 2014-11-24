$( document ).ready(function() {

	/*On change year get weeks*/
      	$( "#ddlYear" ).change(function() {
		  var year = $('#ddlYear').val();
      	  $.post( "weeks",{ year: year }, function( data ) {
				
				$( "#ddlWeek" ).empty();
				$.each( data, function( key, value ) {

				  $( "#ddlWeek" ).append(new Option(value, key));
				});
			});
		});

	/*On change Tp Year get weeks*/
      	$( "#ddlYear1" ).change(function() {
		  var year = $('#ddlYear1').val();
      	  $.post( "weeks",{ year: year }, function( data ) {
				
				$( "#ddlWeek1" ).empty();
				$.each( data, function( key, value ) {

				  $( "#ddlWeek1" ).append(new Option(value, key));
				});
			});
		});

		/*On change state get district*/
      	$( "#ddlState" ).change(function() {
		  var state = $('#ddlState option:selected').val();
      	  $.post( "districts",{ state: state }, function( data ) {
				 $( "#ddlDistrict" ).empty();
				 $.each( data, function( key, value ) {				 
				  $( "#ddlDistrict" ).append(new Option(value, key));
				});
			});
		});


		/*Validate Introducer Id:*/
		$( "#tbIntroducerId" ).change(function() {			
		  var introducerId = $('#tbIntroducerId').val();		  	
      	  $.post( "introducer",{ introducerId: introducerId }, function( data ) {	
      	  							
      	  		$( "#divIRValidation" ).html(data);				
			});
		});
		


	/*Validate Password*/
			$("#tbPassword").change(function() {	
					
			  var passwordLen = $('#tbPassword').val().length;
			  if(passwordLen<6)
			  {
			  	$( "#divPasswordValidation" ).empty();
      	  		$( "#divPasswordValidation" ).append("Password Must Be Minimum 6 Characters");

			  }
			  else{
			  		$( "#divPasswordValidation" ).empty();
			  }

			});

			/*Validate Confirm Password*/
			$("#tbConfirmPassword").change(function() {	

			  var password1 = $('#tbPassword').val();
			  var password2 = $('#tbConfirmPassword').val();
			  if(password1 !== password2){

			  	$( "#divConfirmPasswordValidation" ).append("Password values entered do not match. Please enter again. Password must be at least 6 characters long.");
			  		
			  }
			  else{
			  	$( "#divConfirmPasswordValidation" ).empty();
			  }

			});


		/*Validate Placement Id:*/
		$( "#tbPlacementId" ).change(function() {			
		  var placementId = $('#tbPlacementId').val();
      	  $.post( "placement",{ placementId: placementId }, function( data ) {
				  $( "#divPlacementValidation" ).empty();
				  
				  if(data.indexOf("Both") >= 0)
				  {
				  	$('#lbPlacementPosition').attr('disabled',false);
				  	$('#rbPlacementPosition').attr('disabled',false);
				  }
				  else if(data.indexOf("Right") >= 0)
				  {
				  	$('#rbPlacementPosition').attr('disabled',false);
					$('#lbPlacementPosition').attr('disabled',true);				  	

				  }
				  else if(data.indexOf("Left") >= 0)
				  {		
				  	$('#lbPlacementPosition').attr('disabled',false);
					$('#rbPlacementPosition').attr('disabled',true);	  	

					
				  }
				  else
				  {				  	
				  	$( "#divPlacementValidation" ).text(data);
				  	$('#lbPlacementPosition').attr('disabled',true);
				  	$('#rbPlacementPosition').attr('disabled',true);

				  }
			
			});
		});
		



   

});