<?php

use Entity\Section\Section;
use Entity\Task\Task;
use Entity\TaskAnswer\TaskAnswer;
use Service\Pagination\PaginateService as Paginator;
use Service\Initialization\InitializationService as Init;
use Service\Database\DatabaseService as Database;

require_once ('src/Entity/Task.php');
require_once ('src/Entity/Section.php');
require_once ('src/Entity/TaskAnswer.php');
require_once ('src/Service/PaginateService.php');
require_once ('src/Service/InitializationService.php');
require_once ('src/Service/DatabaseService.php');

class TaskController
{
    public function readAction()
    {
        $id = filter_input(INPUT_GET, 'task', FILTER_SANITIZE_SPECIAL_CHARS);
        $sectionId = filter_input(INPUT_GET, 'section', FILTER_SANITIZE_SPECIAL_CHARS);

        $section = new Section();
        $readSection = Paginator::findThisElement($section->getTable(), $sectionId);
        Init::sectionInitAfter($readSection, $section);

        $task = new Task();

        $read = Paginator::findThisElementByCriteria($task->getTable(), $id, 'section_id', $sectionId);
        Init::taskInitAfter($read, $task);

        if (!empty($task->getNum()) && !empty($task->getFormulation())) {
            $last = Paginator::findLastElementByCriteria($task->getTable(), $id, 'section_id', $sectionId);
            $next = Paginator::findNextElementByCriteria($task->getTable(), $id, 'section_id', $sectionId);
            require 'app/Resources/view/taskTemplate.php';

//            echo "<p>Number: {$task->getNum()}</p>" .
//                "<br>" .
//                "<p>Formulation: {$task->getFormulation()}</p>" .
//                "<input type='text' name='answer' placeholder='answer'>" .
//                "<div id='checkAnswer'>Check</div><br>" .
//                "<div id='result'></div><br>";

//            if (empty($last->id) && empty($next->id))
//                echo '';
//            else if (empty($next))
//                echo "<div id='last{$last->id}' class='last'>Last</div>";
//            else if (empty($last))
//                echo "<div id='next{$next->id}' class='next'>Next</div>";
//            else
//                echo "<span id='last{$last->id}' class='last'>Last</span> / " .
//                    "<span id='next{$next->id}' class='next'>Next</span>";
//        } else
//            echo "<h2>Topic has not found</h2>";
//        echo "<hr><div id='goBack'>go back</div>";
        }

        unset($task);
        unset($section);
    }

    public function readAllAction() {
        $sectionId = filter_input(INPUT_GET, 'section', FILTER_SANITIZE_SPECIAL_CHARS);
        $topic = filter_input(INPUT_GET, 'topic', FILTER_SANITIZE_SPECIAL_CHARS);

        $section = new Section();
        $readSection = Paginator::findThisElement($section->getTable(), $sectionId);
        Init::sectionInitAfter($readSection, $section);

        $tasks = array();

        $readTasks = Database::getAllByCriteria('task', 'section_id', $sectionId);

        foreach ($readTasks as $readTask) {
            $task = new Task();

            Init::taskInitAfter($readTask, $task);
            array_push($tasks, $task);

            unset($task);
        }

        require_once 'app/Resources/view/sectionTemplate.php';
        unset($section);
    }

    public function checkAnswerAction()
    {
        $id = filter_input(INPUT_GET, 'task', FILTER_SANITIZE_SPECIAL_CHARS);
        $userAnswer = filter_input(INPUT_GET, 'answer', FILTER_SANITIZE_SPECIAL_CHARS);

        $task = new Task();
        $answer = new TaskAnswer();

        $readTask = Paginator::findThisElement($task->getTable(), $id);
        Init::taskInitAfter($readTask, $task);

        $readAnswer = Paginator::findThisElement($answer->getTable(), $task->getAnswer());
        Init::answerInitAfter($readAnswer, $answer);

        if ($userAnswer == $answer->getAnswer())
            $className = "trueAnswer icon fa-check";
        else
            $className = "falseAnswer icon fa-close";

        require_once 'app/Resources/view/answerDemoTemplate.php';
    }
}