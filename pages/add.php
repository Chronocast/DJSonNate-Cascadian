<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $project_name = $_POST['project_name'];
        $track_id = $_POST['track_id'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $notes = $_POST['notes'];
    
        $errors = array();
        
        if ($project_name)
        {
            } 
            else {
                $errors[] = 'Project Name Required';
                }
                
        if ($track_id)
        {		
            } 
            else {
                $errors[] = 'Tracking ID Required';
                }
                
        if ($start_date)
        {		
            } 
            else {
                $errors[] = 'Start Date Required';
                }
                
        if ($end_date)
        {		
            }
            else {
                $errors[] = 'End Date Required';
            }
            
        if ($notes)
        {		
            }
            
        if (sizeof($errors) > 0)
        {
            foreach ($errors as $error)
            {
                echo "$error <br>";
            }
        }
        
        
        require('trackingdb.php');
    
        // 1. Create a connection and check to see if it was created successfully.
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
        if (mysqli_connect_errno()) 
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
    
        // 2. Set the encoding,
        //    and make all your VARCHAR data safe from SQL injection by escaping the data
        mysqli_set_charset($dbc, 'utf8');
    
        $name = mysqli_real_escape_string($dbc, $name);
        $company = mysqli_real_escape_string($dbc, $company);
        $job_title = mysqli_real_escape_string($dbc, $job_title);
        $email = mysqli_real_escape_string($dbc, $email);
        $phone_number = mysqli_real_escape_string($dbc, $phone_number);
        $date_met = mysqli_real_escape_string($dbc, $date_met);
        $where_we_met = mysqli_real_escape_string($dbc, $where_we_met); 
        $notes = mysqli_real_escape_string($dbc, $notes);
        
        // 3. Construct and run your query
        $query = "INSERT INTO contacts "
            . "(`name`, `company`, `job_title`, `email`, `phone_number`, `date_met`, `where_we_met`, `notes`)"
            . "VALUES "
            . "('$name', '$company', '$job_title', '$email', '$phone_number', '$date_met', '$where_we_met', '$notes')";
    
        if(!empty($name))
        {
            if(!empty($email))
            {
                mysqli_query($dbc, $query);
                echo "Contact added succesfully. <br/><br/>";
                echo "Redirecting you back to the contacts page.";
                echo "<meta http-equiv='refresh' content='3;url=http://jmanalo.greenrivertech.net/Contacts/contacts.php' />";
            }
            else
            {
                //do nothing
                }
        }
        else
        {
            echo "Contact was <strong>NOT</strong> Inserted...<br/><br/>";
            echo "Please make sure that you entered the required fields (Name & Email).";
        }
        
        mysqli_close($dbc);
    }	  
?>

<!DOCTYPE html>
<!--
    Author: Nate Hascup, Duck Nguyen, Jeremy Manalo, Sonie Moon
 	Date: 11/5/17
 	Filename: add.html
 	Description: Form to add a new project for Cascadian Landworks tracking system.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Add Project | Cascadian Landworks</title>
        
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    
    <body>
        <header>Add a new project</header><br>
        <form action="add.php" method="post" id="form">
            <input value="<?php if(isset($_POST['project_name'])) echo $_POST['project_name']; ?>" name="project_name" id="project_name" type="text" placeholder="Project Name"><br><br>
			<input value="<?php if(isset($_POST['track_id'])) echo $_POST['track_id']; ?>" name="track_id" id="track_id" type="text" placeholder="Tracking ID"><br><br>
			<input value="<?php if(isset($_POST['start_date'])) echo $_POST['start_date']; ?>" name="start_date" id="start_date" type="text" placeholder="Start Date"><br><br>
			<input value="<?php if(isset($_POST['end_date'])) echo $_POST['end_date']; ?>" name="end_date" id="end_date" type="text" placeholder="End Date"><br><br>			
            <textarea name="message" rows="10" cols="30">Disregard women and acquire currency</textarea><br><br>
			<input id="submit" type="submit" value="Submit">
        </form>
    </body>
 </html>