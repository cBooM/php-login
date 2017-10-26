	<?php include_once 'header.php';?>

	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2>Home</h2>
					<?php
					if (isset($_SESSION['u_id'])) {
						echo "You are logged in <br>";
						echo "Login: " . $_SESSION['u_login'] . "<br>";
						echo "Email: " . $_SESSION['u_email'];
					}
					?>
				</div>
			</div>
		</div>
	</section>

	<?php include 'footer.php';?>