<?php

namespace Entity\TaskAnswer;


class TaskAnswer
{

    /**
     * @var string $table
     */
    private $table = 'task_answer';

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $quantity
     */
    private $quantity;

    /**
     * @var string $answer
     */
    private $answer;

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
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}