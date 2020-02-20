<!DOCTYPE html>
<html>
<head>
	<title>Nouvel Article</title>
	<script src="https://cdn.tiny.cloud/1/zqbfpw53xjlriw5n2d6y4f6ah02jddxnwpq7aciro1lwy586/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
	<h3>Nouvel article</h3>
	<form method="post" action="">
		<div>
			<label>Titre du chapitre : </label><input type="text" name="title">
		</div>
		<textarea name="content" placeholder="test"></textarea>
		<div>
			<input type="submit" name="publish" value="Publier">
			<input type="submit" name="draft" value="Brouillon">
		</div>
	</form>
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