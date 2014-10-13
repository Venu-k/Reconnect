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
    <body>
    <!-- Main content starts -->
   		<div id="content">
   		<!-- Header content -->
	   		<div class="divHeader" id="divHeader">
	   		<!-- Header Logo -->
                <div class="divLogo">
                    <div style='float:left;	margin-top:20px;'><span class='logoFlat'>re</span><span class='logoKeeping'>connect</span>.co.in</div>
                </div>
               
            	@yield('mainTabNav')	            
   			</div>

			<!-- Main Body content -->
   			<div>
   			@yield('mainBody')
   			</div>

			<!-- Footer content -->
	   		<div class="divFooter" id="divFooter" >
	            &copy; 2010 reconnect.co.in. All rights reserved.
	        </div>
        </div><!-- Main content ends -->
      
    </body>
</html>