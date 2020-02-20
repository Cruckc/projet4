<?php
namespace App\Model;
use App\App;
use App\Model\Model;

class Post extends Model
{
	public static function getAllPost()
	{
		return App::getDb()->query('SELECT * FROM posts ORDER BY created DESC', get_called_class(), false);
	}
	public static function getLast()
	{
		return App::getDb()->query('SELECT * FROM posts WHERE online = 1 ORDER BY created DESC',  get_called_class(), false);
	}

	public static function getPost($id)
	{
		return App::getDb()->prepareFetch('SELECT * FROM posts WHERE id= ?', [$id], get_called_class(), false);
	}

	public static function exists($id)
	{
		if (is_numeric($id))
		{
			return App::getDb()->prepareFetch('SELECT id FROM posts where id = ?', [$id], get_called_class(), true);
		}
		else
		{
			return false;
		}
	}

	public function getUrl()
	{
		return 'index.php?page=post&id=' . $this->id;
	}

	public function getExcert()
	{
		$html = '<p>' . substr($this->content, 0, 100) . '</p>';
		$html .= '<p><a href="' . $this->getUrl() . '">Lire la suite</a></p>';
		return $html;
	}

	public function insert()
	{
		App::getDb()->prepare('INSERT INTO posts (title, content, created, online) VALUES (:title, :content, NOW(), :online)',
			array(
				':title' => $this->title,
				':content' => $this->content,
				':online' => $this->online,
			));
	}
	public function update($id)
	{
		App::getDb()->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?',
			array(
				$this->title,
				$this->content,
				$id,
			));
	}

	public static function remove($id)
	{
		App::getDb()->prepare('DELETE FROM posts WHERE id = ?', [$id]);
	}

	
}