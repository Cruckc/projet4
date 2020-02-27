<?php
namespace App\Model;
use App\App;
use App\Model\Model;

class Comment extends Model 
{
	public static function getReported()
	{
		return App::getDb()->query('
			SELECT comments.id, pseudo, comments.content, comments.created, comments.reported, posts.title 
			FROM comments
			INNER JOIN posts ON comments.id_post = posts.id
			ORDER BY reported DESC, created DESC',
			get_called_class(), false);
	}
	public static function getComments()
	{
		return App::getDb()->prepareFetch('
			SELECT comments.id, id_post, pseudo, comments.content, comments.created, comments.reported
			FROM comments 
			INNER JOIN posts ON comments.id_post = posts.id
			WHERE posts.id = ?
			ORDER BY comments.created DESC', 
			array($_GET['id']), get_called_class(), false);
	}

	public static function exists($id)
	{
		if (is_numeric($id))
		{
			return App::getDb()->prepareFetch('SELECT id FROM comments where id = ?', [$id], get_called_class(), true);
		}
		else
		{
			return false;
		}
	}

	public function insert()
	{
		App::getDb()->prepare('INSERT INTO comments (pseudo, content, created, reported, id_post) VALUES(:pseudo, :content, NOW(), 0, :id_post)',
			array(
				':pseudo' => $this->pseudo,
				':content' => $this->content,
				':id_post' => $this->id_post,
			));
	}

	public static function report($id)
	{
		App::getDb()->prepare('UPDATE comments SET reported = 1 WHERE id = ?', [$id]);
	}

	public static function accept($id)
	{
		App::getDb()->prepare('UPDATE comments SET reported = 0 WHERE id = ?', [$id]);
	}

	public static function remove($id)
	{
		App::getDb()->prepare('DELETE FROM comments WHERE id = ?', [$id]);
	}
}