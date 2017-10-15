<?php

	//Require the autoload file
	require_once('vendor/autoload.php');
	
	session_start();
	$db = new TrackingDB();
	//Create an instance of the Base Class
	$f3 = Base::instance();
	

	//Route to landing page
	$f3->route('GET /', function() {
			
			//if($_SERVER['REQUEST_METHOD'] == 'POST'){
				
				//$f3->set('trackingID', $trackingID);
				
				//$track = $GLOBALS['db']->getTracker('trackingID');
				//$f3->set('track', $track);
				
				
				
				$view = new View;
			echo Template::instance()->render('pages/home.html');
			
		
			
			});
	$f3->route('POST /verify', function() {
		$trackingID = $_POST['trackingID'];
		if(!empty($track)){
					//show that
					print_r('Tracking id does not exist');
			
				}
				else{
					//reroute //pass in the array
					print_r('Tracking id exists');
				}
 	$view = new View;
			echo Template::instance()->render('pages/verify.html');
			
		
			
			});
	//Route to tracking page
	$f3->route('POST /tracking', function() {
		
		
		
			$view = new View;
			echo Template::instance()->render('pages/tracking.html');
		}
	);
	
	
	
	//Run fat-free
	$f3->run();