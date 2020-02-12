<?php
namespace App\Model;

class Comment
{
    protected   $id,
                $pseudo,
                $content,
                $created,
                $id_post;

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

        if (isset($data['id_post']))
        {
            $this->setId_post($data['id_post']);
        }

        if (isset($data['pseudo']))
        {
            $this->setPseudo($data['pseudo']);
        }

        if (isset($data['content']))
        {
            $this->setContent($data['content']);
        }

        if (isset($data['created']))
        {
            $this->setCreated($data['created']);
        }

        if (isset($data['report']))
        {
            $this->setReport($data['report']);
        }

        if (isset($data['title']))
        {
            $this->setTitle($data['title']);
        }
    }

    // GETTERS

    public function getId()
    {
        return $this->id;
    }

    public function getId_post()
    {
        return $this->id_post;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getReport()
    {
        return $this->report;
    }

    public function getTitle()
    {
        return $this->title;
    }

    // SETTERS

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setId_post($id_post)
    {
        $this->id_post = $id_post;

        return $this;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = htmlspecialchars($pseudo);

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

    public function setReport($report)
    {
        $this->report = $report;

        return $this;
    }

    public function setTitle($title)
    {
        $this->title = htmlspecialchars($title);

        return $this;
    }
}