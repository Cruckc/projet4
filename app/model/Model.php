<?php
namespace App\Model;

class Model
{
	public function __construct(Array $data = [])
	{
		$this->hydrate($data);
	}

	public function hydrate($data)
	{
		foreach ($data as $attribute => $value) 
		{
			$this->$attribute = $value;
		}
	}

	public function __get($key)
	{
		$method = 'get' . ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;
	}
}