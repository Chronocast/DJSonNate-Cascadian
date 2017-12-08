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
		 *
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
		
		function delDocument($id)
        {
            $select = "DELETE FROM documents WHERE documentID = :id";
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
        }
    }
?>