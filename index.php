<?php
namespace App;
require 'app/Autoloader.php';

Autoloader::register();
session_start();

if(isset($_GET['page']))
{
	$page = $_GET['page'];
}
else
{
	$page = 'home';
}

ob_start();
if($page === 'home')
{
	Controller\Frontend::viewHome();
	$pageTitle = 'Accueil';
}
elseif ($page === 'biography') 
{
	Controller\Frontend::viewBiography();
	$pageTitle = 'Biographie';
}
elseif ($page === 'chapter') 
{
	Controller\Frontend::viewChapter();
	$pageTitle = 'Billet simple pour l\'Alaska.';
}
elseif ($page === 'post') 
{
	Controller\Frontend::viewPost();
	$pageTitle = 'Billet';
}
elseif ($page === 'signup')
{
	Controller\Backend::viewSignup();
	$pageTitle = 'Inscrivez-vous';
}
elseif ($page === 'login') 
{
	Controller\Backend::viewLogin();
	$pageTitle = 'Connectez-vous';
}
elseif ($page === 'admin') 
{
	Controller\Backend::viewAdmin();
	$pageTitle = 'Panneau d\'administration';
}
elseif ($page === 'newpost') 
{
	Controller\Backend::viewNewpost();
	$pageTitle = 'Nouveau chapitre';
}
elseif ($page === 'edit') 
{
	Controller\Backend::viewEditpost();
	$pageTitle = 'Editez un chapitre';
}
else
{
	Controller\Frontend::viewNotFound();
	$pageTitle = 'Error';
}

$content = ob_get_clean();
require 'view/templates/default.php';