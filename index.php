<?php

	//Require the autoload file
	require_once('vendor/autoload.php');
	
	session_start();
	
	// Create a database object
	$db = new TrackingDB();
	
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
	
	//Route to admin page
	$f3->route('GET|POST /admin', function($f3) {
			echo Template::instance()->render('pages/admin.html');
		
	});

	//Route to admin-signup
	$f3->route('GET /admin-signup', function($f3) {
			echo Template::instance()->render('pages/admin-signup.html');
		
	});
	
	//Route to admin-signup validation
	$f3->route('GET | POST /new-admin', function($f3) {
		
		$db = $GLOBALS['db'];
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			$error = false;
			$firstName = htmlspecialchars($_POST['firstName']);
			$email = $_POST['email'];
			$password = $_POST['password'];
			$pass = password_hash($password, PASSWORD_DEFAULT);
			$verify = password_hash($_POST['verify'], PASSWORD_DEFAULT);
			
			if( !isset($_POST['firstName']) ){
				$f3->set('SESSION.nameError', 'Please enter your first name');
				$error = true;
			}
			
			if( !isset($_POST['email']) ){
				$f3->set('SESSION.emailError', 'Email is required to create account');
				$error = true;
			} else if( $db->checkEmail($email) ){ 
				$f3->set('SESSION.emailError', 'This email is already taken');
				$error = true;
			}
			
			//Consider specifying password length and special chars or not
			if( !isset($_POST['password']) ){
				$f3->set('SESSION.passwordError', 'Please enter a password');
				$error = true;
			}
			
			if( !isset($_POST['verify']) || $pass != $verify ){
				$f3->set('SESSION.verify', 'Passwords do not match');
				$error = true;
			}
			
			//Routing base on error
			if (!error) {
				$admin = new Admin($firstName, $email, $pass);
				
				/* leave this for now
				$id = $db->addAdmin($admin);
				$f3->set('SESSION.id', $id);
				unset($_POST);
				*/
				
				unset($_POST);
			} else {
				$f3->reroute('/admin-signup');
			}
			echo "SUCCESSS!!!!!!!!! NOW THEY ALWAYS SAY CONGRATULATIOOOOOON";
			unset($_POST);
		}
		
		$f3->reroute('/admin-login');
	});
	
	//Route to admin-login
	$f3->route('GET /admin-login', function($f3) {
			echo Template::instance()->render('pages/admin-login.html');
			
	});
	
	//Run fat-free
	$f3->run();