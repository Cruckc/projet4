<?php
namespace App\Model;
use App\App;
use App\Model\Model;

class User extends Model
{
	public function getUser($pseudo)
	{
		return App::getDb()->prepareFetch('SELECT id, pseudo, password FROM users WHERE pseudo = ?', [$pseudo], get_called_class(), true);
	}

	public static function exists($pseudo)
	{
		return App::getDb()->prepareFetch('SELECT pseudo FROM users WHERE LOWER(pseudo) = ?', [strtolower($pseudo)], get_called_class(), true);
	}

	public function insert()
	{
		App::getDb()->prepare('INSERT INTO users (pseudo, password, email, created) VALUES(:pseudo, :password, :email, NOW())',
			array(
				':pseudo' => $this->pseudo,
				':password' => $this->password,
				':email' => $this->email,
			));
	}
}