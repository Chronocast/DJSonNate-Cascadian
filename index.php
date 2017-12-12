<?php
	//Require the autoload file
	require_once('vendor/autoload.php');

	session_start();

	// Create a tracking database object
	$db = new TrackingDB();

	// Create a progress status database object
	$statusDB = new ProgressStatusDB();

	// Create a document database object
	$docsDB = new DocumentDB();

	// Create a scheduling database object
	$schedulingDB = new SchedulingDB();

	// Create a construction database object
	$constructionDB = new ConstructionDB();

	// Create a punchlist database object
	$punchListDB = new PunchListDB();
	
	// Create a admin database object
	$adminDB = new AdminDB();
	
	// Create a client database object
	$clientDB = new ClientDB();

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
				$f3->reroute('/tracking-id='.$trackingID);
			}
		}
	});

	// Route to tracking page
	$f3->route('GET /tracking-id=@trackingID', function($f3, $params) {

		// reroute to home if no id was found
		if ( ($params['trackingID'] == NULL) )
		{
			$f3->reroute('/');
		}

		$trackingID = $_SESSION['trackingID'];

		// Sonie's codes
		$projectDetails = $GLOBALS['db']->projectDetails($trackingID);
		$documentDetails = $GLOBALS['docsDB']->documentDetails($trackingID);
		$schedulingDetails = $GLOBALS['db']->schedulingDetails($trackingID);
		$constructionDetails = $GLOBALS['db']->constructionDetails($trackingID);
		$punchListDetails = $GLOBALS['db']->punchListDetails($trackingID);

		$f3->set('projectDetails', $projectDetails);
		$f3->set('documentDetails', $documentDetails);
		$f3->set('schedulingDetails', $schedulingDetails);
		$f3->set('constructionDetails', $constructionDetails);
		$f3->set('punchListDetails', $punchListDetails);
		// end Sonie

		// Duck's codes
		$clientInfo = $GLOBALS['clientDB']->getClientInfo($trackingID);
		$progressStatus = $GLOBALS['statusDB']->getStatus($trackingID);
		$progressBar = $GLOBALS['statusDB']->toProgressBar($progressStatus);

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

		/* Duck codes */
		$scheduleDisplay = $GLOBALS['schedulingDB']->projectSchedulingDisplay();
		$constructionDisplay = $GLOBALS['constructionDB']->projectConstructionDisplay();
		$punchListDisplay = $GLOBALS['punchListDB']->projectPunchListDisplay();

		$f3->set('i', 0); // increment value
		$f3->set('scheduleDisplay', $scheduleDisplay);
		$f3->set('constructionDisplay', $constructionDisplay);
		$f3->set('punchListDisplay', $punchListDisplay);
		/* End Duck */

		echo Template::instance()->render('pages/admin.html');

	});

	// Route to admin-project page
	$f3->route('GET|POST /admin-projects', function($f3) {
		if ($_SESSION['adminID'] == NULL)
		{
			$f3->reroute('/admin-login');
		}
		
		$adminName = $_SESSION['adminName'];
		$inactiveProjectDisplay = $GLOBALS['db']->inactiveProjectDisplay();
	
		$f3->set('adminName', $adminName);
		$f3->set('projectDisplay', $inactiveProjectDisplay);
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

	//Route for admin logout
	/* Jeff Code */
	$f3->route('GET|POST /admin-signout', function($f3)
	{
		$_SESSION = array();
		session_destroy();
		$f3->reroute('/admin-login');
	});

	//Route to admin-login
	$f3->route('GET|POST /admin-login', function($f3) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$email = $_POST['email'];

			// HASH THIS THING PLEASE
			$pass = $_POST['password'];

			$adminDB = $GLOBALS['adminDB'];
			$creds = $adminDB->login($email);

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
		if ($_SESSION['adminID'] == NULL)
		{
			$f3->reroute('/admin-login');
		}
		
		$adminName = $_SESSION['adminName'];
		$f3->set('adminName', $adminName);
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$error = false;
			$errorsArray = [];

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

			// if no errors
			if(!$error)
			{
				$check = FALSE;
				
				while ($check == FALSE)
				{
					// generate a tracking id
					$tracking_id = $GLOBALS['db']->generateTrackID($project_name);
					$result = $GLOBALS['db']->trackingIdCheck($tracking_id);
					
					// check the result
					if (count($result) == 1)
					{   
						$check = TRUE;
						
						$GLOBALS['db']->addProject($tracking_id, $project_name, $start_date, $end_date, $project_description);
						$GLOBALS['clientDB']->addClient($tracking_id, $client_name, $client_email);
						
						$mail = new PHPMailer(true);
						
						//Get email template and repalce content
						$emailBody = file_get_contents('pages/email.html');
						$emailBody = str_replace('%project_name%', $project_name, $emailBody);
						$emailBody = str_replace('%tracking_id%', $tracking_id, $emailBody);
						
						//url needs update
						$url = 'href="http://dnguyen.greenrivertech.net/355/cascadian/tracking-id='.$tracking_id.'"';
						$emailBody = str_replace('%track_url%', $url, $emailBody);
						try {
							$mail->From = "bryan@cascadianlandworks.com";
							$mail->FromName = "Cascadian Landworks";
							
							$mail->addAddress($client_email, $client_name);
							
							//Address to which replient will reply
							//$mail->addReplyTo("hunteo1889@yahoo.com");
						
							//Content
							$mail->isHTML(true);
							$mail->Subject = 'Your order confirmation';
							$mail->MsgHTML($emailBody);
							$mail->AltBody = (strip_tags($emailBody));
							
							//Send email
							$mail->send();
							echo 'Message has been sent';
						} catch (Exception $e) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						}
						
						$f3->reroute('./admin');
					}
				}
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
	//End Jeremy
	
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

	$f3->route('POST /upload', function($f3) {
			$adminDB = $GLOBALS['adminDB'];
			$project_dir = "uploads/" . $_POST['projectID'];
			$upload_dir = $project_dir . "/documents/";
			$fileName = basename($_FILES["fileInput"]["name"]);
			$fileTitle = $_POST['fileTitle'];
			$destination = $upload_dir . $fileName;

			if (!file_exists($project_dir)) {
				mkdir ($project_dir, 0777);
			}

			if (!file_exists($upload_dir)) {
				mkdir ($upload_dir, 0777);
			}

			if (file_exists($destination)) {
				$fileName = "1_" . $fileName;
				$destination = $upload_dir . $fileName;
			}

			move_uploaded_file($_FILES["fileInput"]["tmp_name"], $destination);
			
			$adminDB->addDocument($fileName, $_POST['projectID'], $fileTitle);

			$f3->reroute('/admin');
	});
	
	$f3->route('POST /upload_construction', function($f3) {
			$adminDB = $GLOBALS['adminDB'];
			$project_dir = "uploads/" . $_POST['id'];
			$upload_dir = $project_dir . "/construction/";
			$fileName = basename($_FILES["fileInput"]["name"]);
			$fileTitle = basename($_FILES["fileInput"]["tmp_name"]);
			$destination = $upload_dir . $fileName;
			
			$reportName = $_POST['title'];
			$trackID = $_POST['id'];
			$details = $_POST['description'];

			if (!file_exists($project_dir)) {
				mkdir ($project_dir, 0777);
			}

			if (!file_exists($upload_dir)) {
				mkdir ($upload_dir, 0777);
			}

			if (file_exists($destination)) {
				$fileName = "1_" . $fileName;
				$destination = $upload_dir . $fileName;
			}

			move_uploaded_file($_FILES["fileInput"]["tmp_name"], $destination);
			
			$adminDB->addConstruction($reportName, $trackID, $fileName, $details);

			$f3->reroute('/admin');
	});
	
	$f3->route('POST /upload_scheduling', function($f3) {
			$adminDB = $GLOBALS['adminDB'];
			
			$worktype = $_POST['worktype'];
			$quantity = $_POST['quantity'];
			$notes = $_POST['notes'];
			$id = $_POST['id'];

			$adminDB->addScheduling($worktype, $quantity, $notes, $id);
			
			$f3->reroute('/admin');
	});
	
	$f3->route('POST /upload_final', function($f3) {
			$adminDB = $GLOBALS['adminDB'];
			
			$item = $_POST['item'];
			$status = $_POST['status'];
			$id = $_POST['id'];
			
			$adminDB->addFinal($item, $status, $id);
			
			$f3->reroute('/admin');
	});
	
	$f3->route('POST /delete', function($f3) {
			$adminDB = $GLOBALS['adminDB'];
			$documentID = $_POST['id'];
			$type = $_POST['type'];
			$typeID = $_POST['typeID'];
			
			$adminDB->delDocument($documentID, $type, $typeID);

			$f3->reroute('/admin');
	});
	$f3->route('POST /add-construction-report/upload-photo', function($f3) {
			$adminDB = $GLOBALS['adminDB'];
			$project_dir = "uploads/" . $_POST['projectID'];
			$upload_dir = $project_dir . "/images/";
			$fileName = basename($_FILES["fileInput"]["name"]);
			$destination = $upload_dir . $fileName;

			if (!file_exists($project_dir)) {
				mkdir ($project_dir, 0777);
			}

			if (!file_exists($upload_dir)) {
				mkdir ($upload_dir, 0777);
			}

			if (file_exists($destination)) {
				$fileName .= "_1";
				$destination = $upload_dir . $fileName;
			}

			move_uploaded_file($_FILES["fileInput"]["tmp_name"], $destination);
	});

	$f3->route('GET /add-construction-report/@id', function($f3,$params) {
		$f3->set('track_id',$params['id']);
		echo Template::instance()->render('pages/add-construction-report.html');
	});

	//route for adding construction report
	$f3->route('POST /add-construction-report/add-construction-report', function($f3) {


		$project_dir = "uploads/" . $_POST['tracking_id'];
		$upload_dir = $project_dir . "/images/";
		$fileName = basename($_FILES["fileInput"]["name"]);
		$destination = $upload_dir . $fileName;

		if (!file_exists($project_dir)) {
			mkdir ($project_dir, 0777);
		}

		if (!file_exists($upload_dir)) {
			mkdir ($upload_dir, 0777);
		}

		if (file_exists($destination)) {
			$fileName .= "_1";
			$destination = $upload_dir . $fileName;
		}


		move_uploaded_file($_FILES["fileInput"]["tmp_name"], $destination);

		$constructionDB = new ConstructionDB();

		$trackid = $_POST['tracking_id'];
		$reportName = $_POST['reportName'];
		$details = $_POST['details'];
 		$photoPath = $_POST['photoPath'];
		$viewStatus = '0';

		$results = $constructionDB->insertNewConstructionRecord($trackid,$reportName,$details,$photoPath,$viewStatus);



		if($results > 0){
			include('pages/snippets/successful-entry.html');
		}

		 $f3->reroute('@activeprojects');
	});

	$f3->route('GET @activeprojects: /view-active-projects', function($f3) {
	
	
		$adminName = $_SESSION['adminName'];
		$projectDisplay = $GLOBALS['db']->activeProjectDisplay();
		$docDisplay = $GLOBALS['docsDB']->projectDocumentsDisplay();
	
		$f3->set('adminName', $adminName);
		$f3->set('projectDisplay', $projectDisplay);
		$f3->set('docDisplay', $docDisplay);
	
		echo Template::instance()->render('pages/view-active-projects.html');
	
	});

	//Run fat-free
	$f3->run();
