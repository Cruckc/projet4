<h4>Editer un article</h4>
<?php foreach ($posts as $post): ?>
<form method="post" action="">
	<div>
		<label>Titre du chapitre : </label><input type="text" name="title" value="<?= $post->title; ?>">
	</div>
	<textarea name="content" placeholder="test" id="tinymce_text"><?= $post->content; ?></textarea>
	<div>
		<input type="submit" name="edit" value="Valider">
	</div>
</form>
<?php endforeach; ?>
<?php if ($error): ?>
	<?= $error; ?>
<?php endif; ?>
<p>
	<a href="index.php?page=admin">Admin</a>
</p>