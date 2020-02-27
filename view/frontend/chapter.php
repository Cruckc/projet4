<section class="section_container chapter">
	<div class="title_container chapter">
		<h1>Billet simple pour l'Alaska</h1>
	</div>
	<div class="content_container">
		<div class="info_container info_posts">
			<p>	Retrouvez ici l'ensemble des chapitres du roman "Biller simple pour l'Alaska" écrit par Jean FORTEROCHE.<br />
				Je vous souhaite une bonne lecture, n'hésitez pas à commenter !</p>
		</div>
		<?php foreach ($posts as $post): ?>
			<div class="post_container">
				<div class="title_date_container">
					<h2 class="post_title"><?= $post->title; ?></h2>
					<p class="post_created">Publié le <?= date_format(date_create($post->created), 'd/m/Y'); ?></p>
				</div>
				<div>
					<p><?= $post->excert; ?></p>
				</div>
			</div>	
		<?php endforeach; ?>
	</div>
</section>