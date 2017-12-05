<?php

//Require configuration
require_once '/home/cascadian/config.php';

/**
 * Provides CRUD acces
 *
 * PHP Version 5
 *
 * @author Sonie Moon, Nate Hascup, Jeremy Manalo, Duck Nguyen 
 * @version 1.0
 */
    
    
class TrackingDB
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
     * This function gets the contents by tracking id.
     * It would return empty array if the no tracking id is found 
     */
    function getTracker($track_id)
    {
        $select = 'SELECT * FROM track_content WHERE track_id=:track_id';

        $statement = $this->_pdo->prepare($select);
        $statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
        $statement->execute();
         
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * returns project details 
     * THIS CODE AND THE ONE ABOVE ARE THE SAME!!!
     */
      function projectDetails($track_id)
      {
      $select = 'SELECT * FROM track_content WHERE track_id=:track_id';
  
      $statement = $this->_pdo->prepare($select);
      $statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
      $statement->execute();
       
      return $statement->fetch(PDO::FETCH_ASSOC);
      }

    /** Sonie's code **/
        function schedulingDetails($track_id)
        {
        $select = 'SELECT * FROM scheduling WHERE track_id=:track_id';

        $statement = $this->_pdo->prepare($select);
        $statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
        $statement->execute();
         
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    /** Sonie's code **/
        function materialDetails($track_id)
        {
        $select = 'SELECT * FROM material WHERE track_id=:track_id';
        
        $statement = $this->_pdo->prepare($select);
        $statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
        $statement->execute();
         
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
              
        function constructionDetails($track_id)
        {
            $select = 'SELECT * FROM construction WHERE track_id=:track_id';
            
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        function punchListDetails($track_id)
        {
            $select = 'SELECT * FROM punchlist WHERE track_id=:track_id';
            
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        
   /*
    *********************************************************************************************************************************************************
    ***         I DON'T WHY IT'S HERE BUT CODES BELOW THIS LINE BELONGS TO ADMIN PAGE - NEED TO REFACTOR / COMMENT / MOVE CODES AROUND LATER              ***
    *********************************************************************************************************************************************************
    */
        
        
    /**
     * @author Nate
     * Returns all active projects.
     * @return an associative array of project and their specific data
     */
    
    function activeProjectDisplay()
    {
        
        $select = 'SELECT * FROM track_content WHERE project_status = 1 ORDER BY start_date';
        
        $results = $this->_pdo->prepare($select);
        //$results->bindValue(':user_ID', $user_ID, PDO::PARAM_INT);
        $results->execute();
         
        $resultsArray = array();
         
        //map each project to a row of data by date
        $rows = $results->fetchAll(PDO::FETCH_ASSOC);
         
        return $rows;
    }
    
    /**
     * @author Nate
     * Returns all inactive projects.
     * @return an associative array of project and their specific data
     */
    function inactiveProjectDisplay()
    {
        
        $select = 'SELECT * FROM track_content WHERE project_status = 0 ORDER BY start_date';
        
        $results = $this->_pdo->prepare($select);
        //$results->bindValue(':user_ID', $user_ID, PDO::PARAM_INT);
        $results->execute();
         
        $resultsArray = array();
         
        //map each project to a row of data by date
        $rows = $results->fetchAll(PDO::FETCH_ASSOC);
         
        return $rows;
    }

    
    /** Jeremy's Code **/
    //TODO: remove $trackingId from this method after we figure out how to
    //automatically generate tracking ids
    function addProject($trackingId, $project_name, $start_date, $end_date, $project_description)
    {
        echo "<br>TrackingId: $trackingId";
        echo "<br>Project Name: $project_name";
        echo "<br>Start: $start_date";
        echo "<br>End: $end_date";
        echo "<br>Description: $project_description";
        
        $insert = 'INSERT INTO track_content (track_id, project_name, start_date, end_date, project_description)
        VALUES (:track_id, :project_name, :start_date, :end_date, :project_description)';
        
        $statement = $this->_pdo->prepare($insert);
        
        $statement->bindValue(':track_id', $trackingId, PDO::PARAM_INT);   
        $statement->bindValue(':project_name', $project_name, PDO::PARAM_STR);            
        $statement->bindValue(':start_date', $start_date, PDO::PARAM_STR);
        $statement->bindValue(':end_date', $end_date, PDO::PARAM_STR);
        $statement->bindValue(':project_description', $project_description, PDO::PARAM_STR);

       
        $statement->execute();
    }

    /** Jeremy's code **/
        function archiveProject($track_id)
        {
            $update = 'UPDATE track_content SET project_status = 0 WHERE track_id=:track_id';
            
            $statement = $this->_pdo->prepare($update);
            $statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
            $statement->execute();
        }
    
    /** Nate's code **/
        function activateProject($track_id)
        {
            $update = 'UPDATE track_content SET project_status = 1 WHERE track_id=:track_id';
            
            $statement = $this->_pdo->prepare($update);
            $statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
            $statement->execute();
        }

}
?>