
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
	
	print_r($columnName . " id: " . $track_id);
	
	// connect to DB
	require_once '/home/cascadian/config.php';
	$pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	if (checkColumn($columnName) == TRUE)
	{
		
		$update = 'UPDATE progress_status SET '.$columnName.' = 0 WHERE track_id=:track_id';
		echo 'im in side the if - query: ' . $update;
		try{
			$statement = $pdo->prepare($update);
			$statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
			$statement->execute();
		}
		catch (PDOException $e) {
			handle_sql_errors($update, $e->getMessage());
		}
	}
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
		echo "false motha fucka";
		return false;
	}
?>