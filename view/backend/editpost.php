<section class="section_container">
	<?php foreach ($posts as $post): ?>
	<div class="info_container back">
		<div class="title_container back">
			<h5>Editer un billet</h5>
			<?php if ($post->online == 0): ?>
				<p class="draft">Ceci est un brouillon</p>
			<?php endif; ?>
		</div>
	</div>
	<div class="edit_container">
		<form method="post" action="">
			<div class="title_edit">
				<label>Titre du billet </label>
				<input type="text" name="title" value="<?= $post->title; ?>">
			</div>
			<div class="content_edit">
				<textarea class="editor" name="content" ><?= $post->content; ?></textarea>
			</div>
			
			<input class="controls publish_post" type="submit" name="edit" value="Valider">
			<?php if ($post->online == 0): ?>
				<input class="controls online_post" type="submit" name="online" value="Mettre en ligne">
			<?php else: ?>
				<input class="controls draft_post" type="submit" name="draft" value="Brouillon">
			<?php endif; ?>

		</form>
	</div>
	<?php endforeach; ?>
</section>