<?php

	//Require the autoload file
	require_once('vendor/autoload.php');
	
	//Create an instance of the Base Class
	$f3 = Base::instance();
	

	
	//Default route
	$f3->route('GET /', function() {
			echo '<h1>Hello, world!</h1>';
		}
	);
	
	
	//Run fat-free
	$f3->run();