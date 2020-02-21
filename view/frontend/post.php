<section class="section_container post">
	<?php foreach ($posts as $post): ?>
	<div class="title_container">
		<h1>Billet simple pour l'Alaska</h1>
		<h2><?= $post->title; ?></h2>
	</div>
	<div class="post_container">
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
				<div class="pseudo_publish">
					<p class="pseudo"><?= ucfirst($comment->pseudo);?></p>
					<p class="publish"> le <?= date_format(date_create($comment->created), 'd/m/Y H:i:s'); ?></p>
				</div>
				<p class="content"><?= $comment->content; ?></p>
				<a class="report_btn" href="<?= $post->url; ?>&comment=<?= $comment->id; ?>">Signaler</a>
			</div>
			
		<?php endforeach; ?>
	</div>
	<div class="form_container">
		<h5>Laisser un commentaire :</h5>
		<form id="comment_form" action="<?= $post->url; ?>" method="post">
			<div class="form_group">
				<label id="pseudo_label">Votre pseudo</label>
				<input id="pseudo_input" type="text" name="pseudo" placeholder="Pseudo">
			</div>
			<div class="form_group">
				<label id="comment_label">Votre commentaire</label>
				<textarea id="comment_input" name="message" placeholder="Commentaire"></textarea>
			</div>
			<div class="comment_btn_container">
				<input class="comment_btn" type="submit" name="envoyer" value="Envoyer">
			</div>
			

		</form>
	</div>

</section>

