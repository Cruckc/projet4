
<form method="post" action="">
	<div>
		<label>Votre pseudo</label>
		<input type="text" name="pseudo" required><br />
	</div>
	<div>
		<label>Votre mot de passe</label>
		<input type="password" name="password" required><br />
	</div>
	<div>
		<input type="submit" name="login" value="Se connecter">
	</div>
	<div>
		<p><a href="index.php?page=signup">S'inscrire</a></p>
	</div>
</form>
<?php
if ($error)
{
	echo '<p>L\'utilisateur ou le mot de passe ne correspondent pas!</p>'
?>
<?php
}
?>


