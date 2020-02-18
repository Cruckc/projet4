<?php
namespace App;
require 'app/Autoloader.php';

Autoloader::register();

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
	Controller\FrontEndController::viewHome();
}
elseif ($page === 'biography') 
{
	Controller\FrontEndController::viewBiography();
}
elseif ($page === 'chapter') 
{
	Controller\FrontEndController::viewChapter();
}
elseif ($page === 'post') 
{
	Controller\FrontEndController::viewPost();
}
else
{
	Controller\FrontEndController::viewError();
}


$content = ob_get_clean();
require 'view/templates/default.php';