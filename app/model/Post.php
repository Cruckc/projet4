<?php
namespace App\Model;
use App\App;
use App\Model\Model;

class Post extends Model
{
	public static function getAllPost()
	{
		return App::getDb()->query('SELECT * FROM posts', get_called_class(), false);
	}
	public static function getLast()
	{
		return App::getDb()->query('SELECT * FROM posts WHERE online = 1 ORDER BY created DESC',  get_called_class(), false);
	}

	public static function getPost()
	{
		return App::getDb()->prepareFetch('SELECT * FROM posts WHERE id= ?', [$_GET['id']], get_called_class(), false);
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

	}

	public function delete()
	{

	}

	public function update()
	{
		
	}
}