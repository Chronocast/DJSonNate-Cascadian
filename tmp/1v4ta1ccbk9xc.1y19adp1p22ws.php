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
		<link rel="stylesheet" type="text/css" href="./css/add.css">
    </head>
    
    <body>
        <header>Add a new project</header><br>
        <form action="./add" method="post" id="form">
			
			<!-- TODO: remove the tracking_id input from this form -->
			<input name="tracking_id" id="tracking_id" type="number" placeholder="TrackingId: This will be removed..." /><br><br>
			
			<?php if (isset($errors)): ?>
				
					<span class="error"><?= ($errors['projectNameErr']) ?></span><br/>
					<input name="project_name" id="project_name" type="text" value="<?= ($projectName) ?>" placeholder="Project Name">
						<br><br>
					<span class="error"><?= ($errors['startDateErr']) ?></span><br/>
					<input name="start_date" id="start_date" type="text" value="<?= ($startDate) ?>" placeholder="Start Date"><br><br>
					<span class="error"><?= ($errors['endDateErr']) ?></span><br/>
					<input name="end_date" id="end_date" type="text" value="<?= ($endDate) ?>" placeholder="End Date"><br><br>	
					<span class="error"><?= ($errors['projectDescErr']) ?></span><br/>
					<textarea name="project_description" rows="10" cols="30" placeholder="Disregard women and acquire currency"><?= ($projectDesciption) ?></textarea><br><br>
					<input type="submit" value="Submit">
				
				<?php else: ?>
					<!-- The actual form -->
					<span class="error"></span><br/>
					<h4>PROJECT NAME</h4>
					<input name="project_name" id="project_name" type="text" placeholder="Project Name"><br><br>
					<h4>START DATE</h4>
					<input name="start_date" id="start_date" type="text" placeholder="Start Date"><br><br>
					<h4>END DATE</h4>
					<input name="end_date" id="end_date" type="text" placeholder="End Date"><br><br>
					<h4>PROJECT DESCRIPTION</h4>
					<textarea name="project_description" rows="10" cols="30" placeholder="Disregard women and acquire currency"></textarea><br><br>
					<input type="submit" value="Submit">
				
			<?php endif; ?>
			
            
        </form>
    </body>
 </html>