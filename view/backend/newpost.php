<section class="section_container">
	<div class="info_container back">
		<div class="title_container back">
			<h5>Nouveau billet</h5>
		</div>
		<p>Vous êtes sur le point de créer un nouveau billet.<br />
			Veillez à indiquer un titre avant validation ou le billet ne sera pas pris en compte.<br />
		Vous pourrez mettre directement en ligne par le biais du bouton "Publier" ou l'enregistrer en tant que brouillon.</p>
	</div>
	<div class="edit_container">
		<form method="post" action="">
			<div class="title_edit">
				<label>Titre du billet </label>
				<input type="text" name="title">
			</div>
			<div class="content_edit">
				<textarea class="editor" name="content" ></textarea>
			</div>
			
			<input class="controls publish_post" type="submit" name="publish" value="Publier">
			<input class="controls draft_post" type="submit" name="draft" value="Brouillon">
		</form>
	</div>	
</section>