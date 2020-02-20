<?php
namespace App\Controller;
use App;
use App\Model;
use App\Model\Comment;
use App\Model\Post;

class Frontend
{
	public static function viewHome()
	{
		require 'view/frontend/home.php';
	}

	public static function viewBiography()
	{
		require 'view/frontend/biography.php';
	}

	public static function viewChapter()
	{
		$posts = Post::getLast();
		require 'view/frontend/chapter.php';
	}

	public static function viewNotFound()
	{
		require 'view/notfound.php';
	}

	public static function viewPost()
	{
		$postId = $_GET['id'];
		$valid = Post::exists($postId);

		if ($valid)
		{
			$posts = Post::getPost($postId);
		}
		else
		{
			header('Location: index.php?page=notfound');
			exit();
		}
		
		$comments = Comment::getComments();

		if (isset($_POST['envoyer']))
		{
			$valid = true;

			if (empty($_POST['pseudo']) || empty($_POST['message']))
			{
				$valid = false;
			}

			if (strlen($_POST['pseudo']) >= 20)
			{
				$valid = false;
			}

			if (strlen($_POST['message']) >= 500)
			{
				$valid = false;
			}

			if ($valid)
			{
				$comment = new Comment([
					'pseudo' => $_POST['pseudo'],
					'content' => $_POST['message'],
					'id_post' => $_GET['id'],
				]);

				$comment->insert();
			}
			else
			{
				//ERREUR
			}
		}

		//Signalement commentaire + check $_GET['comment']

		if (isset($_GET['comment']) && !empty($_GET['comment']))
		{
			$valid = Comment::exists($_GET['comment']);

			if ($valid)
			{
				$reportId = $_GET['comment'];
				Comment::report($reportId);
			}
			else
			{
				header('Location: index.php?page=error');
			}
		}

		require 'view/frontend/post.php';
	}
}