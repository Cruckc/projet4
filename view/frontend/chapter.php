<?php foreach ($posts as $post): ?>

	<h2><a href="<?= $post->url; ?>"><?= $post->title; ?></a></h2>
	<p>Publié le <?= date_format(date_create($post->created), 'd/m/Y'); ?></p>
	<p><?= $post->excert; ?></p>

<?php endforeach; ?>