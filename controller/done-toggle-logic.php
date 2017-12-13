<?php
/**
 * Logic stuffs for done toggler
 *
 * PHP Version 5
 *
 * @author Duck Nguyen
 * @version 1.0
 */
	// retrive the ID and column name from POST array
	$trackID = $_POST['trackID'];
	$value = $_POST['value'];
	$type = $_POST['type'];
	
	if ($value == 0 || $value == '0')
	{
		$newVal = 1;
	}
	if($value == 1 || $value =='1')
	{
		$newVal = 0;
	}
	
	// connect to DB
	require_once '/home/cascadian/config.php';
	
	$pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

	// update document status in db
	if ($type == 'd')
	{
		$update = 'UPDATE progress_status SET documentsStatus = '.$newVal.' WHERE track_id="'.$trackID.'"';

		try
		{
			$statement = $pdo->prepare($update);
			$statement->bindValue(':track_id', $trackID, PDO::PARAM_INT);
			$statement->execute();
		}
		catch (PDOException $e) {
			handle_sql_errors($update, $e->getMessage());
		}
		
	}
	// update scheduling status in db
	if ($type == 's')
	{
		$update = 'UPDATE progress_status SET schedulingStatus = '.$newVal.' WHERE track_id="'.$trackID.'"';

		try
		{
			$statement = $pdo->prepare($update);
			$statement->bindValue(':track_id', $trackID, PDO::PARAM_INT);
			$statement->execute();
		}
		catch (PDOException $e) {
			handle_sql_errors($update, $e->getMessage());
		}
		
	}
	
	// update construction status in db
	if ($type == 'c')
	{
		$update = 'UPDATE progress_status SET constructionStatus = '.$newVal.' WHERE track_id="'.$trackID.'"';

		try
		{
			$statement = $pdo->prepare($update);
			$statement->bindValue(':track_id', $trackID, PDO::PARAM_INT);
			$statement->execute();
		}
		catch (PDOException $e) {
			handle_sql_errors($update, $e->getMessage());
		}
		
	}
	
	// update punch list status in db
	if ($type == 'f')
	{
		$update = 'UPDATE progress_status SET punchlistStatus = '.$newVal.' WHERE track_id="'.$trackID.'"';

		try
		{
			$statement = $pdo->prepare($update);
			$statement->bindValue(':track_id', $trackID, PDO::PARAM_INT);
			$statement->execute();
		}
		catch (PDOException $e) {
			handle_sql_errors($update, $e->getMessage());
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