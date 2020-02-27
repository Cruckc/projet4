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
		$posts = Post::getOnline();
		require 'view/frontend/chapter.php';
	}

	public static function viewNotFound()
	{
		require 'view/notfound.php';
	}

	public static function viewPost()
	{
		$comments = Comment::getComments();
		$postId = $_GET['id'];
		$validId = Post::exists($postId);
		$error = null;

		if ($validId)
		{
			$posts = Post::getPost($postId);
		}
		else
		{
			header('Location: index.php?page=notfound');
			exit();
		}

		if (isset($_POST['submit_comment']))
		{
			$valid = true;

			if (empty($_POST['pseudo']) || empty($_POST['message']))
			{
				$valid = false;
				$error = true;
			}
			if (strlen($_POST['pseudo']) >= 50)
			{
				$error = true;
				$valid = false;
			}
			if (strlen($_POST['message']) >= 500)
			{
				$error = true;
				$valid = false;
			}

			if ($valid)
			{
				$pseudo = htmlspecialchars($_POST['pseudo']);
				$content = htmlspecialchars($_POST['message']);
				$comment = new Comment([
					'pseudo' => $pseudo,
					'content' => $content,
					'id_post' => $_GET['id'],
				]);

				$comment->insert();

				header('Location: index.php?page=post&id=' . $postId);
				exit();
			}
			else
			{
				$error = true;
			}
		}

		//Signalement commentaire + check $_GET['comment'] ($id)

		if (isset($_GET['comment']) && !empty($_GET['comment']))
		{
			$valid = Comment::exists($_GET['comment']);
			if ($valid)
			{
				$reportId = $_GET['comment'];
				Comment::report($reportId);
				header('Location: index.php?page=post&id=' . $postId);
				exit();
			}
			else
			{
				header('Location: index.php?page=error');
			}
		}

		require 'view/frontend/post.php';
	}
}