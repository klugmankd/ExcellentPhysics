<?php

namespace Entity\Tests;


class TestAnswer
{

    /**
     * @var string $table
     */
    private $table = 'test_answer';

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $formulation
     */
    private $formulation;

    /**
     * @var bool $isTrue
     */
    private $result;

    /**
     * @var int $question
     */
    private $question;

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
     * @return boolean
     */
    public function isResult()
    {
        return $this->result;
    }

    /**
     * @param boolean $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @return int
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param int $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }
}