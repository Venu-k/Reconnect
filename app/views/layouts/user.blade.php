<!-- Stored in app/views/layouts/master.blade.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<META name=GENERATOR content="MSHTML 8.00.6001.18928">
		<title>master page</title>
		<!-- Style sheets -->		
		<link type="text/css" rel="stylesheet" href="{{ asset('assets/site/css/common.css') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('assets/site/css/FKCalendarTheme.css') }}" />
    	<link type="text/css" rel="stylesheet"  href="{{ asset('assets/site/css/jquery-ui-1.7.2.custom.css') }}"/>
    	<link rel="stylesheet" type="text/css" href="{{ asset('assets/site/css/treeTable.css') }}" />
    	<link rel="stylesheet" type="text/css" href="{{ asset('assets/site/css/productsstyles.css') }}">
    
	    <script type="text/javascript" src="{{ asset('assets/site/js/jquery-1.3.2.min.js')  }}" ></script>
	    <script type="text/javascript" src="{{ asset('assets/site/js/jquery-ui-1.7.2.custom.min.js')  }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/site/js/dropdown.js')  }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/site/js/ajax.js')  }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/site/js/ajax-dynamic-content.js')  }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/site/js/jscommon.js')  }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/site/js/calendar/FKCalendar.js')  }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/site/js/jquery-1.4.2.min.js')  }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/site/js/jquery-ui-1.8.1.custom.min.js')  }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/site/js/treeTable.js')  }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/site/js/AC_RunActiveContent.js')  }}"></script>
	     <script type="text/javascript" src="{{ asset('assets/site/js/main.js')  }}"></script>

	</head>
    <body style="width:1100px">
    <!-- Main content starts -->
   		<div id="content">
   		<!-- Header content -->
	   		<div class="divHeader" id="divHeader">
	   		<!-- Header Logo -->
                <div class="divLogo">
                    <div style='float:left;	margin-top:20px;'><span class='logoFlat'>re</span><span class='logoKeeping'>connect</span>.co.in</div>
                </div> 
                <div class="divGlobalNav">
                    <span id="header_htmlGlobalNav"> | 
                    {{ link_to('user/home', 'Home',array('class' => 'underline')) }} | 
                    {{ link_to('user/logout', 'Logout',array('class' => 'underline')) }}
                    </span>
                </div> 
                <div class="divWelcomeUser">
                    <span id="header_htmlHelloUser">Hello {{ Session::get('userFullName') }}
                    </span>
                </div>


                <div class="mainTab" id="divPrivateNavBar" runat="server" visible="false">
                <div class="mainMenu">
            	 	<!-- Help -->
            	 	<dl class="dropdown">
	            	 	<dt id="four-ddheader"  onmouseover="ddMenu('four', 1)" onmouseout="ddMenu('four', -1)">Help</dt>
		            	<dd class="menuItem" id="four-ddcontent" onmouseover="cancelHide('four')" onmouseout="ddMenu('four',-1)">
		            	 	<ul>
			            	 	<li>
			            	 	{{ link_to('user/ChangePassword', 'Change Password',array('class' => 'underline')) }}
			            	 	</li> 
			            	 	<li>
			            	 	{{ link_to('user/support', 'Contact Helpdesk',array('class' => 'underline')) }}
			            	 	</li> 
		            	 	</ul>
	            	 	</dd>
            	 	</dl>
            	 	<!-- Summary -->

            	 	<dl class="dropdown">
            	 	<dt id="three-ddheader"  onmouseover="ddMenu('three', 1)" onmouseout="ddMenu('three', -1)">Summary</dt>
	            	 	<dd class="menuItem" id="three-ddcontent" onmouseover="cancelHide('three')" onmouseout="ddMenu('three',-1)">
		            	 	<ul>
			            	 	<li>
			            	 	{{ link_to('user/IRSummary', 'Business Summary',array('class' => 'underline')) }}
			            	 	</li> 
			            	 	<li>
			            	 	{{ link_to('user/welcomeletter', 'Welcome Letter',array('class' => 'underline')) }}
			            	 	</li> 
			            	 	<li>
			            	 	{{ link_to('user/SpecialIncentives', 'Special Incentives',array('class' => 'underline')) }}
			            	 	</li> 
			            	 	<li>			            	 	
			            	 	<a href="{{ asset('assets/PPT1.ppt') }}" class="underline">Presentation</a>
			            	 	</li> 
		            	 	</ul>
	            	 	</dd>
            	 	</dl>

					<!-- Geneology -->

            	 	<dl class="dropdown">
            	 	<dt id="two-ddheader"  onmouseover="ddMenu('two', 1)" onmouseout="ddMenu('two', -1)">Geneology</dt>
	            	 	<dd class="menuItem" id="two-ddcontent" onmouseover="cancelHide('two')" onmouseout="ddMenu('two',-1)">
		            	 	<ul>
			            	 	<li>
			            	 	{{ link_to('user/geneology', 'Visual Geneology',array('class' => 'underline')) }}
			            	 	</li> 
			            	 	<li>
			            	 	{{ link_to('user/GeneologyByDate', 'Geneology By Date',array('class' => 'underline')) }}
			            	 	</li> 
			            	 	<li>
			            	 	{{ link_to('user/GeneologyUV', 'UV Geneology',array('class' => 'underline')) }}
			            	 	</li> 
		            	 	</ul>
	            	 	</dd>
            	 	</dl>
            	 	<!-- Profile -->

            	 	<dl class="dropdown">
            	 	<dt id="one-ddheader" onmouseover="ddMenu('one', 1)" onmouseout="ddMenu('one', -1)">Profile</dt>

	            	 	<dd class="menuItem" id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)" style="display: block; height: 0px; opacity: 0;">
		            	 	<ul>
			            	 	<li>
			            	 	{{ link_to('user/member', 'My Profile',array('class' => 'underline')) }}

			            	 	</li> 
			            	 	<li>
			            	 	{{ link_to('user/membersearch', 'Policy Status',array('class' => 'underline')) }}
			            	 	</li> 
			            	 	<li>
			            	 	{{ link_to('user/CreateIRExtension', 'Create Extension',array('class' => 'underline')) }}

			            	 	</li> 
		            	 	</ul>
	            	 	</dd>
            	 	</dl>
            	 </div>           
            	          
   			</div>
   			</div>

			<!-- Main Body content -->
   			<div>
   			@yield('mainBody')
   			</div>

			<!-- Footer content -->
	   		<div class="divFooter" id="divFooter" style="width: 960px;
	   		margin-left:0px"
	   		>
	            &copy; 2010 reconnect.co.in. All rights reserved.
	        </div>
        </div><!-- Main content ends -->
      
    </body>
</html>