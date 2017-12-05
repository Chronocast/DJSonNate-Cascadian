<?php
/**
 * Logic stuffs
 *
 * PHP Version 5
 *
 * @author Duck Nguyen
 * @version 1.0
 */
	
	// retrive the ID and column name from POST array
	$track_id = $_POST['track_id'];
	$targetName = $_POST['targetName'];
	$columnName = $targetName."Status";
	
	
	// connect to DB
	require_once '/home/cascadian/config.php';
	
	$pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

	// update progress_status & update viewStatus 
	if (checkColumn($columnName) == TRUE && checkTable($targetName) == TRUE)
	{
		$updateProgress = 'UPDATE progress_status SET '.$columnName.' = 0 WHERE track_id=:track_id';
		$updateViewStatus = 'UPDATE '.$targetName.' SET viewStatus = 1 WHERE track_id=:track_id';
		
		try
		{
			$statement = $pdo->prepare($updateProgress);
			$statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
			$statement->execute();
			
			$statement = $pdo->prepare($updateViewStatus);
			$statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
			$statement->execute();
		}
		catch (PDOException $e) {
			handle_sql_errors($updateProgress, $e->getMessage());
		}
	}
	
	//// FIGURE THIS OUT PLEASE
	//if (checkTable($targetName) == TRUE)
	//{
	//	$updateViewStatus = 'UPDATE '.$targetName.' SET viewStatus = 1 WHERE track_id=:track_id';
	//	try{
	//		$statement = $pdo->prepare($updateViewStatus);
	//		$statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
	//		$statement->execute();
	//	}
	//	catch (PDOException $e) {
	//		handle_sql_errors($updateViewStatus, $e->getMessage());
	//	}
	//}
	//


    
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
	
	/**
	 * check if passed in column name is valid
	 *
	 * @param - name of column to be checked
	 * @return - true if valid, false otherwise
	 */
	function checkColumn($columnName) {
		$allowed_columns = array('documentStatus', 'schedulingStatus', 'materialStatus', 'constructionStatus');
		
		if(in_array($columnName, $allowed_columns))
		{
			return true;
		}
		return false;
	}
	
	/**
	 * check if passed in column name is valid
	 *
	 * @param - name of column to be checked
	 * @return - true if valid, false otherwise
	 */
	function checkTable($target) {
		$allowed_tables = array('documents', 'scheduling', 'material', 'construction', 'punch_list');
		
		if(in_array($target, $allowed_tables))
		{
			return true;
		}
		return false;
	}
?>