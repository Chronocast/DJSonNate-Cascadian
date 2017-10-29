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
	
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="./favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="./favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="./favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="./favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="./favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="./favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="./favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="./favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="./android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="./favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="./favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
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
					Document
				</a>
			</li>
			<li>
				<a class="showStep" target="2">
					<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
					Schedule
				</a>
			</li>
			<li>
				<a class="showStep" target="3">
					<i class="fa fa-cogs" aria-hidden="true"></i>
					Material
				</a>
			</li>
			<li>
				<a class="showStep" target="4">
					<i class="fa fa-cubes" aria-hidden="true"></i>
					Progress
				</a>
			</li>
			<li>
				<a class="showStep" target="5">
					<i class="fa fa-list-ol" aria-hidden="true"></i>
					Punch List
				</a>
			</li>
			<li>
				<a class="showStep" target="6">
					<i class="fa fa-check" aria-hidden="true"></i>
					Accept
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
		
		
		<div class="col-12">
			<div class="col-2">
				<!-- NAVIGATION TOGGLE START -->
				<button id="navigation-toggle" class="btn btn-primary btn-navigation-toggle">
					<i class="fa fa-bars" aria-hidden="true"></i>
					<!--
					<span id="show">Show navigation</span>
					<span id="hide">Hide navigation</span>
					-->
				</button>
				<!-- NAVIGATION TOGGLE END -->
			</div>
		</div>
		
		<div class="progress">
			<div class="progress-bar progress-bar-success role="progressbar" style="width:25%">
				Documentation
			</div>
			<div class="progress-bar progress-bar-warning role="progressbar" style="width:25%">
				Scheduling
			</div>
			<div class="progress-bar progress-bar-danger role="progressbar" style="width:25%">
				Material & labor
			</div>
			<div class="progress-bar progress-bar-warning role="progressbar" style="width:25%">
				Progress construction
			</div>
		</div>		
		
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

			
			<p><img src="<?= ($projectDetails['documentation_link']) ?>"></p>
			
			<div class="line"></div>
		</div>
		<!-- DIV 1 ENDS -->

		<!-- DIV 2 START -->
		<div id="div2" class="targetDiv">
			<div class="bg-info">
				<h1>Scheduling</h1>
			</div>

			
			<p><?= ($projectDetails['scheduling']) ?></p>
			<p>Daily Progress Report : <img src="<?= ($projectDetails['daily_progress_report']) ?>"></p>
			
			<div class="line"></div>
		</div>
		<!-- DIV 2 ENDS -->

		<!-- DIV 3 START -->
		<div id="div3" class="targetDiv">
			<div class="bg-info">
				<h1>Material &amp; Labor</h1>
			</div>

			<h1><?= ($projectDetails['material_labor']) ?></h1>
			<div class="line"></div>
		</div>
		<!-- DIV 3 ENDS -->
		
		<!-- DIV 4 START -->
		<div id="div4" class="targetDiv">
			<div class="bg-info">
				<h1>Construction</h1>
			</div>

			<h2><img src="<?= ($projectDetails['construction_photos']) ?>"></h2>
			
			<div class="line"></div>
		</div>
		<!-- DIV 4 ENDS -->

		<!-- DIV 5 START -->
		<div id="div5" class="targetDiv">
			<div class="bg-info">
				<h1>Final punch list</h1>
			</div>

			<h2><?= ($projectDetails['final_stage']) ?></h2>
			

			<div class="line"></div>
		</div>
		<!-- DIV 5 ENDS -->
		
		<!-- DIV 6 START -->
		<div id="div6" class="targetDiv">
			<div class="bg-info">
				<h1>Acceptance</h1>
			</div>

			<h2><?= ($projectDetails['final_stage']) ?></h2>

			<div class="line"></div>
		</div>
		<!-- DIV 6 ENDS -->
		
	</div>
	<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Back to top" data-toggle="tooltip" data-placement="left"><span class="fa fa-chevron-up"></span></a>
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
		jQuery('#sidebarCollapse').click(function () {
			jQuery('#sidebar').toggleClass('resize');
		});
	</script>
	
	<script>
		jQuery('#navigation-toggle').click(function () {
			jQuery('#navigation-toggle').toggleClass('hide-navigation');
			jQuery('#sidebar').toggleClass('navigation-toggle');
		});
	</script>
	
	<script>
		$(document).ready(function(){
			$(window).scroll(function () {
				   if ($(this).scrollTop() > 50) {
					   $('#back-to-top').fadeIn();
				   } else {
					   $('#back-to-top').fadeOut();
				   }
			   });
			   // scroll body to 0px on click
			   $('#back-to-top').click(function () {
				   $('#back-to-top').tooltip('hide');
				   $('body,html').animate({
					   scrollTop: 0
				   }, 800);
				   return false;
			   });
			   
			   $('#back-to-top').tooltip('show');
		
		});
	</script>
    </body>
</html>
