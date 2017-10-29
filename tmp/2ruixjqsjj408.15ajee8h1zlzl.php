<!DOCTYPE html>
<!--
 	Author: Duck Nguyen
 	Date: 10/17/17
 	Filename: admin-login.html
 	Description: login page for admin
 -->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Admin Login | Cascadian Landworks</title>
	
	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- Our Custom CSS -->
	<link rel="stylesheet" type="text/css" href="./css/admin-login.css">
</head>
 
<body>
	
	<div class="container">
        <div class="card card-container">
			
			<div class="row">
				<img class="card-img-top" src="./images/cascadian-landworks.png">
			</div>
			
            <form id="login-form" class="form-signin" action="./admin-validation" method="post" autocomplete="on">
				
                <!-- EMAIL SECTION + ERROR MESSAGE -->
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" autofocus required>
				<div class="alert alert-danger">
					<strong>Error:</strong> <span id="emailError"></span>
				</div>
				
                <!-- PASSWORD SECTION + ERROR MESSAGE -->
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <div class="alert alert-danger">
					<strong>Error:</strong> <span id="passwordError"></span>
				</div>
                
                <!-- REMEMBER ME -->
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" name="rememberMe" value="remember-me"> Remember me
                    </label>
                </div>
               
			   <!-- SIGNIN BUTTON -->
                <input class="btn btn-lg btn-primary btn-block btn-signin" name="action" id="submit" type="submit" value="Sign in">
                </input>
				
				<!--FORGOT YOUR PASSWORD-->
				<div>
					<a href="" class="forgot-password">
						Forgot the password?
					</a>
				</div>
				
				
            </form>
        </div><!-- /card-container -->
    </div>
	
	
	
 	<!-- JQUERY CDN -->
 	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 
 	<!-- BOOTSTRAP JS CDN -->
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	
 	<!-- FONT AWESOME -->
 	<script src="https://use.fontawesome.com/a516aa6fdc.js"></script>
</body>
</html>