<!DOCTYPE html>
<html>
<head>
	<title><?= $pageTitle; ?> | Site officiel Jean FORTEROCHE</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<script src="https://cdn.tiny.cloud/1/zqbfpw53xjlriw5n2d6y4f6ah02jddxnwpq7aciro1lwy586/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script src="public/js/tinymce.js" type="text/javascript"></script>
</head>
<body>
	<header>
		<nav id="nav_container">
			<ul id="ul_container">
				<li class="nav_item">
					<a class="nav_link" href="index.php?page=admin">Admin</a>
				</li>
				<li class="nav_item">
					<a class="nav_link" href="index.php?page=biography">Biographie</a>
				</li>
				<li class="nav_item">
					<a class="nav_link" href="index.php?page=chapter">Chapitres</a>
				</li>
				<li class="nav_item">
					<a class="nav_link" href="index.php?page=home">Accueil</a>
				</li>
			</ul>
		</nav>	
	</header>

	<?= $content; ?>

</body>
</html>