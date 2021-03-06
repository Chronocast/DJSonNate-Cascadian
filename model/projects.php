<?php
    /**
     * projects.php
     * DB for pulling project data on Admin Page
     * @author Nathan Hascup, Duck Nguyen, Jeremy Manalo, Sonie Moon
     * @author Jeremy Manalo <jmanalo@mail.greenriver.edu>
     * @version 1.0
     */
    
    //CONNECT
    class User
    {
        private $_pdo;
        
        function __construct()
        {
            //Require configuration file
            require_once '/home/cascadian/config/config.php';
            
            try {
                //Establish database connection
                $this->_pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                
                //Keep the connection open for reuse to improve performance
                $this->_pdo->setAttribute( PDO::ATTR_PERSISTENT, true);
                
                //Throw an exception whenever a database error occurs
                $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                die( "Error!: " . $e->getMessage());
            }
        }
        
         /**
         * Returns all active projects.
         *
         * @access public
         * @param 
         *
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
         * return list of inactive projects from db
         *
         * @author duck
         * @return list of inactive projects
         */
        function inactiveProjectDisplay()
        {
            $select = 'SELECT * FROM track_content WHERE project_status = 0 ORDER BY start_date';
            
            $results = $this->_pdo->prepare($select);
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
        
            $results = $this->_pdo->prepare($select);
            //$results->bindValue(':user_ID', $user_ID, PDO::PARAM_INT);
            $results->execute();
             
            $resultsArray = array();
             
            //map each project to a row of data by date
            $rows = $results->fetchAll(PDO::FETCH_ASSOC);
             
            return $rows;
        }
        
        /** Sonie's code **/
        function materialDetails($track_id)
        {
            $select = 'SELECT * FROM material WHERE track_id=:track_id';
            
            $results = $this->_pdo->prepare($select);
            //$results->bindValue(':user_ID', $user_ID, PDO::PARAM_INT);
            $results->execute();
             
            $resultsArray = array();
             
            //map each project to a row of data by date
            $rows = $results->fetchAll(PDO::FETCH_ASSOC);
             
            return $rows;
        }
    }