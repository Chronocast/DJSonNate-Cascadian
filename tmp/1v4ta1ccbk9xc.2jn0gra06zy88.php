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
</head>

<body>
	
	<!-- NAVBAR -->
	<nav class="navbar navbar-dark bg-primary d-inline-block fixed-top">
						
		<a class="navbar-brand" href="./">
			<img src="images/cascadian-landworks.png" width="30" height="30" alt="Cascadian Landworks">
		</a>
		
		<a class="navbar-brand" href="./">
			<li class="nav-item d-inline-block">
				<button type="button" class="btn btn-warning"> 
					Welcome Nate!
				</button>
			</li>
		</a>
		
		<ul class="nav navbar-nav d-inline-block">							
			
			<!-- Nav button -->
			<li class="nav-item d-inline-block">
				<button type="button" class="btn btn-primary navbar-toggler" alt="dashboard"> 
					<i class="fa fa-bars"></i> 
				</button>
			</li>
			
			<!-- Nav button -->
			<li class="nav-item d-inline-block">
				<button type="button" class="btn btn-primary navbar-toggler" alt="documents"> 
					<i class="fa fa-folder-open-o"></i> 
				</button>
			</li>
			
			<!-- Nav button -->
			<li class="nav-item d-inline-block">
				<button type="button" class="btn btn-primary navbar-toggler" alt="schedule"> 
					<i class="fa fa-calendar"></i> 
				</button>
			</li>
			
			<!-- Nav button -->
			<li class="nav-item d-inline-block">
				<button type="button" class="btn btn-primary navbar-toggler" alt="team"> 
					<i class="fa fa-users"></i> 
				</button>
			</li>
			
			<!-- Nav button -->
			<li class="nav-item d-inline-block">
				<button type="button" class="btn btn-primary navbar-toggler" alt="messaging"> 
					<i class="fa fa-commenting-o"></i> 
				</button>
			</li>
			
		</ul>
	</nav>
	
	
	
	<div id="portfolio" class="portfolio container-fluid">
		
		<!-- begin card deck/columns -->
		<div class="card-deck">
		  
		  <?php foreach (($projectDisplay?:[]) as $track): ?>
		  
			<!-- Card -->
			<div class="card">
  
  
			  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
				  Project # <?= ($track['track_id'])."
" ?>
			  </button>
			  <div class=" d-inline-block">
			  <a href="<?= ($track['documentation_link']) ?>">
				<button type="button" class="btn btn-primary" alt="documents"> 
				  <i class="fa fa-folder-open-o"></i> 
				</button>
			  </a>
			  <a>
				<button type="button" class="btn btn-primary" alt="documents"> 
				  <i class="fa fa-calendar"></i> 
				</button>
			  </a>
			  <a>
				<button type="button" class="btn btn-primary" alt="documents"> 
				  <i class="fa fa-users"></i>
				</button>
			  </a>
			  <a>
				<button type="button" class="btn btn-primary" alt="documents"> 
				  <i class="fa fa-commenting-o"></i> 
				</button>
			  </a>
			</div>
  
			  <div class="card-body">
				<h4 class="card-title">Current Stage: <?= ($track['current_step']) ?></h4>
				<p class="card-text">Tracking # <?= ($track['track_id']) ?></p>
				<p class="card-text">Start Date: <?= ($track['start_date']) ?></p>
				<p class="card-text">End Date: <?= ($track['end_date']) ?></p>
			  </div>
			  <div class="card-footer">
				<small class="text-muted">Last updated 3 mins ago</small>
			  </div>
			  
			  
			  <!-- Modal -->
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
						<p class="card-text">Current Stage: <?= ($track['current_step']) ?></p>
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
	
	<a id="document"></a>
	
	<div id="portfolio" class="portfolio container-fluid">
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
	
	<!-- BOOTSTRAP JS/JQUERY/POPPER CDN -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	
	
	<!-- FONT AWESOME -->
	<script src="https://use.fontawesome.com/a516aa6fdc.js"></script>
	

</body>
</html>