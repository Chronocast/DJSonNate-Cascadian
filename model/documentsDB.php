<?php

//Require configuration
require_once '/home/cascadian/config.php';

/**
 * Provides CRUD acces
 *
 * PHP Version 5
 *
 * @author Nate Hascup
 * @version 1.0
 */
 
 class DocumentDB
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
        * Returns all documents in all projects (will just be active projects in a later update).
        * @return an associative array of projects and their specific data + document details
        */
        
    function projectDocumentsDisplay()
    {
        
        //$select = 'SELECT * FROM track_content ORDER BY start_date';
        
        $select = 'SELECT b.track_id, a.documentID, a.documentName, a.documentLink
                        FROM documents a LEFT JOIN track_content b
                        ON a.track_id = b.track_id
                        ORDER BY b.start_date';
        
        $results = $this->_pdo->prepare($select);
        //$results->bindValue(':user_ID', $user_ID, PDO::PARAM_INT);
        $results->execute();
         
        $resultsArray = array();
         
        //map each project to a row of data by date
        $rows = $results->fetchAll(PDO::FETCH_ASSOC);
         
        return $rows;
    }
    
            /**
         * returns project details 
         *
         */
        function documentDetails($track_id)
        {
        $select = 'SELECT * FROM documents WHERE track_id=:track_id';

        $statement = $this->_pdo->prepare($select);
        $statement->bindValue(':track_id', $track_id, PDO::PARAM_INT);
        $statement->execute();
         
         
         
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    
        }
}
?>