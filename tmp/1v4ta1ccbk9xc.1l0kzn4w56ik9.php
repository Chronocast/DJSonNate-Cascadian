

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
        <form action="./add" method="post" id="form">
            <!--<input value="" name="email" id="email" type="text" placeholder="Email"><br><br>-->
            <input value="" name="project_name" id="project_name" type="text" placeholder="Project Name"><br><br>
			<input value="" name="start_date" id="start_date" type="text" placeholder="Start Date"><br><br>
			<input value="" name="end_date" id="end_date" type="text" placeholder="End Date"><br><br>			
            <textarea name="message" rows="10" cols="30">Disregard women and acquire currency</textarea><br><br>
			<input id="submit" type="submit" value="Submit">
        </form>
    </body>
 </html>