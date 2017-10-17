<?php

//Require configuration
require_once '/home/smoon/config.php';

/**
 * Provides CRUD acces
 *
 * PHP Version 5
 *
 * @author Duck Nguyen
 * @version 1.0
 *
 * CREATE TABLE `cascadia_tracking`.`admin` ( `adminID` INT NOT NULL AUTO_INCREMENT ,
 * `firstName` VARCHAR(40) NOT NULL , `email` VARCHAR(254) NOT NULL ,
 * `password` VARCHAR(128) NOT NULL , PRIMARY KEY (`adminID`) )
 * ENGINE = MyISAM COMMENT = 'admin table for Cascadian Landworks'' admins';
 *
 * ALTER TABLE `admin` CHANGE `password` `password` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
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
			$statement ->bindValue(':firstName', $firstName->getADFirstName(), PDO::PARAM_STR);
			$statement ->bindValue(':email', $email->geADEmail(), PDO::PARAM_STR);
			$statement ->bindValue(':password', $password->getADPassword(), PDO::PARAM_STR);
			
			$statement->execute();
			
			//Return ID of inserted row
			return $this->_pdo->lastInsertId();
		}
		
		/**
		 * Method to login with existing admin account
		 *
		 * @param admin object to retrieve
		 */
		function login($admin)
		{
			$select = 'SELECT adminID, firstName, password FROM admin WHERE email = :email';
			
			$statement = $this->_pdo->prepare($select);
			$statement ->bindValue(':admin', $admin, PDO::PARAM_INT);
			$statement ->execute();
			
			$creds = $statement->fetch(PDO::FETCH_ASSOC);
			
			return $creds;
		}
		
		/**
		 * Check if an email (username) is found in database
		 *
		 * @param the email to look for
		 *
		 * @return true of false if email is found
		 */
		function emailCheck($emai)
		{
			$select = 'SELECT * FROM admin WHERE email = :email';
			
			$statement = $this->_pdo->prepare($select);
			$statement ->bindValue(':username', $username, PDO::PARAM_INT);
			$statement ->execute();
			
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			
			return $row;
		}
    }
?>