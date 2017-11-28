<?php

//Require configuration
require_once '/home/cascadian/config.php';

/**
 * Provides CRUD acces to progress db
 *
 * PHP Version 5
 *
 * @author Duck Nguyen
 * @version 1.0
 */

 
 /*
SELECT documents.progress, scheduling.progress FROM documents, scheduling WHERE documents.track_id AND scheduling.track_id = "1234567890"

CREATE TABLE `cascadia_tracking`.`progress_status` ( `documentStatus` TINYINT NOT NULL DEFAULT '0' COMMENT '0 - not done, 1 - done, 2 - updated' ,
`schedulingStatus` TINYINT NOT NULL DEFAULT '0' , `materialStatus` TINYINT NOT NULL DEFAULT '0' , `constructionStatus` TINYINT NOT NULL DEFAULT '0' )
ENGINE = MyISAM;

ALTER TABLE progress_status ADD FOREIGN KEY (track_id) REFERENCES track_content(track_id)

INSERT INTO `cascadia_tracking`.`progress_status` (`track_id`, `documentStatus`, `schedulingStatus`, `materialStatus`, `constructionStatus`)
VALUES ('1234567890', '0', '1', '1', '2');
 */
 
 class ProgressStatusDB {
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
	 * get a project progress status
	 *
	 * @param - project id
	 * @return a row matching the project ID
	 */
	function getStatus($track_id)
	{
		$select = 'SELECT documentStatus, schedulingStatus, materialStatus, constructionStatus FROM progress_status WHERE track_id=:track_id';
		
		$statement = $this ->_pdo->prepare($select);
		$statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
		$statement->execute();
		
		//consider adding check if result is empty before return?
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		
		//print_r($result);
		return $result;
	}
	
	/**
	 * translate the query result to HTML class name
	 *
	 * @param - result array from query
	 * @return an String array containing class names in display order for progress bar
	 */
	function toProgressBar($result) {
		$progressClass = array();
		
		foreach ($result as $key => $value)
		{
			if($value == 0 || $value == 2)
			{
				array_push($progressClass, "progress-bar-warning");
			}
			else
			{
				array_push($progressClass, "progress-bar-success");
			}
		}
		
		//print_r($progressClass);
		return $progressClass;
	}
	
	/**
	 * update status of a column 
	 *
	 * @param - tracking ID of a project
	 * @param - name of column associated with ID to be updated
	 */
	function updateStatus($track_id, $columnName)
	{
		$update = 'UPDATE progress_status SET :columnName = 1 WHERE track_id=:track_id';
		
		$statement = $this->_pdo->prepare($update);
		$statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
		
		$statement->execute();
	}
 }
 
 ?>