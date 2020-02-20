<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<nav>
	<ul id="test">
		<li class="nav_item">
			<a class="nav_link" href="index.php?page=home">Accueil</a>
		</li>
		<li class="nav_item">
			<a class="nav_link" href="index.php?page=chapter">Chapitres</a>
		</li>
		<li class="nav_item">
			<a class="nav_link" href="index.php?page=biography">Biographie</a>
		</li>
		<li class="nav_item">
			<a class="nav_link" href="index.php?page=admin">Admin</a>
		</li>
	</ul>
</nav>

<div>
	<?= $content; ?>

</div>
</body>
</html>
