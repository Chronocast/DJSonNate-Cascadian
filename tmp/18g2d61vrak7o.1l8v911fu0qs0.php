<!DOCTYPE html>
<!--
    Author: Jeremy Manalo
 	Date: 11/5/17
 	Filename: add.html
 	Description: Form to add a new project for Cascadian Landworks tracking system.
-->
<html>
	
	<?php echo $this->render('pages/admin-header.html',NULL,get_defined_vars(),0); ?>
	<title>Admin | New Project</title>
	<link rel="stylesheet" type="text/css" href="./css/admin-add.css">
</head>	
	
	<!-- ADMIN - NAVIGATION -->
	<?php echo $this->render('pages/admin-navbar.html',NULL,get_defined_vars(),0); ?>
    
    <body>
		<!-- PROJECT START -->
		<div id="" class="portfolio container-fluid">
			
			<!-- Portfolio container -->
			<div id="form-div" class="portfolio">
				<div class="col-sm-12 text-center">
					<h1>Add New Project</h1>
				</div>
				<!-- FORM BEGIN -->
				<form action="./admin-add" method="post" id="form">
					<!-- TODO: remove the tracking_id input from this form -->
					<input name="tracking_id" id="tracking_id" type="number" class="form-control" placeholder="TrackingId: This will be removed..." /><br><br>
					
					<?php if (isset($errors)): ?>
						
						
							<!-- JEREMY OG CODES 
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
							-->
							
							<!-- project name -->
							<div class="form-group">
								<label class="col-form-label" for="project_name">Project title</label>
								<input name="project_name" id="project_name" class="form-control" type="text" placeholder="Project name">
								<span class="error"><?= ($errors['projectNameErr']) ?></span><br/>
							</div>
							
							<!-- project start date -->
							<div class="form-group">
								<label class="col-form-label" for="start_date">Start date</label>
								<input name="start_date" id="start_date" class="form-control" type="text" placeholder="2017-11-01">
								<span class="error"><?= ($errors['startDateErr']) ?></span><br/>
							</div>
							
							<!-- project end date -->
							<div class="form-group">
								<label class="col-form-label" for="end_date">End date</label>
								<input name="end_date" id="end_date" class="form-control" type="text" placeholder="2018-01-11">
								<span class="error"><?= ($errors['endDateErr']) ?></span><br/>
							</div>
							
							<!-- SAMPLE TEST DATE INPUT TYPE - DOES NOT DO ANYTHING-->
							<div class="form-group">
								<label class="col-form-label" for="start_date">Sample date</label>
								<input class="form-control" type="date">
							</div>
							
							<!-- project description -->
							<div class="form-group">
								<label class="col-form-label" for="project_description">Description</label>
								<textarea name="project_description" rows="7" cols="30" class="form-control" placeholder="Description about project"></textarea>
								<span class="error"><?= ($errors['projectDescErr']) ?></span><br/>
							</div>
							
							<!-- submit button -->
							<div class="form-group">
								<input type="submit" value="Submit" class="btn btn-primary btn-submit">
							</div>
						
						<?php else: ?>
							<!-- The actual form 
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
							-->
							<span class="error"></span><br/>
							<!-- project name -->
							<div class="form-group">
								<label class="col-form-label" for="project_name">Project title</label>
								<input name="project_name" id="project_name" class="form-control" type="text" placeholder="Project name">
							</div>
							
							<!-- project start date -->
							<div class="form-group">
								<label class="col-form-label" for="start_date">Start date</label>
								<input name="start_date" id="start_date" class="form-control" type="text" placeholder="2017-11-01">
							</div>
							
							<!-- project end date -->
							<div class="form-group">
								<label class="col-form-label" for="end_date">End date</label>
								<input name="end_date" id="end_date" class="form-control" type="text" placeholder="2018-01-11">
							</div>
							
							<!-- SAMPLE TEST DATE INPUT TYPE - DOES NOT DO ANYTHING-->
							<div class="form-group">
								<label class="col-form-label" for="start_date">Sample date</label>
								<input class="form-control" type="date">
							</div>
							
							<!-- project description -->
							<div class="form-group">
								<label class="col-form-label" for="project_description">Description</label>
								<textarea name="project_description" rows="7" cols="30" class="form-control" placeholder="Description about project"></textarea>
							</div>
							
							<!-- submit button -->
							<div class="form-group">
								<input type="submit" value="Submit" class="btn btn-primary btn-submit">
							</div>
							
						
					<?php endif; ?>            
				</form>
				<!-- FORM END -->
				
			</div>
		<!-- PROJECT END -->
		</div>
		
	<!-- ADMIN FOOTER WITH JS SCRIPTS-->
	<?php echo $this->render('pages/admin-footer.html',NULL,get_defined_vars(),0); ?>
    </body>
 </html>