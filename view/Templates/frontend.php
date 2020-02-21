<!DOCTYPE html>
<html>
<head>
	<title><?= $pageTitle; ?> | Site officiel Jean FORTEROCHE</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body id="body_front">
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