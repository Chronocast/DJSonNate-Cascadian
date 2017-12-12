<?php

//Require configuration
require_once '/home/cascadian/config.php';

/**
 * Provides CRUD acces
 *
 * PHP Version 5
 *
 * @author  Duck Nguyen
 * @version 1.0
 */

class AdminDB
    {
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
		 * Method to add an admin to database
		 *
		 * @param admin object to be added
		 * @return id of the new admin
		 */
		function addAdmin($admin)
		{
			$insert = 'INSERT INTO admin (firstName, email, password)
							VALUES (:firstName, :email, :password)';
		
			$statement = $this->_pdo->prepare($insert);
			$statement ->bindValue(':firstName', $admin->getADFirstName(), PDO::PARAM_STR);
			$statement ->bindValue(':email', $admin->getADEmail(), PDO::PARAM_STR);
			$statement ->bindValue(':password', $admin->getADPassword(), PDO::PARAM_STR);
			
			$statement->execute();
			
			//Return ID of inserted row
			return $this->_pdo->lastInsertId();
		}
		
		/**
		 * Method to login with existing admin account
		 *
		 * @param admin account to retrieve
		 */
		function login($email)
		{
			$select = 'SELECT * FROM admin WHERE email=:email';
			
			$statement = $this->_pdo->prepare($select);
			$statement ->bindValue(':email', $email, PDO::PARAM_STR);
			$statement ->execute();
			
			$creds = $statement->fetch(PDO::FETCH_ASSOC);
			
			return $creds;
		}
		
		/**
		 * Method to upload a new document
		 * @author Caleb 
		 * @param Name of the document
		 * @param Tracking ID
		 */
		function addDocument($name, $trackID, $title)
		{
			$select = "INSERT INTO documents (track_id, documentName, viewStatus, documentLink) VALUES (:track_id, :name, 0, :title)";
			
			$statement = $this->_pdo->prepare($select);
			$statement ->bindValue(':track_id', $trackID, PDO::PARAM_INT);
			$statement ->bindValue(':name', $name, PDO::PARAM_STR);
			$statement ->bindValue(':title', $title, PDO::PARAM_STR);
			$statement ->execute();
			
			//Return ID of inserted row
            return $this->_pdo->lastInsertId();
		}
		
		/**
		 * Method to delete an item
		 * @author Caleb 
		 * @param type - type of the item
		 * @param typeID - id of item
		 * @param id - Tracking ID
		 */
		function delDocument($id, $type, $typeID)
        {
            $select = "DELETE FROM :documents WHERE :typeID = :id";
			
			
			if ($type == 'c') {
				$select = "DELETE FROM construction WHERE constructionID = :id";
			} elseif ($type == 'd') {
				$select = "DELETE FROM documents WHERE documentID = :id";
			} elseif ($type == 's') {
				$select = "DELETE FROM scheduling WHERE schedulingID = :id";
			} else {
				$select = "DELETE FROM punchlist WHERE punchID = :id";
			}
			
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $typeID, PDO::PARAM_INT);
            $statement->execute();
        }
		
		function addConstruction($reportName, $trackID, $photoTitle, $details)
		{
			$select = "INSERT INTO construction (track_id, reportName, photo, details, reportDate) VALUES (:track_id, :reportName, :photoTitle, :details, :date)";
			
			$date = date('Y/m/d');
			
			$statement = $this->_pdo->prepare($select);
			$statement ->bindValue(':track_id', $trackID, PDO::PARAM_INT);
			$statement ->bindValue(':reportName', $reportName, PDO::PARAM_STR);
			$statement ->bindValue(':photoTitle', $photoTitle, PDO::PARAM_STR);
			$statement ->bindValue(':details', $details, PDO::PARAM_STR);
			$statement ->bindValue(':date', $date, PDO::PARAM_STR);

			$statement ->execute();
			
			//Return ID of inserted row
            return $this->_pdo->lastInsertId();
		}
		
		function addScheduling($worktype, $quantity, $notes, $id)
		{
			$select = "INSERT INTO scheduling (track_id, title, quantity, notes) VALUES (:track_id, :title, :quantity, :notes)";
			
			$statement = $this->_pdo->prepare($select);
			$statement ->bindValue(':track_id', $id, PDO::PARAM_INT);
			$statement ->bindValue(':title', $worktype, PDO::PARAM_STR);
			$statement ->bindValue(':quantity', $quantity, PDO::PARAM_STR);
			$statement ->bindValue(':notes', $notes, PDO::PARAM_STR);

			$statement ->execute();
			
			//Return ID of inserted row
            return $this->_pdo->lastInsertId();
		}
		
		function addFinal($item, $id)
		{
			$select = "INSERT INTO punchlist (track_id, name) VALUES (:track_id, :name)";
			
			$statement = $this->_pdo->prepare($select);
			$statement ->bindValue(':track_id', $id, PDO::PARAM_INT);
			$statement ->bindValue(':name', $item, PDO::PARAM_STR);

			$statement ->execute();
			
			//Return ID of inserted row
            return $this->_pdo->lastInsertId();
		}
		
		/**
		 * update project overview
		 *
		 * @author: Duck
		 * @param title - project title
		 * @param startDate - project start Date
		 * @param endDate - project end Date
		 * @param descripiton - project description
		 * @param id - track id to update to
		 */
		function updateOverview($title, $startDate, $endDate, $description, $id)
		{
			$updateOverview = "UPDATE track_content SET project_name = :project_name, start_date = :start_date, end_date = :end_date, project_description = :project_description WHERE track_id = :track_id";
			//$updateClient = "UPDATE clients SET name = :name, email = :email WHERE track_id = :track_id";
			
			$statement = $this->_pdo->prepare($updateOverview);
			$statement ->bindValue(':track_id', $id, PDO::PARAM_INT);
			$statement ->bindValue(':project_name', $title, PDO::PARAM_STR);
			$statement ->bindValue(':project_description', $description, PDO::PARAM_STR);
			$statement ->bindValue(':start_date', $startDate, PDO::PARAM_STR);
			$statement ->bindValue(':end_date', $endDate, PDO::PARAM_STR);
			
			$statement ->execute();
		}
		
		/**
		 * update project overview
		 *
		 * @author: Duck
		 * @param title - project title
		 * @param startDate - project start Date
		 * @param endDate - project end Date
		 * @param descripiton - project description
		 * @param id - track id to update to
		 */
		function updateClient($name, $email, $id)
		{
			$updateClient = "UPDATE clients SET name = :name, email = :email WHERE track_id = :track_id";
			
			$statement = $this->_pdo->prepare($updateClient);
			$statement ->bindValue(':track_id', $id, PDO::PARAM_INT);
			$statement ->bindValue(':name', $name, PDO::PARAM_STR);
			$statement ->bindValue(':email', $email, PDO::PARAM_STR);
			
			$statement ->execute();
		}
		
		/**
		 * update schedulnig item
		 *
		 * @author: Duck
		 * @param title - item type
		 * @param quantity - item quantity
		 * @param notes - item notes
		 * @param id - col id to be updated
		 */
		function updateScheduleItem($title, $quantity, $notes, $id)
		{
			$updateScheduling = "UPDATE scheduling SET title = :title, quantity = :quantity, notes = :notes, viewStatus = 1 WHERE schedulingID = :schedulingID";
			
			$statement = $this->_pdo->prepare($updateScheduling);
			$statement ->bindValue(':schedulingID', $id, PDO::PARAM_INT);
			$statement ->bindValue(':title', $title, PDO::PARAM_STR);
			$statement ->bindValue(':quantity', $quantity, PDO::PARAM_STR);
			$statement ->bindValue(':notes', $notes, PDO::PARAM_STR);
			
			$statement ->execute();
		}
    }
?>