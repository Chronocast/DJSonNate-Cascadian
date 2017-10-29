<!DOCTYPE html>
<!--
 	Author: Nathan Hascup, Duck Nguyen, Jeremy Manalo, Sonie Moon
 	Date: 10/13/17
 	Filename: home.html
 	Description: Home page for Track-king. Cascadian Landworks tracking system.
 -->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Tracking ID | Cascadian Landworks</title>
	
	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- Our Custom CSS -->
	<link rel="stylesheet" type="text/css" href="./css/home.css">
</head>
 
<body>
 	<div class="container">
         <div class="card card-container">
 			<div class="row">
 				<img class="card-img-top" src="./images/cascadian-landworks.png">
  			</div>
  			
 			<div class="main-view">
				<!-- TRACKING FORM START -->
				<form id="tracking-form" class="form-track" action="./tracking" method="post" autocomplete="on">
					
					<div class="form-group">
						<h2><label class="control-label" for="trackingID">
							<i class="fa fa-search" aria-hidden="true"></i>
							Tracking ID
						</label></h2><span class="red" hidden="hidden">&emsp;&emsp; *</span><span class="red" id="error"></span>
						
						<div class="input-group col-sm-12"><input type="text" class="form-control" id="trackingID" placeholder="Enter your tracking ID" required autofocus></div>
					</div>
	 
					<!-- TRACK BUTTON -->
					<input class="btn btn-lg btn-primary btn-block btn-track" name="" id="track" type="submit" value="TRACK YOUR ORDER"></input>
					
				</form>
				<!-- TRACKING FORM END -->
			</div>
 		</div>
    </div>
	
 	<!-- JQUERY CDN -->
 	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 
 	<!-- BOOTSTRAP JS CDN -->
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	
 	<!-- FONT AWESOME -->
 	<script src="https://use.fontawesome.com/a516aa6fdc.js"></script>
	
	<!-- JAVASCRIPT -->
	<script src="js/validate.js"></script>
	
	
</body>
</html>