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
	$viewFrontend = true;
}
elseif ($page === 'biography') 
{
	Controller\Frontend::viewBiography();
	$pageTitle = 'Biographie';
	$viewFrontend = true;
}
elseif ($page === 'chapter') 
{
	Controller\Frontend::viewChapter();
	$pageTitle = 'Billet simple pour l\'Alaska.';
	$viewFrontend = true;
}
elseif ($page === 'post') 
{
	Controller\Frontend::viewPost();
	$pageTitle = null;
	$viewFrontend = true;
}
elseif ($page === 'signup')
{
	Controller\Backend::viewSignup();
	$pageTitle = 'Inscrivez-vous';
	$viewFrontend = true;
}
elseif ($page === 'login') 
{
	Controller\Backend::viewLogin();
	$pageTitle = 'Connectez-vous';
	$viewFrontend = true;
}
elseif ($page === 'admin') 
{
	Controller\Backend::viewAdmin();
	$pageTitle = 'Panneau d\'administration';
	$viewFrontend = false;
}
elseif ($page === 'newpost') 
{
	Controller\Backend::viewNewpost();
	$pageTitle = 'Nouveau chapitre';
	$viewFrontend = false;
}
elseif ($page === 'edit') 
{
	Controller\Backend::viewEditpost();
	$pageTitle = 'Editez un chapitre';
	$viewFrontend = false;
}


else
{
	Controller\Frontend::viewNotFound();
	$pageTitle = '';
}


$content = ob_get_clean();
if ($viewFrontend)
{
	require 'view/templates/frontend.php';
}
else
{
	require 'view/templates/backend.php';
}
