<?php session_start();?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">


	<title>Basic HTML5 starting template.</title>

	<meta name="keywords" content="html start template" />
	<meta name="description" content="html start template">
	<meta name="author" content="cboom">


	<!-- Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" >

	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.0/css/hover-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="css/custom.css">

</head>

<body>

	<header>
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="col-1">
					<a href="index.php">Home</a>
				</div>
				<div class="col-md-auto">
					<?php 
					if (isset($_SESSION['u_id'])) {
						echo '<form action="includes/logout.php" method="POST">
						<button type="submit" name="submit">Logout</button>
						</form>';
					} else {
						echo '<form action="includes/login.php" method="POST">
						<input type="text" name="uid" placeholder="Username/Email">
						<input type="password" name="pwd" placeholder="password">
						<button type="Submit" name="submit">Log in</button>
						</form>';
					}
					?>

				</div>
				<div class="col-md-auto">
					<?php 
					if (!isset($_SESSION['u_id'])) {
						echo '<a href="signup.php" class="signup">Sign up</a>';
					} ?>
				</div>
			</div>
		</div>
	</header>