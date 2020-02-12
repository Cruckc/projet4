<?php
namespace App\Model;
use App\App;

class CommentManager
{
	public static function getComments()
	{
		return App::getDb()->prepareFetch('
			SELECT comments.id, id_post, pseudo, comments.content, comments.created 
			FROM comments 
			INNER JOIN posts ON comments.id_post = posts.id
			WHERE posts.id = ?
			ORDER BY comments.created DESC', 
			array($_GET['id']), get_called_class(), false);
	}

	public static function add(Comment $comment)
	{	
		App::getDb()->prepare('INSERT INTO comments (pseudo, content, created, id_post) VALUES(:pseudo, :content, NOW(), :id_post)',
			array(
				':pseudo' => $comment->getPseudo(),
				':content' => $comment->getContent(),
				':id_post' => $comment->getId_post()
			));
	}

	public function delete(Comment $comment)
	{
		App::getDb()->prepare("DELETE FROM comments WHERE id = ?", $comment->getId());
	}
}