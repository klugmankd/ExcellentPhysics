<?php

namespace Entity\Tests;


class TestQuestion
{

    /**
     * @var string $table
     */
    private $table = 'test_question';

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $formulation
     */
    private $formulation;

    /**
     * @var int $answer
     */
    private $answer;

    /**
     * @var int $topic
     */
    private $topic;

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

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
    public function getFormulation()
    {
        return $this->formulation;
    }

    /**
     * @param string $formulation
     */
    public function setFormulation($formulation)
    {
        $this->formulation = $formulation;
    }

    /**
     * @return int
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param int $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
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

}