<?php
namespace App\Controller;
use App;
use App\Model\User;
use App\Model\Comment;
use App\Model\Post;

class Backend
{
	protected $error = null;

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
					$pseudo = htmlspecialchars($_POST['pseudo']);
					$password = $_POST['password'];
					$hashedPass = password_hash($password, PASSWORD_DEFAULT);

					$user = new User([
						'pseudo' => $pseudo,
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

		if (!empty($_GET['commentid']) && Comment::exists($_GET['commentid']))
		{
			$commentId = $_GET['commentid'];
			if ($_GET['event'] === 'accept')
			{
				Comment::accept($commentId);
				header('Location: index.php?page=admin');
				exit();
			}
			if ($_GET['event'] === 'remove')
			{
				Comment::remove($commentId);
				header('Location: index.php?page=admin');
				exit();
			}
		}
		elseif (!empty($_GET['postid']) && Post::exists($_GET['postid']) && $_GET['event'] === 'remove') 
		{
			Post::remove($_GET['postid']);
			header('Location: index.php?page=admin');
			exit();
		}

		require 'view/backend/admin.php';
	}

	public static function viewNewpost()
	{
		if (!empty($_POST['title']) && !empty($_POST['content']))
		{
			if (isset($_POST['publish']))
			{
				$post = new Post([
					'title' => $_POST['title'],
					'content' => $_POST['content'],
					'online' => 1,
				]);

				$post->insert();
			}		
			elseif (isset($_POST['draft'])) 
			{
				$post = new Post([
					'title' => $_POST['title'],
					'content' => $_POST['content'],
					'online' => 0,
				]);

				$post->insert();
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

		require 'view/backend/newpost.php';
	}

	public static function viewEditpost()
	{
		$error = null;

		if (!empty($_GET['id']) && Post::exists($_GET['id']))
		{
			$postId = $_GET['id'];
			$posts = Post::getPost($postId);
			
			if (isset($_POST['edit']) && $_POST['edit'] == 'Valider')
			{
				$title = htmlspecialchars($_POST['title']);
				$content = $_POST['content'];
				$post = new Post([
					'title' => $title,
					'content' => $content,
				]);
				
				$post->update($postId);
				
				header('Location: index.php?page=admin');
				exit();
			}
		}
		else
		{
			header('Location: index.php?page=notfound');
			exit();
		}

		
		require 'view/backend/editpost.php';
	}

}