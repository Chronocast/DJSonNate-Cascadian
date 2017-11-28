
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
	// print_r($columnName . " id: " . $track_id);
	
	// connect to DB
	require_once '/home/cascadian/config.php';
	$pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	
	if (checkColumn($columnName) == TRUE)
	{
		// query
		$update = 'UPDATE progress_status SET '.$columnName.' = 1 WHERE track_id=:track_id';
			
		$statement = $pdo->prepare($update);
		$statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
		$statement->execute();
	}
	else
	{
		//do nothing
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
?>