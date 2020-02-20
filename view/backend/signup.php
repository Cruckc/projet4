<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post" action="">
		<div>
			<label>Login</label>
			<input type="text" name="pseudo" required>
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="password" required>
		</div>
		<div>
			<label>Confirmation Password</label>
			<input type="password" name="confirmation_password" required>
		</div>
		<div>
			<label>Votre Email</label>
			<input type="email" name="email" required>
		</div>
		<div>
			<input type="submit" name="signup" value="S'inscrire">
		</div>
		<div>
			<p>Déjà inscrit ? Veuillez vous <a href="index.php?page=login">connecter</a>.</p>
		</div>
	</form>
<?php
if ($error)
{
	echo '<p>Le formulaire n\'a pas été correctement renseigné, veuillez rééessayer !</p>'
?>
<?php
}
?>

</body>
</html>