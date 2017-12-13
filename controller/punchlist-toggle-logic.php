<?php
/**
 * Logic stuffs for punch list toggler
 *
 * PHP Version 5
 *
 * @author Duck Nguyen
 * @version 1.0
 */
	// retrive the ID and column name from POST array
	$targetID = $_POST['targetID'];
	$targetValue = $_POST['targetValue'];
	
	// connect to DB
	require_once '/home/cascadian/config.php';
	
	$pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

	// update acceptance status in db
	if ($targetValue == 0)
	{
		$updateStatus = 'UPDATE punchlist SET status = 1, viewStatus = 0 WHERE punchID="'.$targetID.'"';

		try
		{
			$statement = $pdo->prepare($updateStatus);
			$statement->bindValue(':punchID', $targetID, PDO::PARAM_INT);
			$statement->execute();
		}
		catch (PDOException $e) {
			handle_sql_errors($updateStatus, $e->getMessage());
		}
		
	}
	// update acceptance status in db
	if ($targetValue == 1)
	{
		$updateStatus = 'UPDATE punchlist SET status = 0, viewStatus = 0 WHERE punchID="'.$targetID.'"';

		try
		{
			$statement = $pdo->prepare($updateStatus);
			$statement->bindValue(':punchID', $targetID, PDO::PARAM_INT);
			$statement->execute();
		}
		catch (PDOException $e) {
			handle_sql_errors($updateStatus, $e->getMessage());
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