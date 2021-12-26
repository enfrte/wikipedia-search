
<?php require 'header.php'; ?>

	<h2>Login</h2>
	<form action="login-action.php" method="post">
		<div>
			<p>User: </p>
			<input name="user" type="text">
		</div>
		<div>
			<p>Password: </p>
			<input name="password" type="text">
		</div>
		<div>
			<p>
				<button>Login</button>
			</p>	
		</div>
	</form>

<?php require 'footer.php'; ?>