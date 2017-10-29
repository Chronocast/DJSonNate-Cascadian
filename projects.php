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
            
            $select = 'SELECT * FROM tracking ORDER BY start_date';
            
            $results = $this->_pdo->prepare($select);
            //$results->bindValue(':user_ID', $user_ID, PDO::PARAM_INT);
            $results->execute();
             
            $resultsArray = array();
             
            //map each project to a row of data by date
            $rows = $results->fetchAll(PDO::FETCH_ASSOC);
             
            return $rows;
        }
          

    }