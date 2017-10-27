<?php

	//Require the autoload file
	require_once('vendor/autoload.php');
	
	session_start();
	
	// Create a tracking database object
	$db = new TrackingDB();
	
	// Create a admin database object
	$adminDB = new AdminDB();
	
	//Create an instance of the Base Class
	$f3 = Base::instance();
	
	//Set debug level
	$f3->set('DEBUG', 3);

	
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
		
	});
	
	
	/* Nate's Code */
	//Route to admin page
	$f3->route('GET|POST /admin', function($f3) {
		
		$projectDisplay = $GLOBALS['db']->activeProjectDisplay();
		
		$f3->set('projectDisplay', $projectDisplay);
		
		echo Template::instance()->render('pages/admin.html');
		
	});
	/* End Nate's Code */
	
	
	//Route to admin-signup
	$f3->route('GET /admin-signup', function($f3) {
			echo Template::instance()->render('pages/admin-signup.html');
		
	});
	
	//Route to admin-signup validation
	$f3->route('POST /new-admin', function($f3) {
		$adminDB = $GLOBALS['adminDB'];
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			$error = false;
			$firstName = htmlspecialchars($_POST['firstName']);
			$email = $_POST['email'];
			$password = $_POST['password'];
			/*
			$pass = password_hash($password, PASSWORD_DEFAULT);
			$verify = password_hash($_POST['verify'], PASSWORD_DEFAULT);
			*/
			$verify = $_POST['verify'];
			if( !isset($_POST['firstName']) ){
				$f3->set('SESSION.nameError', 'Please enter your first name');
				$error = true;
			}
			
			if( !isset($_POST['email']) ){
				$f3->set('SESSION.emailError', 'Email is required to create account');
				$error = true;
			} else if( $adminDB->emailCheck($email) ){ 
				$f3->set('SESSION.emailError', 'This email is already taken');
				$error = true;
			}
			
			//Consider specifying password length and special chars or not
			if( !isset($_POST['password']) ){
				$f3->set('SESSION.passwordError', 'Please enter a password');
				$error = true;
			}
			
			if( !isset($_POST['verify']) || $password != $verify ){
				$f3->set('SESSION.verify', 'Passwords do not match');
				$error = true;
			}
			print_r($_SESSION);
			//Routing base on error
			if (error) {
				$admin = new Admin($firstName, $email, $password);
				
				$adminDB->addAdmin($admin);
				$f3->set('SESSION.firstName', $firstName);
				
				unset($_POST);
				$f3->reroute('/admin-login');
			}
		}
		
		$f3->reroute('/admin-signup');
	});
	
	//Route to admin-login
	$f3->route('GET /admin-login', function($f3) {
		echo Template::instance()->render('pages/admin-login.html');
			
	});
	
	//Route to admin-login validation
	$f3->route('POST /admin-validation', function($f3) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$email = $_POST['email'];
			
			// Hash it for proper check
			$pass = $_POST['password'];
			
			$adminDB = $GLOBALS['adminDB'];
			
			$creds = $adminDB->login($email);
			
			if( !($creds['password'] == $pass) ) {
				print_r($_SESSION);
				$f3->set('SESSION.passwordError', 'Password incorrect');
				$f3->reroute('/admin-login');
			}
			else {
				$_SESSIION['firstName'] = $creds['firstName'];
				$f3->reroute('/admin');
				unset($_POST);
			}
		}
	});
	
	//Run fat-free
	$f3->run();