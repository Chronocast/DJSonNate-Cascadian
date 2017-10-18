<!DOCTYPE html>
<html lang="en">
	
<!--
	Author: Nathan Hascup, Duck Nguyen, Jeremy Manalo, Sonie Moon
	Date: 10/16/17
	Filename: home.html
	Description: Tracking page for Track-king. Cascadian Landworks tracking system.
-->
	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Tracking | Cascadian Landworks</title>

	 <!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- Our Custom CSS -->
	<link rel="stylesheet" type="text/css" href="./css/tracking.css">
</head>

<body>
<div class="wrapper">
	<!-- Sidebar Holder -->
	<nav id="sidebar">
		<div class="sidebar-header logo">
			<img src="images/cascadian-landworks.png">
		</div>

		<ul class="list-unstyled components">
			<li class="active">
				<a class="showStep" target="0">
					<i class="fa fa-map-o" aria-hidden="true"></i>
					Guide
				</a>
			</li>
			<li>
				<a class="showStep" target="1">
					<i class="fa fa-handshake-o" aria-hidden="true"></i>
					Step 1
				</a>
			</li>
			<li>
				<a class="showStep" target="2">
					<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
					Step 2
				</a>
			</li>
			<li>
				<a class="showStep" target="3">
					<i class="fa fa-cogs" aria-hidden="true"></i>
					Step 3
				</a>
			</li>
			<li>
				<a class="showStep" target="4">
					<i class="fa fa-cubes" aria-hidden="true"></i>
					Step 4
				</a>
			</li>
			<li>
				<a class="showStep" target="5">
					<i class="fa fa-list-ol" aria-hidden="true"></i>
					Step 5
				</a>
			</li>
			<li>
				<a class="showStep" target="6">
					<i class="fa fa-check" aria-hidden="true"></i>
					Step 6
				</a>
			</li>
		</ul>
		<a type="button" id="sidebarCollapse">
			<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
			<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
		</a>
	</nav>

	<!-- Page Content Holder -->
	<div id="content">
	<div class="container-fluid">
		
		<!-- INSTRUCTION START -->
		<div id="div0" class="targetDiv instruction">
			<div class="bg-info">
				<h1>Tracking with Cascadian Landworks</h1>
			</div>

			<h3>Little bit about the tracking system</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			
			<div class="line"></div>
			
			<h3>Navigating the system</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			
			<ol>
				<li>Guide</li>
				<li>Contract: see the settled contract</li>
				<li>Scheduling: see the accepted schedule</li>
				<li>Material &amp; Labor: list of material &amp; labor</li>
				<li>Construction: construction progress</li>
				<li>Final punch list: punchy</li>
				<li>Acceptance</li>
				<li>Expand navigation: click to resize the navigation panel</li>
			</ol>

			<div class="line"></div>
		</div>
		<!-- INSTRUCTION END -->
		
		<!-- DIV 1 START -->
		<div id="div1" class="targetDiv">
			<div class="bg-info">
				<h1>Contract</h1>
			</div>

			<h2>Testing 1</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

			<div class="line"></div>
		</div>
		<!-- DIV 1 ENDS -->

		<!-- DIV 2 START -->
		<div id="div2" class="targetDiv">
			<div class="bg-info">
				<h1>Scheduling</h1>
			</div>

			<h2>Testing 2</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

			<div class="line"></div>
		</div>
		<!-- DIV 2 ENDS -->

		<!-- DIV 3 START -->
		<div id="div3" class="targetDiv">
			<div class="bg-info">
				<h1>Material &amp; Labor</h1>
			</div>

			<h2>Testing 3</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

			<div class="line"></div>
		</div>
		<!-- DIV 3 ENDS -->
		
		<!-- DIV 4 START -->
		<div id="div4" class="targetDiv">
			<div class="bg-info">
				<h1>Construction</h1>
			</div>

			<h2>Testing 4</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


			<div class="line"></div>
		</div>
		<!-- DIV 4 ENDS -->

		<!-- DIV 5 START -->
		<div id="div5" class="targetDiv">
			<div class="bg-info">
				<h1>Final punch list</h1>
			</div>

			<h2>Testing 5</h2>
			<p>Not yet applied</p>

			<div class="line"></div>
		</div>
		<!-- DIV 5 ENDS -->
		
		<!-- DIV 6 START -->
		<div id="div6" class="targetDiv">
			<div class="bg-info">
				<h1>Acceptance</h1>
			</div>

			<h2>Testing 6</h2>
			<p>Not yet applied</p>

			<div class="line"></div>
		</div>
		<!-- DIV 6 ENDS -->
		
	</div>
	
	<!-- END OF CONTENT -->
	</div>
</div>


	<!-- JQUERY CDN -->
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

	<!-- BOOTSTRAP JS CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- FONT AWESOME -->
	<script src="https://use.fontawesome.com/a516aa6fdc.js"></script>
	
	<!-- ACTIVE TAB AND SHOW/HIDE DIVS -->
	<script>
		jQuery(function(){
			jQuery('.targetDiv').hide();
			jQuery('.instruction').show();
			
			jQuery('.showStep').click(function(){
				jQuery('.targetDiv').hide();
				jQuery('.active:first').removeClass('active');
				jQuery($(this)).parent().addClass('active');
				jQuery('#div'+$(this).attr('target')).show();
				
			});
		});
	</script>
	
	<!-- RESIZE SIDE-NAV-->
	<script>
		jQuery(function (){
			jQuery('#sidebarCollapse').click(function () {
				jQuery('#sidebar').toggleClass('resize');
			});
		});
	</script>
    </body>
</html>
