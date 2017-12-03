<?php

	//Require the autoload file
	require_once('vendor/autoload.php');
	
	session_start();
	
	// Create a tracking database object
	$db = new TrackingDB();
	
	// Create a admin database object
	$adminDB = new AdminDB();
	
	// Create a client database object
	$clientDB = new ClientDB();
	
	// Create a document database object
	$docsDB = new DocumentDB();
	
	// Create a progress status database object
	$statusDB = new ProgressStatusDB();
	
	//Create an instance of the Base Class
	$f3 = Base::instance();
	
	//Set debug level
	$f3->set('DEBUG', 3);

	
	// Route to landing page
	$f3->route('GET /', function($f3) {
		echo Template::instance()->render('pages/home.html');
	});
	
	
	// Route to verify tracking ID
	$f3->route('POST /verify', function($f3) {
		/* SONIE's code */
		$trackingID = $_POST['trackingID'];
		$track = $GLOBALS['db']->getTracker($trackingID);

		if($trackingID!= NULL) {
			if(empty($track)) {
				$f3->reroute('/');
			}
			else{
				//reroute //pass in the array
				$_SESSION['trackingID'] = $trackingID;
				$f3->reroute('/tracking');
			}
		}
	});
	
	// Route to tracking page
	$f3->route('GET|POST /tracking', function($f3) {
		
		// reroute to home if no id was found
		if ($_SESSION['trackingID'] == NULL)
		{
			$f3->reroute('/');
		}
		
		$trackingID = $_SESSION['trackingID'];
		
		// Sonie's codes
		$projectDetails = $GLOBALS['db']->projectDetails($trackingID);
		$schedulingDetails = $GLOBALS['db']->schedulingDetails($trackingID);
		$documentDetails = $GLOBALS['docsDB']->documentDetails($trackingID);
		$materialDetails = $GLOBALS['db']->materialDetails($trackingID);
		
		$f3->set('projectDetails', $projectDetails);
		$f3->set('documentDetails', $documentDetails);
		$f3->set('schedulingDetails', $schedulingDetails);
		$f3->set('materialDetails', $materialDetails);
		// end Sonie
		
		// Duck's codes
		$clientInfo = $GLOBALS['clientDB']->getClientInfo($trackingID);
		$progressStatus = $GLOBALS['statusDB']->getStatus($trackingID);
		$progressBar = $GLOBALS['statusDB']->toProgressBar($progressStatus);
		
		//print_r($progressStatus);
		$f3->set('clientInfo', $clientInfo);
		$f3->set('trackingID', $trackingID);
		$f3->set('progressStatus', $progressStatus);
		$f3->set('progressBar', $progressBar);
		//end Duck
		
		echo Template::instance()->render('pages/tracking.html');
		
	});
	
	/* Nate's Code */
	// Route to admin page
	$f3->route('GET|POST /admin', function($f3) {
		if ($_SESSION['adminID'] == NULL)
		{
			$f3->reroute('/admin-login');	
		}
		
		$adminName = $_SESSION['adminName'];
		$projectDisplay = $GLOBALS['db']->activeProjectDisplay();
		$docDisplay = $GLOBALS['docsDB']->projectDocumentsDisplay();
		
		$f3->set('adminName', $adminName);
		$f3->set('projectDisplay', $projectDisplay);
		$f3->set('docDisplay', $docDisplay);
		
		echo Template::instance()->render('pages/admin.html');
		
	});
	
	// Route to tabbed admin page
	$f3->route('GET|POST /admin-tabs', function($f3) {
		
		$projectDisplay = $GLOBALS['db']->activeProjectDisplay();
		$docDisplay = $GLOBALS['docsDB']->projectDocumentsDisplay();
		
		
		$f3->set('projectDisplay', $projectDisplay);
		$f3->set('docDisplay', $docDisplay);
		
		echo Template::instance()->render('pages/admin-tabs.html');
		
	});
	
	// Route to admin-project page
	$f3->route('GET|POST /admin-projects', function($f3) {
		
		$projectDisplay = $GLOBALS['db']->inactiveProjectDisplay();
		$clientsInfo = $GLOBALS['clientDB']->getAllClient();
		
		$f3->set('projectDisplay', $projectDisplay);
		$f3->set('clientsInfo', $clientsInfo);
		echo Template::instance()->render('pages/admin-projects.html');
		
	});
	/* End Nate's Code */
	
	
	// Route to admin-signup
	$f3->route('GET /admin-signup', function($f3) {
			echo Template::instance()->render('pages/admin-signup.html');
		
	});
	
	// Route to admin-signup validation
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
	$f3->route('GET|POST /admin-login', function($f3) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$email = $_POST['email'];
			
			// HASH THIS THING PLEASE
			$pass = $_POST['password'];
			
			$adminDB = $GLOBALS['adminDB'];
			$creds = $adminDB->login($email);
			
			//if( !($creds['email'] == $email) )
			//{
			//	$f3->set('SESSION.emailError', "testing 1");
			//}
			//else if( !($creds['password'] == $pass) )
			//{
			//	$f3->set('SESSION.passwordError', "testing2");
			//}
			//else
			if ( $creds['password'] == $pass ) 
			{
				$f3->set('SESSION.adminID',$id);
				$f3->set('SESSION.adminName', $name);
				$_SESSION['adminID'] = $creds['adminID'];
				$_SESSION['adminName'] = $creds['firstName'];
				unset($_POST);
			}
			
		}
		
		if ($_SESSION['adminID'] != NULL && $_SESSION['adminName'] != NULL)
		{
			$f3->reroute('/admin');
		}
		echo Template::instance()->render('pages/admin-login.php');
			
	});
	
	/* Jeremy's Code */
	//Route to add-a-project page
	$f3->route('GET|POST /admin-add', function($f3)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{		
			$error = false;
			$errorsArray = [];
			
			// TODO: REMOVE THE NEXT LINE
			$trackingId = $_POST['tracking_id'];
			
			if(!empty($_POST['project_name']))
			{
				$project_name = $_POST['project_name'];
			}
			else
			{
				$error = true;
				$errorsArray["projectNameErr"] = "Project Name cannot be empty!";
			}
			
			/* added by duck */
			if(!empty($_POST['client_name']))
			{
				$client_name = $_POST['client_name'];
			}
			else
			{
				$error = true;
				$errorsArray["clientNameErr"] = "Name cannot be empty!";
			}
			if(!empty($_POST['client_email']) && filter_var($_POST['client_email'], FILTER_VALIDATE_EMAIL))
			{
				$client_email = $_POST['client_email'];
			}
			else
			{
				$error = true;
				$errorsArray["clientEmailErr"] = "Invalid email address!";
			}
			/*quack*/
			
			if(!empty($_POST['start_date']))
			{
				$start_date = $_POST['start_date'];
			}
			else
			{
				$error = true;
				$errorsArray["startDateErr"] = "Start date cannot be empty!";
			}
			
			if(!empty($_POST['end_date']))
			{
				$end_date = $_POST['end_date'];
			}
			else
			{
				$error = true;
				$errorsArray["endDateErr"] = "End date cannot be empty!";
			}
			
			if(!empty($_POST['project_description']))
			{
				$project_description = $_POST['project_description'];
			}
			else
			{
				$error = true;
				$errorsArray["projectDescErr"] = "Project description cannot be empty!";
			}
			
			$verify = $_POST['verify'];
			
			//TODO:  Refactor to remove $trackingId
			if(!$error && !empty($_POST['tracking_id']))
			{
				$GLOBALS['db']->addProject($trackingId, $project_name, $start_date, $end_date, $project_description);
				$GLOBALS['clientDB']->addClient($trackingId, $client_name, $client_email); 
				$f3->reroute('http://cascadianlandworks.greenrivertech.net/admin');
			}
			else
			{
				$f3->set("errors", $errorsArray);
				$f3->set("projectName", $_POST['project_name']);
				$f3->set("startDate", $_POST['start_date']);
				$f3->set("endDate", $_POST['end']);
				$f3->set("projectDescription", $_POST['project_description']);
				
				echo Template::instance()->render('pages/admin-add.html');
			}
		}
		else
		{
			echo Template::instance()->render('pages/admin-add.html');
		}
	});
	
	// archive
	$f3->route('GET /archive=@id', function($f3, $params)
	{
		$trackingID = $params['id'];
		$track = $GLOBALS['db']->archiveProject($trackingID);

		//print_r($trackingID);
		
		$f3->reroute('/admin');
		
	});
	
	// activate
	$f3->route('GET /activate=@id', function($f3, $params)
	{
		$trackingID = $params['id'];
		$track = $GLOBALS['db']->activateProject($trackingID);

		//print_r($trackingID);
		
		$f3->reroute('/admin');
		
	});
	
	//Route to admin-login validation
	$f3->route('POST /admin-validation', function($f3) {

	});
	
	
	//Route to admin-slack
	$f3->route('GET /admin-slack', function($f3) {
		echo Template::instance()->render('pages/admin-slack.html');
			
	});
	//Run fat-free
	$f3->run();