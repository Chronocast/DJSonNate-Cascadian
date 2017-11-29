<?php

//Require configuration
require_once '/home/cascadian/config.php';

/**
 * Provides CRUD acces to clients db
 *
 * PHP Version 5
 *
 * @author Duck Nguyen
 * @version 1.0
 */

 
 class ClientDB {
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
	 * add a client to db
	 *
	 * @param - project id
	 * @param - client's name
	 * @param - client's email
	 */
	function addClient($track_id, $name, $email)
	{
		$insert = "INSERT INTO clients(track_id, name, email) VALUES (:track_id, :name, :email)";
		
		$statement = $this->_pdo->prepare($insert);
		$statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
		$statement->bindValue(':name', $name, PDO::PARAM_STR);
		$statement->bindValue(':email', $email, PDO::PARAM_STR);
		
		$statement->execute();
	}
	
	/**
	 * get a client's information
	 *
	 * @param - project id
	 * @return a row matching the project ID
	 */
	function getClientInfo($track_id)
	{
		$select = 'SELECT name, email FROM clients WHERE track_id=:track_id';
		
		$statement = $this ->_pdo->prepare($select);
		$statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
		$statement->execute();
		
		//consider adding check if result is empty before return?
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		
		//print_r($result);
		return $result;
	}
	
	/**
	 * get all clients info
	 *
	 * @return all clients
	 */
	function getAllClient()
	{
		$select = 'SELECT * FROM clients';
		
		$statement = $this ->_pdo->prepare($select);
		$statement->execute();
		
		//consider adding check if result is empty before return?
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		//print_r($result);
		return $result;
	}

 }
 
 ?>