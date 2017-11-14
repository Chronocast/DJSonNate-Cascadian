<!DOCTYPE html>
<html lang="en">
	
<!--
	Author: Duck Nguyen
	Date: 11/12/17
	Filename: admin-slack.html
	Description: slack page for admin
-->
	
	<?php echo $this->render('pages/admin-header.html',NULL,get_defined_vars(),0); ?>
	<link rel="stylesheet" type="text/css" href="./css/admin-slack.css">
</head>
	
	<!-- ADMIN - NAVIGATION -->
	<?php echo $this->render('pages/admin-navbar.html',NULL,get_defined_vars(),0); ?>

	
	<!-- SLACK PAGE START -->
	<div id="slack-div" class="portfolio container-fluid">
		<div class="col-sm-12">
			<a id="external-page" href="https://slack.com/">
				<h1>Slack chat <i class="fa fa-external-link" aria-hidden="true"></i></h1>
			</a>
		</div>
		<!--
			NOTE: IFRAME DOES NOT WORK W SLACK ACTUAL SITE
			SUBSTITUTE: https://www.reddit.com/r/Slack/comments/45o6kq/embed_a_slack_channel_into_a_website/
		-->
		<iframe src="https://chatlio.com/"></iframe>
	</div>
	<!-- SLACK PAGE END -->
	
	<!-- ADMIN FOOTER WITH JS SCRIPTS-->
	<?php echo $this->render('pages/admin-footer.html',NULL,get_defined_vars(),0); ?>
</body>
</html>