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
					<i class="fa fa-question-circle" aria-hidden="true"></i>
					<span class="nav-text">Guide</span>
				</a>
			</li>
			<li>
				<a class="showStep" target="1">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					<span class="nav-text">Document</span>
				</a>
			</li>
			<li>
				<a class="showStep" target="2">
					<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
					<span class="nav-text">Schedule</span>
				</a>
			</li>
			<li>
				<a class="showStep notification" target="3">
					<i class="fa fa-cogs" aria-hidden="true"></i>
					<span class="nav-text">Material</span>
					<span class="notification">!</span>
				</a>
			</li>
			<li>
				<a class="showStep" target="4">
					<i class="fa fa-cubes" aria-hidden="true"></i>
					<span class="nav-text">Construction</span>
				</a>
			</li>
			<li>
				<a class="showStep" target="5">
					<i class="fa fa-list-ol" aria-hidden="true"></i>
					<span class="nav-text">Punch List</span>
				</a>
			</li>
			<li>
				<a class="showStep" target="6">
					<i class="fa fa-check" aria-hidden="true"></i>
					<span class="nav-text">Accept</span>
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
		<div class="row">
			<div class="col-md-1 test">
				<!-- NAVIGATION TOGGLE START -->
				<button id="navigation-toggle" class="btn btn-primary btn-navigation-toggle">
					<i class="fa fa-bars" aria-hidden="true"></i>
					<!--<span id="show">Show</span>
					<span id="hide">Hide</span>-->
				</button>
				<!-- NAVIGATION TOGGLE END -->
			</div>
			
			<div class="col-md-11">
				<div class="progress">
					<div class="progress-bar progress-bar-success showStep" target="5" role="progressbar" style="width:25%">
						Documentation
					</div>
					<div class="progress-bar progress-bar-striped progress-bar-warning" role="progressbar" style="width:25%">
						Scheduling
					</div>
					<div class="progress-bar progress-bar-striped progress-bar-warning" role="progressbar" style="width:25%">
						Material
					</div>
					<div class="progress-bar progress-bar-striped progress-bar-warning" role="progressbar" style="width:25%">
						Construction
					</div>
				</div>		
			</div>
		</div>
		
		
<!-- INSTRUCTION START -->
		<div id="div0" class="targetDiv instruction">
			<div class="bg-info">
				<h1>Tracking with Cascadian Landworks</h1>
			</div>
			
			<h3>Navigation toggler and Progress Bar</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<ol>
				<li>Hide/show navigation: Click to hide or show navigation</li>
				<li>
					Progress Bar Color indication
					<ul>
						<li id="green">Solid Green: task is completed</li>
						<li id="yellow">Striped Yellow: task is in progress</li>
						<li id="blue">Striped Blue: recently updated</li>
					</ul>
				</li>
			</ol>
			<div class="line"></div>
			
			<h3>Navigating the side-panel</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			
			<ol>
				<li>Contract: see the settled contract</li>
				<li>Scheduling: see the accepted schedule</li>
				<li>Material &amp; Labor: see list of material &amp; labor</li>
				<li>Construction: see construction progress</li>
				<li>Final punch list: ssee ummary of your order</li>
				<li>Acceptance: all crterias are met</li>
				<li>Left/ right arrow: click to resize the navigation panel</li>
			</ol>
			<div class="line"></div>
		</div>
		<!-- INSTRUCTION END -->
		
		<!-- DIV 1 START -->
		<div id="div1" class="targetDiv">
			<div class="bg-info">
				<h1>Contract</h1>
			</div>
			
			<div class="col-md-12">
				<?php foreach (($documentDetails?:[]) as $document): ?>
				<div class="col-md-4 document-box">
					<div class="document-card">
						<h2 class="text-center"><?= ($document['documentName']) ?></h2>
						<a href="javascript:window.open('<?= ($document['documentLink']) ?>','mypopuptitle','width=800,height=800')"><p><img class="imgholder" src="<?= ($document['documentLink']) ?>"></p></a>
						<a href="<?= ($document['documentLink']) ?>" download><button type="button" class="btn btn-primary btn-download">Download this document</button></a>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- DIV 1 ENDS -->

		<!-- DIV 2 START -->
		<div id="div2" class="targetDiv">
			<div class="bg-info">
				<h1>Scheduling</h1>
			</div>

			
			<p><?= ($projectDetails['scheduling']) ?></p>
			<p>1 person scheduled for site-manager</p>
			<p>2 person from Example company on site</p>
			<!--p>Daily Progress Report : <img src="<?= ($projectDetails['daily_progress_report']) ?>"></p>-->
			
			<div class="line"></div>
		</div>
		<!-- DIV 2 ENDS -->

		<!-- DIV 3 START -->
		<div id="div3" class="targetDiv">
			<div class="bg-info">
				<h1>Material &amp; Labor</h1>
			</div>

			<p><?= ($projectDetails['material_labor']) ?></p>
			<p>20 units of hardwoord</p>
			<p>2 big dumptrucks ordered (new)</p>
			<p>1 ton of sand ordered (new)</p>
			<div class="line"></div>
		</div>
		<!-- DIV 3 ENDS -->
		
		<!-- DIV 4 START -->
		<div id="div4" class="targetDiv">
			<div class="bg-info">
				<h1>Construction</h1>
			</div>
			
			<!-- LIGHTBOX START -->
			<div class="wrapper1 col-sm-12">
				<a href="" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
					<img src="https://unsplash.it/600.jpg?image=251" class="img-fluid">
				</a>
				<a href="" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
					<img src="https://unsplash.it/600.jpg?image=252" class="img-fluid">
				</a>
				<a href="" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
					<img src="https://unsplash.it/600.jpg?image=253" class="img-fluid">
				</a>
			</div>
			<div class="wrapper1 col-sm-12">
				<a href="" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
					<img src="https://unsplash.it/600.jpg?image=254" class="img-fluid">
				</a>
				<a href="" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
					<img src="https://unsplash.it/600.jpg?image=255" class="img-fluid">
				</a>
				<a href="" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
					<img src="https://unsplash.it/600.jpg?image=256" class="img-fluid">
				</a>
			</div>
			<!-- LIGHTBOX ENDS -->
			
			<br>
			<div class="col-md-12">
				<div class="col-md-3">
					<h2><img src="<?= ($projectDetails['construction_photos']) ?>"></h2>
				</div>
				<div class="col-md-9">
					<p>Good looking guys finished work #1</p>
					<ol>
						<li>Despcription #1</li>
						<li>Despcription #2</li>
						<li>Despcription #3</li>
					</ol>
				</div>
			</div>
			
			<br>
			<div class="col-md-12">
				<div class="col-md-3">
					<h2><img src="<?= ($projectDetails['construction_photos']) ?>"></h2>
				</div>
				<div class="col-md-9">
					<p>Good looking guys finished work #2</p>
					<ol>
						<li>Despcription #4</li>
						<li>Despcription #5</li>
						<li>Despcription #6</li>
					</ol>
				</div>
			</div>
			
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
	
	<!-- LIGHT BOX -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
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
	
	<script>
		$(window).load(function() {
			if ($(window).width() < 1366) {
				jQuery('#sidebar').toggleClass('navigation-toggle');
			}
			else {
				console.log("testing 2");
			}
		});
	</script>
	
	<!-- LIGHTBOX -->
	<script>
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
	</script>
    </body>
</html>
