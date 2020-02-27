<section class="section_container">
	<form class="form_container admin login" method="post" action="">
		<h5>Connexion au panneau d'administration</h5>
		<?php if ($error) : ?>
		<p class="text_error">L'utilisateur ou le mot de passe ne correspondent pas !</p>
		<?php endif; ?>
		<div class="form_group">
			<label class="pseudo_label">Login / Pseudo</label>
			<input class="pseudo_input" type="text" name="pseudo" required><br />
		</div>
		<div class="form_group">
			<label class="password_label">Votre mot de passe</label>
			<input class="password_input" type="password" name="password" required><br />
		</div>

		<div class="form_container_btn">
			<input class="controls control_btn" type="submit" name="login" value="Se connecter">
		</div>
		<p class="ask_register">Pas encore inscrit ? <a class="controls signup" href="index.php?page=signup">S'inscrire</a></p>
	</form>

</section>
