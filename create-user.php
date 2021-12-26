<?php require 'header.php'; ?>

<h2>Register</h2>
<form action="create-user-action.php" method="post">
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
			<button>Submit</button>
		</p>	
	</div>
</form>

<?php require 'footer.php'; ?>
