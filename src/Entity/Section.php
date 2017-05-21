<?php

namespace Entity\Section;


class Section
{

    /**
     * @var string $table
     */
    private $table = 'section';

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var int $part
     */
    private $part;

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
     * @return int
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param int $part
     */
    public function setPart($part)
    {
        $this->part = $part;
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