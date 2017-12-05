<?php

//Require configuration
require_once '/home/cascadian/config.php';

/**
 * Provides CRUD acces to scheduling db
 *
 * PHP Version 5
 *
 * @author Duck Nguyen
 * @version 1.0
 */

class SchedulingDB {
	private $_pdo;
	
	function __construct()
	{
		 
		 try {
			  //Establish database connection
			  $this->_pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD);
			  
			  //keep the connection open for reuse
			  $this->_pdo->setAttribute( PDO::ATTR_PERSISTENT, true);
			  
			  //Throw an exception whenever a database error occurs
			  $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		 }
		 catch (PDOException $e) {
			  die($e->getMessage());
		 }
	}
	
	/**
	 * get all projects schedule info from db
	 * 
	 * @author: Nate Hascup
	 * @return all schedule details
	 */
	function projectSchedulingDisplay()
	{
		$select = 'SELECT b.track_id, a.schedulingID, a.workType, a.schedule,a.cost, a.contact
                    FROM scheduling a LEFT JOIN track_content b
                    ON a.track_id = b.track_id
                    ORDER BY b.start_date';
		
		$statement = $this ->_pdo->prepare($select);
		$statement->execute();
         
        //map each project to a row of data by date
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
         
        return $rows;
	}
 }
 
 ?>