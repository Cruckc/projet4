<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Bienvenu sur la page d'administration</h1>

	<form method="post">
		<input type="submit" name="disconnect" value="Se Déconnecter">
	</form>

	<section id="posts">
		<h4>Voici la liste de vos articles :</h4>
		<?php foreach ($posts as $post): ?>
		<div id="post_admin">
			<h2><?= $post->title; ?></h2>
			<p>Publié le <?= date_format(date_create($post->created), 'd/m/Y'); ?></p>
			<a id="modify_post_btn" href="index.php?page=edit&id=<?= $post->id; ?>">Editer</a>
			
			<a id="remove_post_btn" href="index.php?page=admin&postid=<?= $post->id;?>&event=remove">Supprimer</a>			
		</div>
	<?php endforeach; ?>
	<a id="new_post_btn" href="index.php?page=newpost">Nouveau</a>
	</section>

	<section id="comments">
		<h4>Voici la liste des commentaires :</h4>
		
		<?php foreach ($comments as $comment): ?>
		<div id="comments_reported">
			<div>
				<div>
					<p><?= $comment->pseudo;?></p>
					<p>Publié le <?= date_format(date_create($comment->created), 'd/m/Y H:i:s'); ?></p>
				</div>
				<p><?= $comment->content; ?></p>
			</div>
			<div>
				<?php if ($comment->reported == 1): ?>
				<p>
					<p>Commentaire signalé</p>
					<a id="accept_comment_btn" href="index.php?page=admin&commentid=<?= $comment->id;?>&event=accept">Accepter</a>
				</p>	
				<?php endif; ?>

				<p>
					<a id="remove_comment_btn" href="index.php?page=admin&commentid=<?= $comment->id;?>&event=remove">Supprimer</a>	
				</p>			
			</div>
		</div>
		<?php endforeach; ?>
	</section>
</body>
</html>

