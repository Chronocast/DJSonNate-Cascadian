<?php

//Require configuration
require_once '/home/cascadian/config.php';

/**
 * Provides CRUD acces to construction db
 *
 * PHP Version 5
 *
 * @author Duck Nguyen
 * @version 1.0
 */

class ConstructionDB {
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
	 * get all projects material info from db
	 *
	 * @author: Nate Hascup
	 * @return all material details
	 */
	function projectConstructionDisplay()
	{
		$select = 'SELECT b.track_id, a.constructionID, a.reportName, a.reportDate,a.photo, a.details
                    FROM construction a LEFT JOIN track_content b
                    ON a.track_id = b.track_id
                    ORDER BY b.start_date';

		$statement = $this ->_pdo->prepare($select);
		$statement->execute();

        //map each project to a row of data by date
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
	}

	# Add a new construction record
	public function insertNewConstructionRecord($trackid, $reportName, $details, $photoPath, $viewStatus)
	{
		$date = date('Y-m-d');
		$insert = "INSERT INTO `construction` (track_id, reportName, reportDate, photo, details, viewStatus)" .
					"VALUES (:trackid, :reportName, :postDate, :photoPath, :details, :viewStatus) ";

		$statement = $this->_pdo->prepare($insert);

		$statement->bindParam(':trackid', $trackid , PDO::PARAM_STR);
		$statement->bindParam(':reportName', $reportName, PDO::PARAM_STR);
		$statement->bindParam(':postDate', $date, PDO::PARAM_STR);
		$statement->bindParam(':photoPath', $photoPath, PDO::PARAM_STR);
		$statement->bindParam(':details', $details, PDO::PARAM_STR);
		$statement->bindParam(':viewStatus', $viewStatus , PDO::PARAM_STR);

		try {
			$statement->execute();
		} catch (PDOException $e) {
				die ("(!) There was an error adding a new construction record for track id :  " . $trackid . " to the database... " . $e);
		}
		return $this->_pdo->lastInsertId();
	}


}


 ?>
