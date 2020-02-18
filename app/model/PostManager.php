<?php
namespace App\Model;
use App\App; //Permet l'utilisation de la clase App qui crée la co à la base

class PostManager
{
	public static function getLast()
	{
		return App::getDb()->query('SELECT * FROM posts',  get_called_class(), false);
	}

	public static function getPost()
	{
		return App::getDb()->prepareFetch('SELECT * FROM posts WHERE id= ?', [$_GET['id']], get_called_class(), false);
	}

	public function __get($key)
	{
		$method = 'get' . ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;
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

	public function add()
	{

	}

	public function delete()
	{

	}

	public function update()
	{

	}
}