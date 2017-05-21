<?php

namespace Entity\Task;


class Task
{
    /**
     * @var string $table
     */
    private $table = 'task';

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var int $num
     */
    private $num;

    /**
     * @var string $formulation
     */
    private $formulation;

    /**
     * @var int $answer
     */
    private $answer;

    /**
     * @var int $section
     */
    private $section;

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
    public function getNum()
    {
        return $this->num;
    }

    /**
     * @param int $num
     */
    public function setNum($num)
    {
        $this->num = $num;
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
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param int $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}