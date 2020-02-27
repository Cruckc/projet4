<section class="section_container">
	<form class="form_container admin signup" method="post" action="">
		<h5>Inscrivez-vous</h5>
		<?php if ($error): ?>
			<p class="text_error">Le formulaire n'a pas été correctement renseigné, veuillez rééessayer !</p>
		<?php endif; ?>
		<div class="form_group">
			<label class="pseudo_label">Login / Pseudo</label>
			<input class="pseudo_input" type="text" name="pseudo" required>
		</div>
		<div class="form_group">
			<label class="password_label">Password</label>
			<input class="password_input" type="password" name="password" required>
		</div>
		<div class="form_group">
			<label class="password_label">Confirmation Password</label>
			<input class="password_input" type="password" name="confirmation_password" required>
		</div>
		<div class="form_group">
			<label class="email_label">Votre Email</label>
			<input class="email_input" type="email" name="email" required>
		</div>
		<div class="form_container_btn">
			<input class="controls control_btn" type="submit" name="signup" value="S'inscrire">
		</div>
		<p class="ask_register">Déjà inscrit ? <a class="controls login" href="index.php?page=login"> Se connecter</a>.</p>
	</form>
</section>



