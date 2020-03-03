<?php
namespace App;
use PDO;

class Database
{
	private $db_name,
			$db_user,
			$db_pass,
			$db_host,
			$pdo;

	public function __construct($db_name, $db_user, $db_pass, $db_host)
	{
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
	}

	private function getPdo()
	{
		if ($this->pdo === null) 
		{
			$pdo = new PDO('mysql:host=' . $this->db_host . '; dbname=' . $this->db_name, $this->db_user, $this->db_pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}

	public function query($statement, $class, $one)
	{
		$req = $this->getPdo()->query($statement);
		$req->setFetchMode(PDO::FETCH_CLASS, $class);
		if ($one)
		{
			$datas = $req->fetch();
		}
		else
		{
			$datas = $req->fetchAll();
		}
		return $datas;

	}

	public function prepareFetch($statement, $attributes, $class, $one)
	{
		$req = $this->getPdo()->prepare($statement);
		$req->execute($attributes);
		$req->setFetchMode(PDO::FETCH_CLASS, $class);

		if ($one)
		{
			$datas = $req->fetch();
		}
		else
		{
			$datas = $req->fetchAll();
		}
		return $datas;
	}

	public function prepare($statement, $attributes)
	{
		$req = $this->getPdo()->prepare($statement);
		$req->execute($attributes);
	}
}