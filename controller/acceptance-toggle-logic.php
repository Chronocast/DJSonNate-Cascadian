<?php
/**
 * Logic stuffs for acceptance toggler
 *
 * PHP Version 5
 *
 * @author Duck Nguyen
 * @version 1.0
 */
	// retrive the ID and column name from POST array
	$track_id = $_POST['track_id'];
	$checkStatus = $_POST['checkStatus'];
	
	// connect to DB
	require_once '/home/cascadian/config.php';
	
	$pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

	// update acceptance status in db
	if ($checkStatus == TRUE)
	{
		$updateAcceptance = 'UPDATE track_content SET acceptance = 1 WHERE track_id="'.$track_id.'"';

		try
		{
			$statement = $pdo->prepare($updateAcceptance);
			$statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
			$statement->execute();
		}
		catch (PDOException $e) {
			handle_sql_errors($updateAcceptance, $e->getMessage());
		}
		
	}
	// update acceptance status in db
	if ($checkStatus === FALSE || $checkStatus == 'false')
	{
		$updateAcceptance = 'UPDATE track_content SET acceptance = 0 WHERE track_id="'.$track_id.'"';

		try
		{
			$statement = $pdo->prepare($updateAcceptance);
			$statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
			$statement->execute();
		}
		catch (PDOException $e) {
			handle_sql_errors($updateAcceptance, $e->getMessage());
		}
	}
	
	/**
	 * handle the sql errors and display them
	 *
	 * @param - the query statement
	 * @param - error message to display
	 */
	function handle_sql_errors($query, $error_message)
	{
		echo '<pre>';
		echo $query;
		echo '</pre>';
		echo $error_message;
		die;
	}
?>