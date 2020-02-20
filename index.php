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
}
elseif ($page === 'biography') 
{
	Controller\Frontend::viewBiography();
}
elseif ($page === 'chapter') 
{
	Controller\Frontend::viewChapter();
}
elseif ($page === 'post') 
{
	Controller\Frontend::viewPost();
}
elseif ($page === 'signup')
{
	Controller\Backend::viewSignup();
}
elseif ($page === 'login') 
{
	Controller\Backend::viewLogin();	
}
elseif ($page === 'admin') 
{
	Controller\Backend::viewAdmin();
}
elseif ($page === 'newpost') 
{
	Controller\Backend::viewNewpost();
}
elseif ($page === 'edit') 
{
	Controller\Backend::viewEditpost();
}


else
{
	Controller\Frontend::viewNotFound();
}


$content = ob_get_clean();
require 'view/templates/default.php';