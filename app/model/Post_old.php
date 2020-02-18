<?php
namespace App\Model;

class Post
{
	protected 	$id,
				$title,
				$content,
				$created,
                $updated;

	public function __construct(Array $data) 
    {
        $this->hydrate($data);
    }

    public function hydrate($data)
    {
        if (isset($data['id']))
        {
            $this->setId($data['id']);
        }

        if (isset($data['title']))
        {
            $this->setTitle($data['title']);
        }

        if (isset($data['content']))
        {
            $this->setContent($data['content']);
        }

        if (isset($data['created']))
        {
            $this->setCreated($data['created']);
        }

        if (isset($data['updated']))
        {
            $this->setUpdated($data['updated'])
        }
    }
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCreated()
    {
        return $this->created;
    }
    public function getUpdated()
    {
        return $this->updated;
    }

	public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setTitle($title)
    {
        $this->title = htmlspecialchars($title);

        return $this;
    }

    public function setContent($content)
    {
        $this->content = htmlspecialchars($content);

        return $this;
    }

    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    public function setUpdated()
    {
        $this->updated = $updated;
    }

}
