<!DOCTYPE html>
<!--
    Author: Jeremy Manalo
 	Date: 11/5/17
 	Filename: add.html
 	Description: Form to add a new project for Cascadian Landworks tracking system.
-->
<html>
	<?php echo $this->render('pages/admin-header.html',NULL,get_defined_vars(),0); ?>	
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Add Project | Cascadian Landworks</title>
        
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/admin-add.css">
			
	<!-- ADMIN - NAVIGATION -->
	<?php echo $this->render('pages/admin-navbar.html',NULL,get_defined_vars(),0); ?>
	
	<!-- ADMIN FOOTER WITH JS SCRIPTS-->
	<?php echo $this->render('pages/admin-footer.html',NULL,get_defined_vars(),0); ?>
    </head>
    
    <body>
        <h1>Add a new project</h1><br>
        <form action="./admin-add" method="post" id="form">
			
			<!-- TODO: remove the tracking_id input from this form -->
			<input name="tracking_id" id="tracking_id" type="number" placeholder="TrackingId: This will be removed..." /><br><br>
			
			<?php if (isset($errors)): ?>
				
					<span class="error"><?= ($errors['projectNameErr']) ?></span><br/>
					<input name="project_name" id="project_name" type="text" value="<?= ($projectName) ?>" placeholder="Example Name">
						<br><br>
					<span class="error"><?= ($errors['startDateErr']) ?></span><br/>
					<input name="start_date" id="start_date" type="text" value="<?= ($startDate) ?>" placeholder="2017-11-01"><br><br>
					<span class="error"><?= ($errors['endDateErr']) ?></span><br/>
					<input name="end_date" id="end_date" type="text" value="<?= ($endDate) ?>" placeholder="2018-01-11"><br><br>	
					<span class="error"><?= ($errors['projectDescErr']) ?></span><br/>
					<textarea name="project_description" rows="10" cols="30" placeholder="Description about project"><?= ($projectDesciption) ?></textarea><br><br>
					<input type="submit" value="Submit">
				
				<?php else: ?>
					<!-- The actual form -->
					<span class="error"></span><br/>
					<h4>PROJECT NAME</h4>
					<input name="project_name" id="project_name" type="text" placeholder="Example Name"><br><br>
					<h4>START DATE</h4>
					<input name="start_date" id="start_date" type="text" placeholder="2017-11-01"><br><br>
					<h4>END DATE</h4>
					<input name="end_date" id="end_date" type="text" placeholder="2018-01-11"><br><br>
					<h4>PROJECT DESCRIPTION</h4>
					<textarea name="project_description" rows="10" cols="30" placeholder="Description about project"></textarea><br><br>
					<input type="submit" value="Submit">
				
			<?php endif; ?>            
        </form>
    </body>
 </html>