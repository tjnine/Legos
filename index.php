<?php 

require_once __DIR__.'/Core/config.php';


?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<?php include __DIR__.'/Views/includes/header.php'; ?>
	<div class="row">

	 <?php
	 	#STATIC CLASS INSTANTIATION EXAMPLE
	  	# App\Models\Core\Config::get('session/session_name'); 
	 ?>
	
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<p>
			<h4>Welcome to echo dash...</h4>
			to use our generators and premium features please sign up for a new account.
		</p>

		<form action="<? echo $_SERVER['REMOTE_ADDR']; ?>" name="signUp">
				<div class="form-group">
				<label for="fname">First Name:</label>
				<input type="text" name="fname" class="form-control">
				</div>

				<div class="form-group">
				<label for="lname">Last Name:</label>
				<input type="text" name="lname" class="form-control">
				</div>

				<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" name="email" class="form-control">
				</div>

				<div class="form-group">
				<label for="password">Password:</label>
				<input type="text" name="password" class="form-control">
				</div>

				<div class="form-group">
					<input type="button" class="btn btn-primary" value="Submit">
				</div>
		</form>
	</div>
</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>