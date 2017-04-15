<?php

namespace Entity\Formula;


class Formula
{

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $formulation
     */
    private $formulation;

    /**
     * @var int $paragraph
     */
    private $paragraph;

    /**
     * @var array $explanation
     */
    private $explanation;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
    public function getParagraph()
    {
        return $this->paragraph;
    }

    /**
     * @param int $paragraph
     */
    public function setParagraph($paragraph)
    {
        $this->paragraph = $paragraph;
    }

    /**
     * @return array
     */
    public function getExplanation()
    {
        return $this->explanation;
    }

    /**
     * @param array $explanation
     */
    public function setExplanation($explanation)
    {
        $this->explanation = $explanation;
    }

}