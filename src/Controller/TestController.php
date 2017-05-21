<?php

use Service\Database\DatabaseService as Database;

require_once ('src/Service/DatabaseService.php');

class TestController
{
    public function test()
    {
        //        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

        $questions = array('ANSWERS' => array());

        $readQuestions = Database::getTestQuestions();
        foreach ($readQuestions as $readQuestion) {
            $question = new Question();

            Init::questionInitAfter($readQuestion, $question);
//            array_push($questions['QUESTION'], $question);
            $questions['QUESTIONS'] = $question;

            unset($question);
        }

        echo "<pre>";
        var_dump($questions);
        echo "</pre>";


//        echo "<pre>";
//        var_dump($questions);
//        echo "</pre>";

//        $title = 'Вступний тест';
//        $template = 'test';
//        $path = '../';
//        require_once 'app/Resources/view/baseOtherTemplate.php';

//        echo "<pre>";
//        var_dump($questions);
//        echo "</pre>";
//        echo "<ul>";
//        foreach ($questions['QUESTIONS'])
//        echo "<ul>";
//        foreach ($answers as $answer) {
//            echo "<li id='answer{$answer->getId()}' class='answer'>" . $answer->getFormulation() . "</li>";
//        }
//        echo "</ul>";
//        echo "</ul>";

    }
}