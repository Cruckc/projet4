<?php
namespace App;

use App\Controller\Frontend;
use App\Controller\Backend;

require 'Autoloader.php';
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
	Frontend::viewHome();
	$pageTitle = 'Accueil';
}
elseif ($page === 'biography') 
{
	Frontend::viewBiography();
	$pageTitle = 'Biographie';
}
elseif ($page === 'chapter') 
{
	Frontend::viewChapter();
	$pageTitle = 'Billet simple pour l\'Alaska.';
}
elseif ($page === 'post') 
{
	Frontend::viewPost();
	$pageTitle = 'Billet';
}
elseif ($page === 'signup')
{
	Backend::viewSignup();
	$pageTitle = 'Inscrivez-vous';
}
elseif ($page === 'login') 
{
	Backend::viewLogin();
	$pageTitle = 'Connectez-vous';
}
elseif ($page === 'admin') 
{
	Backend::viewAdmin();
	$pageTitle = 'Panneau d\'administration';
}
elseif ($page === 'newpost') 
{
	Backend::viewNewpost();
	$pageTitle = 'Nouveau chapitre';
}
elseif ($page === 'edit') 
{
	Backend::viewEditpost();
	$pageTitle = 'Editez un chapitre';
}
else
{
	Frontend::viewNotFound();
	$pageTitle = 'Error';
}

$content = ob_get_clean();
require 'view/template/default.php';