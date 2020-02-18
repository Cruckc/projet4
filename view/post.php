<section id="post">
	<?php foreach (App\Model\PostManager::getPost() as $post): ?>

	<h2><?= $post->title; ?></h2>
	<p>Publié le <?= date_format(date_create($post->created), 'd/m/Y'); ?></p>
	<p><?= $post->content; ?></p>

	<?php endforeach; ?>
</section>

<section id="comment">
	<!-- Affichage de tous les commentaires -->
	<h3>Commentaire</h3>
	<div id="comments">
		<?php foreach (App\Model\CommentManager::getComments() as $comment): ?>
			<div>
				<p><?= $comment->pseudo; ?></p>
				<p>Publié le <?= date_format(date_create($comment->created), 'd/m/Y H:i:s'); ?></p>
			</div>
			<p><?= $comment->content;?></p>
			<input id="signal" type="submit" name="signal" value="Signalé">
			
		<?php endforeach; ?>
		
	</div>
</section>

<section id="comment_form">
	<form action="index.php?page=post&id=<?= $post->id; ?>" method="post">

		<div>
			<label id="pseudo">Votre pseudo</label><br />
			<input id="pseudo_input" type="text" name="pseudo" placeholder="Pseudo">
		</div>

		<div>
			<label id="comment">Votre commentaire</label><br />
			<textarea id="comment_input" name="message" placeholder="Commentaire"></textarea>
		</div>

		<div id="div_btn">
			<input id="Valider" type="submit" name="envoyer" value="Envoyer">
		</div>
	</form>
</section>


