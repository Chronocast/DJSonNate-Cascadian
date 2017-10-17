<?php

	//Require the autoload file
	require_once('vendor/autoload.php');
	
	session_start();
	$db = new TrackingDB();
	//Create an instance of the Base Class
	$f3 = Base::instance();
	

	//Route to landing page
	$f3->route('GET /', function($f3) {
		/* please ignore
		$trackingID = $_POST['trackingID'];
		$track = $GLOBALS['db']->getTracker('trackingID');

		if($trackingID!= NULL) {
			if(!empty($track)) {
				//show that
				print_r('Tracking id does not exist');
			}
			else{
				//reroute //pass in the array
				print_r('Tracking id exists');
			}
		}
		else {
			print_r('put something in pleaseeeeeeee');
		}
		*/
		echo Template::instance()->render('pages/home.html');
		
	});
	
	/* SONIE's code */
	$f3->route('POST /verify', function($f3) {
		$trackingID = $_POST['trackingID'];
		if(!empty($track)) {
			//show that
			print_r('Tracking id does not exist');
		}
		else{
			//reroute //pass in the array
			print_r('Tracking id exists');
		}
		echo Template::instance()->render('pages/verify.html');
		
	
		
	});
	
	//Route to tracking page
	$f3->route('GET|POST /tracking', function($f3) {
			echo Template::instance()->render('pages/tracking.html');
		}
	);
	
	//Route to admin page
	$f3->route('GET|POST /admin', function($f3) {
			echo Template::instance()->render('pages/admin.html');
		}
	);

	//Route to admin-signup
	$f3->route('GET /admin-signup', function($f3) {
			echo Template::instance()->render('pages/admin-signup.html');
		}
	);
	
	//Route to admin-login
	$f3->route('GET /admin-login', function($f3) {
			echo Template::instance()->render('pages/admin-login.html');
		}
	);
	
	//Run fat-free
	$f3->run();