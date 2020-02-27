<section class="section_container post">
	<?php foreach ($posts as $post): ?>
		<div class="title_container">
			<h1>Billet simple pour l'Alaska</h1>
			<h2><?= $post->title; ?></h2>
		</div>
		<div class="post_container post">
			<p class="publish">Publié le <?= date_format(date_create($post->created), 'd/m/Y'); ?></p>
			<p class="content"><?= $post->content; ?></p>
		</div>
	<?php endforeach; ?>
</section>

<section class="section_container comment">
	<div class="comments_container">
		<h5>Commentaires :</h5>
		<?php foreach ($comments as $comment): ?>
			<div class="comment_container">
				<div class="info_comment">
					<p class="comment_pseudo"><?= ucfirst($comment->pseudo);?></p>
					<p class="comment_date"><?= date_format(date_create($comment->created), 'd/m/Y H:i:s'); ?></p>
				</div>
				<p class="content"><?= ucfirst($comment->content); ?></p>
				<?php if ($comment->reported == 0): ?>
				<a class="info_report report" href="<?= $post->url; ?>&comment=<?= $comment->id; ?>">Signaler</a>
				<?php else: ?>
				<p class="info_report reported">Signalé</p>
				<?php endif; ?>
			</div>			
		<?php endforeach; ?>
	</div>
	<div class="form_container">
		<h5>Laisser un commentaire :</h5>
		<?php if ($error): ?>
			<p class="text_error">Une erreur s'est produite et votre commentaire n'a pas été publié !</p>
		<?php endif; ?>
		<form method="post">
			<div class="form_group">
				<label class="pseudo_label">Votre pseudo</label>
				<input class="pseudo_input" type="text" name="pseudo" placeholder="Pseudo" required>
			</div>
			<div class="form_group">
				<label class="comment_label">Votre commentaire</label>
				<textarea class="comment_input" name="message" placeholder="Commentaire" required></textarea>
			</div>
			<div class="form_container_btn">
				<input class="controls control_btn" type="submit" name="submit_comment" value="Envoyer">
			</div>
		</form>
	</div>

</section>