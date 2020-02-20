<!DOCTYPE html>
<html>
<head>
	<title>Editer un article</title>
	<script src="https://cdn.tiny.cloud/1/zqbfpw53xjlriw5n2d6y4f6ah02jddxnwpq7aciro1lwy586/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>	
</head>
<body>
	<h4>Editer un article</h4>
<?php foreach ($posts as $post): ?>
	<form method="post" action="">
		<div>
			<label>Titre du chapitre : </label><input type="text" name="title" value="<?= $post->title; ?>">
		</div>
		<textarea name="content" placeholder="test"><?= $post->content; ?></textarea>
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



	<script>
    	tinymce.init({
    	selector: 'textarea',
     	plugins: 'a11ychecker advcode casechange formatpainter linkchecker lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker',
      	toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
      	toolbar_drawer: 'floating',
    	});
  	</script>
</body>
</html>