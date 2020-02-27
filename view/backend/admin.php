<section class="section_container admin">
	<div class="info_container back">
		<div class="title_container back">
			<h5>Bienvenu sur la page d'administration</h5>
		</div>
		<p>A partir de ce panneau vous aurez la possibilité de créer, editer ou supprimer un billet. Qu'il soit en ligne ou en brouillon.<br />
		Ainsi que modérer les commentaires postés à la suite de vos billets.</p>
		<form method="post">
			<input class="controls control_disconnect" type="submit" name="disconnect" value="Déconnexion">
		</form>
	</div>
</section>

<section class="section_container posts">
	<div class="content_container">
		<div class="info_container">
			<div class="title_container back">
				<h5>Billets</h5>
			</div>
			<a class="controls control_new" href="index.php?page=newpost">Nouveau billet</a>	
		</div>
		<?php foreach ($posts as $post): ?>
		<div class="post_container admin">
			<div class="info_posts">
				<h2><?= $post->title; ?></h2>
				<p>Publié le <?= date_format(date_create($post->created), 'd/m/Y H:i:s'); ?></p>
				<p>Dernière modification le <?= date_format(date_create($post->updated), 'd/m/Y H:i:s'); ?></p>
			</div>
			<?php if ($post->online == 0): ?>
			<p class="info_online draft">Brouillon</p>
			<a class="controls control_publish" href="index.php?page=admin&postid=<?= $post->id;?>&event=online">En ligne</a>
			<?php else: ?>
			<p class="info_online online">En ligne</p>
			<a class="controls control_publish" href="index.php?page=admin&postid=<?= $post->id;?>&event=draft">Brouillon</a>
			<?php endif; ?>
			<a class="controls control_admin modify_post" href="index.php?page=edit&id=<?= $post->id; ?>">Editer</a>
			<a class="controls control_admin remove_post" href="index.php?page=admin&postid=<?= $post->id;?>&event=remove">Supprimer</a>	
		</div>
		<?php endforeach; ?>
		
	</div>
</section>

<section class="section_container admin comment">
	<div class="comments_container">
		<div class="info_container">
			<div class="title_container back white">
				<h5>Commentaires :</h5>
			</div>
		</div>
		<?php foreach ($comments as $comment): ?>
			<div class="comment_container">
				<div class="info_comment">
					<p><?= ucfirst($comment->pseudo); ?></p>
					<p>Publié le <?= date_format(date_create($comment->created), 'd/m/Y H:i:s'); ?></p>
				</div>
				<p class="content"><?= ucfirst($comment->content); ?></p>
				<?php if ($comment->reported == 1): ?>
					<p class="info_report reported admin">Signalé</p>
					<a class="controls control_admin accept_comment" href="index.php?page=admin&commentid=<?= $comment->id;?>&event=accept">Accepter</a>
				<?php endif; ?>
				<a class="controls control_admin remove_comment" href="index.php?page=admin&commentid=<?= $comment->id;?>&event=remove">Supprimer</a>	
			</div>
		<?php endforeach; ?>
	</div>
</section>