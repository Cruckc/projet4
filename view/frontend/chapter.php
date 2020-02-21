<section class="section_container">
	<div class="title_container">
		<h1>Billet simple pour l'Alaska</h1>
		<h5>Chapitres</h5>
	</div>
	<div class="posts_container">
		<div class="info_posts">
			<p>	Retrouvez ici l'ensemble des chapitres du roman "Biller simple pour l'Alaska" écrit par Jean FORTEROCHE.<br />
				Les chapitres sont triés par ordre croissant, allant du chapitre plus ancien au plus récent.<br />
				Vous pourrez poster un commentaire à la fin de chaque publication.<br />
				Bonne lecture !</p>
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