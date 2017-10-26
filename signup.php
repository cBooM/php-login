	<?php include_once 'header.php';?>

	<section class="main">
		<div class="container">
			<div class="row align-items-center">
				<div class="col">
					<h2>Sign up</h2>
					<form action="includes/signup_process.php" method="POST" class="form">
						<input type="text" name="first" placeholder="First name:">
						<input type="text" name="last" placeholder="Last name:">
						<input type="email" name="email" placeholder="Email:">
						<input type="text" name="login" placeholder="Username:">
						<input type="password" name="pwd" placeholder="Password:">
						<button type="submit" name="submit">Sign up</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<?php include 'footer.php';?>