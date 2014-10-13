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
            {{ link_to('admin/home', 'Home',array('class' => 'underline')) }} | 
            {{ link_to('admin/logout', 'Logout',array('class' => 'underline')) }}
            </span>
        </div>
        <div class="divWelcomeUser">
            <span id="header_htmlHelloUser">Hello {{ Session::get('userFullName') }}
            </span>
        </div>
		<div id="ctl00_header_divPublicNavBar" class="mainTab">
			<span id="ctl00_header_htmlMainTabs">
			    <div class="mainMenu">
			        <dl class="dropdown">
				        <dt id="four-ddheader" onmouseover="ddMenu('four', 1)" onmouseout="ddMenu('four', -1)">Settings</dt>
			            <dd class="menuItem" id="four-ddcontent" onmouseover="cancelHide('four')" onmouseout="ddMenu('four',-1)">
			                <ul>
						   		<li>
						   		{{ link_to('/admin/settings/Settings', 'Settings',array('class' => 'underline')) }}							   		
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/settings/Lookup', 'Lists',array('class' => 'underline')) }}
							   		
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/settings/ChangePassword', 'Change Password',array('class' => 'underline')) }}						   	</li> 
					   		</ul>
				   		</dd>
			   		</dl>
			   		<dl class="dropdown">
				   		<dt id="three-ddheader"  onmouseover="ddMenu('three', 1)" onmouseout="ddMenu('three', -1)">Help Desk</dt>
					    <dd class="menuItem" id="three-ddcontent" onmouseover="cancelHide('three')" onmouseout="ddMenu('three',-1)">
						    <ul>
						   		<li>
						   		{{ link_to('/admin/support/supportList', 'Support Requests',array('class' => 'underline')) }}

						   		</li> 
						   		<li>
						   		{{ link_to('/admin/support/AnnouncementList', 'Announcements',array('class' => 'underline')) }}
						   		</li> 
						   	</ul>
				   		</dd>
			   		</dl>
			   		<dl class="dropdown">
				   		<dt id="two-ddheader" onmouseover="ddMenu('two', 1)" onmouseout="ddMenu('two', -1)">Network</dt>
				        <dd class="menuItem" id="two-ddcontent" onmouseover="cancelHide('two')" onmouseout="ddMenu('two',-1)">
					        <ul>
						   		<li>
						   		{{ link_to('/admin/Network/Geneology', 'Geneology',array('class' => 'underline')) }}
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/Network/GeneologyByDate', 'Geneology By Date',array('class' => 'underline')) }}
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/Network/GeneologyUV', 'UV Geneology',array('class' => 'underline')) }}
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/Network/IRPerformance', 'IR Performance',array('class' => 'underline')) }}
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/Network/Performance', 'Approved Policy Details',array('class' => 'underline')) }}
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/Network/Payouts', 'Payments',array('class' => 'underline')) }}
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/Network/SpecialIncentives', 'Special Incentives',array('class' => 'underline')) }}
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/Network/Reports', 'Reports',array('class' => 'underline')) }}
						   		</li> 
						   	</ul>
				   		</dd>
			   		</dl>
			   		<dl class="dropdown">
				   		<dt id="one-ddheader" onmouseover="ddMenu('one', 1)" onmouseout="ddMenu('one', -1)">Members</dt>
				        <dd class="menuItem" id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)" style="display: block; height: 0px; opacity: 0;">
					        <ul>
						   		<li>
						   		{{ link_to('/admin/Members/membersearch', 'Members',array('class' => 'underline')) }}
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/Members/TransactionsNew', 'New Customers',array('class' => 'underline')) }}
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/Members/TransactionsPending', 'Pending List',array('class' => 'underline')) }}
						   		</li> 
						   		<li>
						   		{{ link_to('/admin/Members/PolicySearch', 'Policies',array('class' => 'underline')) }}
						   		</li> 
					   		</ul>
						</dd>
			   		</dl>
			   	</div>
			</span>
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