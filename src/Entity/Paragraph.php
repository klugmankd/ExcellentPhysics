<?php

namespace Entity\Paragraph;


class Paragraph
{

    /**
     * @var string $table
     */
    private $table = 'paragraph';

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $content
     */
    private $content;

    /**
     * @var string $img
     */
    private $img;

    /**
     * @var int $example
     */
    private $example;

    /**
     * @var int $topic
     */
    private $topic;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return int
     */
    public function getExample()
    {
        return $this->example;
    }

    /**
     * @param int $example
     */
    public function setExample($example)
    {
        $this->example = $example;
    }

    /**
     * @return int
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param int $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}