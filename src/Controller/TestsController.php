<?php

use Entity\Tests\TestAnswer as Answer;
use Entity\Tests\TestQuestion as Question;
use Service\Pagination\PaginateService as Paginator;
use Service\Initialization\InitializationService as Init;
use Service\Database\DatabaseService as Database;

require_once ('src/Entity/TestAnswer.php');
require_once ('src/Entity/TestQuestion.php');
require_once ('src/Service/PaginateService.php');
require_once ('src/Service/InitializationService.php');
require_once ('src/Service/DatabaseService.php');

class TestsController
{

    public function readAction()
    {
        $questions = array();
        $answers = array();

        $readQuestions = Database::getTestQuestions();
        foreach ($readQuestions as $readQuestion) {
            $question = new Question();

            Init::questionInitAfter($readQuestion, $question);
            array_push($questions, $question);

            $readAnswers = Database::getAllByCriteria(
                'test_answer',
                'question_id',
                $question->getId()
            );

            foreach ($readAnswers as $readAnswer) {
                $answer = new Answer();

                Init::testAnswerInitAfter($readAnswer, $answer);
                array_push($answers, $answer);

                unset($answer);
            }
            unset($question);
        }

        $title = 'Вступний тест';
        $template = 'test';
        $path = '';
        require_once 'app/Resources/view/baseOtherTemplate.php';
    }

    public function checkAction()
    {
        $answers = array();

        for ($number = 1; $number <= 4; $number++) {

            $varName = 'number' . $number;
            $answer['number'] = filter_input(
                INPUT_POST,
                $varName,
                FILTER_SANITIZE_SPECIAL_CHARS
            );

            $varName = 'question' . $number;
            $answer['answer'] = filter_input(
                INPUT_POST,
                $varName,
                FILTER_SANITIZE_SPECIAL_CHARS
            );

            $answerId = Paginator::findThisElement(
                'test_question',
                $answer['number']
            )->answer_id;

            $trueAnswer = Paginator::findThisElement(
                'test_answer',
                $answerId
            );

            $thisAnswer = Paginator::findThisElement(
                'test_answer',
                $answer['answer']
            );

            if ($thisAnswer->result)
                $answer['className'] = 'trueAnswer icon fa-check';
            else
                $answer['className'] = 'falseAnswer icon fa-close';

            $answer['isTrue'] = $thisAnswer->result;
            $answer['thisAnswer'] = $thisAnswer->formulation;
            $answer['trueAnswer'] = $trueAnswer->formulation;
            array_push($answers, $answer);
        }

        $title = 'Результати тестування';
        $template = 'result';
        $path = '';
        require_once 'app/Resources/view/baseOtherTemplate.php';
    }

}