<?php

	//Require the autoload file
	require_once('vendor/autoload.php');
	
	//Create an instance of the Base Class
	$f3 = Base::instance();
	

	//Route to landing page
	$f3->route('GET /', function() {
			$view = new View;
			echo $view->render ('pages/home.html');
		}
	);
	
	//Run fat-free
	$f3->run();