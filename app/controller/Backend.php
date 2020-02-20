<?php
namespace App\Controller;
use App;
use App\Model\User;
use App\Model\Comment;
use App\Model\Post;

class Backend
{
	public static function sessionExists()
	{
		if (empty($_SESSION['pseudo']))
		{
			header('Location: index.php?page=login');
			exit();
		}
	}

	public static function viewSignup()
	{
		$error = null;

		if (!empty($_POST['signup']))
		{
			$valid = true;

			if (empty($_POST['pseudo']) || empty($_POST['password']) || empty($_POST['confirmation_password']) || empty($_POST['email']))
			{
				$valid = false;
				$error = true;
			}

			if (strlen($_POST['pseudo']) > 20 || strlen($_POST['password']) > 50)
			{
				$valid = false;
				$error = true;
			}

			if ($_POST['password'] !== $_POST['confirmation_password'])
			{
				$valid = false;
				$error = true;
			}

			if ($valid)
			{
				if (empty(User::exists($_POST['pseudo'])))
				{
					$password = $_POST['password'];
					$hashedPass = password_hash($password, PASSWORD_DEFAULT);

					$user = new User([
						'pseudo' => $_POST['pseudo'],
						'password' => $hashedPass,
						'email' => $_POST['email'],
					]);
					$user->insert();

					header('Location: index.php?page=login');
					exit();
				}
				else
				{
					$error = true;
				}
				
			}
		}

		require 'view/backend/signup.php';
	}

	public static function viewLogin()
	{
		$error = null;

		if (!empty($_POST['login']))
		{
			$valid = true;

			if (empty($_POST['pseudo']) || empty($_POST['password']))
			{
				$valid = false;
				$error = true;
			}
			if (strlen($_POST['pseudo']) > 20 || strlen($_POST['password']) > 50)
			{
				$valid = false;
				$error = true;
			}

			if ($valid)
			{
				$userManager = new User();
				$user = $userManager->getUser($_POST['pseudo']);

				if ($user)
				{
					$checkPass = password_verify($_POST['password'], $user->password);
					if ($checkPass)
					{
						$_SESSION['pseudo'] = $_POST['pseudo'];
						header('Location: index.php?page=admin');
						exit();
					}
					else
					{
						$error = true;
					}
				}
				else
				{
					$error = true;
				}
			}
		}

		require 'view/backend/login.php';
	}

	public static function viewAdmin()
	{
		self::sessionExists();

		if (isset($_POST['disconnect']))
		{
			session_destroy();
			header('Location: index.php?page=login');
			exit();
		}

		$posts = Post::getAllPost();
		$comments = Comment::getReported();

		if (!empty($_GET['comment']) && Comment::exists($_GET['comment']))
		{
			if ($_GET['event'] === 'accept')
			{
				Comment::accept($_GET['comment']);
				header('Location: index.php?page=admin');
				exit();
			}
			if ($_GET['event'] === 'remove')
			{
				Comment::remove($_GET['comment']);
				header('Location: index.php?page=admin');
				exit();
			}
		}

		require 'view/backend/admin.php';
	}
}