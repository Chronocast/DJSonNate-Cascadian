<!DOCTYPE html>
<html lang="en">
	
<!--
	Author: Nathan Hascup, Duck Nguyen, Jeremy Manalo, Sonie Moon
	Date: 10/13/17
	Filename: home.html
	Description: Admin page for Track-king. Cascadian Landworks tracking system.
-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<script src="js/admin.js"></script>
	
	<title>Admin | Cascadian Landworks</title>
	
	<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	
	<!-- Our Custom CSS -->
	<link rel="stylesheet" type="text/css" href="./css/admin.css">
	
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
	
	<!-- NAVBAR START -->
	<nav class="navbar navbar-dark bg-primary d-inline-block fixed-top">
		<!-- LOGO AND WELCOME USER -->				
		<a class="navbar-brand" href="./admin">
			<img src="images/cascadian-landworks.png" alt="Cascadian Landworks">
		</a>
		
		<a class="navbar-brand" href="./">
			<li class="nav-item d-inline-block">
				<button type="button" class="btn btn-warning"> 
					Welcome Nate!
				</button>
			</li>
		</a>
		
		<!-- MAIN NAVIGATION START -->
		<ul class="nav navbar-nav d-inline-block">							
			
			<!-- NAV BUTTON - HOME -->
			<li class="nav-item d-inline-block active">
				<a href="" title="Home">
				<button type="button" class="btn btn-primary navbar-toggler" alt="dashboard">
						<i class="fa fa-home"></i>
					<!--<i class="fa fa-th-list"></i>-->
				</button>
				</a>
			</li>
			
			<!-- NAV BUTTON - PROJECTS LIST -->
			<li class="nav-item d-inline-block">
				<a href="" title="Projects history">
				<button type="button" class="btn btn-primary navbar-toggler" alt="documents">
						<i class="fa fa-th-list"></i> 
					<!--<i class="fa fa-folder-open-o"></i>-->
				</button>
				</a>
			</li>
			
			<!-- NAV BUTTON - ADD NEW PROJECT -->
			<li class="nav-item d-inline-block">
				<a href="" title="New project">
				<button type="button" class="btn btn-primary navbar-toggler" alt="schedule">
						<i class="fa fa-plus-square"></i> 
				</button>
				</a>
			</li>
			
			<!-- NAV BUTTON - SLACK -->
			<li class="nav-item d-inline-block">
				<a href="" title="Slack talk">
				<button type="button" class="btn btn-primary navbar-toggler" alt="team">
						<i class="fa fa-slack"></i> 
				</button>
				</a>
			</li>
			
			<!-- NAV BUTTON - SEARCH????? -->
			<li class="nav-item d-inline-block">
				<a href="" title="Site search">
				<button type="button" class="btn btn-primary navbar-toggler" alt="team">
						<i class="fa fa-search"></i> 
				</button>
				</a>
			</li>
		</ul>
		<!-- MAIN NAVIGATION ENDS -->
	</nav>
	<!-- NAVBAR ENDS -->
	
	<!-- ACTIVE PROJECT START -->
	<div id="active-div" class="portfolio container-fluid">
		<div class="col-sm-12">
			<h1>Active projects:</h1>
		</div>
		
		<!-- CARD DECK/COLUMNS START -->
		<div class="card-deck">
		  
		  <?php foreach (($projectDisplay?:[]) as $track): ?>
		  
			<!-- CARD -->
			<div class="card">
				<!-- CARD TITLE + OPTIONS BUTTONS-->
				<!-- button class was btn-info -->
				<button type="button" class="btn btn-title" data-toggle="modal" data-target="#exampleModal">
					<!-- consider putting project title here-->
					Project # <?= ($track['track_id'])."
" ?>
				</button>
				
				<div class="d-inline-block text-center">
					<a href="<?= ($track['documentation_link']) ?>">
						<button type="button" class="btn btn-warning" alt="documents"> 
							<i class="fa fa-file-text-o"></i> 
						</button>
					</a>
					<a>
						<button type="button" class="btn btn-warning" alt="documents"> 
							<i class="fa fa-calendar-check-o"></i> 
						</button>
					</a>
					<a>
						<button type="button" class="btn btn-warning" alt="documents"> 
							<i class="fa fa-cogs"></i>
						</button>
					</a>
					<a>
						<button type="button" class="btn btn-warning" alt="documents"> 
							<i class="fa fa-cubes"></i> 
						</button>
					</a>
					<a>
						<button type="button" class="btn btn-warning" alt="documents"> 
							<i class="fa fa-list-ol"></i> 
						</button>
					</a>
					<a>
						<button type="button" class="btn btn-warning" alt="documents"> 
							<i class="fa fa-check"></i> 
						</button>
					</a>
				</div>
				
				<!-- CARD BODY -->
				<div class="card-body">
					<h6 class="card-title">Current Stage: <?= ($track['current_stage']) ?></h6>
					<p class="card-text">Tracking # <?= ($track['track_id']) ?></p>
					<p class="card-text">Start Date: <?= ($track['start_date']) ?></p>
					<p class="card-text">End Date: <?= ($track['end_date']) ?></p>
				</div>
				<div class="card-footer">
					<small class="text-muted">Last updated <?= ($track['last_update']) ?></small>
				</div>
			  
			  
				<!-- MODAL -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Tracking # <?= ($track['track_id']) ?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p class="card-text">Current Stage: <?= ($track['current_stage']) ?></p>
								<p class="card-text">Start Date: <?= ($track['start_date']) ?></p>
								<p class="card-text">End Date: <?= ($track['end_date']) ?></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>
				<!-- END Modal -->
			  
			</div>
			<!-- END Card -->
		  
			<?php endforeach; ?>
		</div>
	</div>
	<!-- ACTIVE PROJECT END -->
	

	<!-- INACTIVE PROJECT START -->
	<div id="inactive-div" class="portfolio container-fluid">
		<div class="col-sm-12">
			<h1>Inactive projects</h1>
		</div>
		<div class="list-group">
			<a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">List group item heading</h5>
					<small>3 days ago</small>
				</div>
				<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
				<small>Donec id elit non mi porta.</small>
			</a>
			<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">List group item heading</h5>
					<small class="text-muted">3 days ago</small>
				</div>
				<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
				<small class="text-muted">Donec id elit non mi porta.</small>
			</a>
			<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">List group item heading</h5>
					<small class="text-muted">3 days ago</small>
				</div>
				<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
				<small class="text-muted">Donec id elit non mi porta.</small>
			</a>
		</div>
	</div>
	<!-- INACTIVE PROJECT END -->
	
	<!-- BOOTSTRAP JS/JQUERY/POPPER CDN -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


	
	<!-- FONT AWESOME -->
	<script src="https://use.fontawesome.com/a516aa6fdc.js"></script>

</body>
</html>