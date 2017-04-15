<?php

use Entity\Topic\Topic;
use Service\Pagination\PaginateService as Paginator;
use Service\Initialization\InitializationService as Init;
use Service\Database\DatabaseService as Database;

require_once ('src/Entity/Topic.php');
require_once ('src/Service/PaginateService.php');
require_once ('src/Service/InitializationService.php');
require_once ('src/Service/DatabaseService.php');

class TopicController
{

    public function createAction()
    {
        $name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description',  FILTER_SANITIZE_SPECIAL_CHARS);

        $params = array(
            'name' => $name,
            'description' => $description
        );

        $topic = new Topic();

        Init::topicInitBefore($topic, $params);

        $hasSaved = Database::createTopic($topic);

        if ($hasSaved)
            echo "<h2>Topic has created</h2>";
        else
            echo "<h2>Topic has not created</h2>";

        unset($topic);
    }

    public function readAction($id)
    {
        $topic = new Topic();

        $readTopic = Paginator::findThisElement($topic->getTable(), $id);

        Init::topicInitAfter($readTopic, $topic);

        if (!empty($topic->getName())) {
            echo "<p>Name: {$topic->getName()}</p>" .
                "<br>" .
                "<p>Description: {$topic->getDescription()}</p>";

            $last = Paginator::findLastElement($topic->getTable(), $id);
            $next = Paginator::findNextElement($topic->getTable(), $id);

            if ($last == null)
                echo "<a href='../readNextAction/{$topic->getId()}'>Next</a>";
            else if ($next == null)
                echo "<a href='../readLastAction/{$topic->getId()}'>Last</a>";
            else
                echo "<a href='../readLastAction/{$topic->getId()}'>Last</a> / " .
                    "<a href='../readNextAction/{$topic->getId()}'>Next</a>";
        } else
            echo "<h2>Topic has not found</h2>";

        unset($topic);
    }

    public function readLastAction($id)
    {
        $topic = new Topic();

        $last = Paginator::findLastElement($topic->getTable(), $id);
        Init::topicInitAfter($last, $topic);

        if (!empty($topic->getName())){

            echo "<p>Name: {$topic->getName()}</p>" .
                "<br>" .
                "<p>Description: {$topic->getDescription()}</p>";

                $lastOfLast = Paginator::findLastElement($topic->getTable(), $id - 1);

            if ($lastOfLast != null)
                echo "<a href='../readLastAction/{$topic->getId()}'>Last</a> / " .
                    "<a href='../readNextAction/{$topic->getId()}'>Next</a>";
            else
                echo "<a href='../readNextAction/{$topic->getId()}'>Next</a>";
        } else
            echo "<h2>Topic has not found</h2>";

        unset($topic);
    }

    public function readNextAction($id)
    {
        $topic = new Topic();

        $next = Paginator::findNextElement($topic->getTable(), $id);
        Init::topicInitAfter($next, $topic);

        if (!empty($topic->getName())) {

            echo "<p>Name: {$topic->getName()}</p>" .
                "<br>" .
                "<p>Description: {$topic->getDescription()}</p>";

            $nextOfNext = Paginator::findNextElement($topic->getTable(), $id + 1);

            if ($nextOfNext != null)
                echo "<a href='../readLastAction/{$topic->getId()}'>Last</a> / " .
                    "<a href='../readNextAction/{$topic->getId()}'>Next</a>";
            else
                echo "<a href='../readLastAction/{$topic->getId()}'>Last</a>";
        } else
            echo "<h2>Topic has not found</h2>";

        unset($topic);
    }

    public function readAllAction() {

        $topics = array();

        $readTopics = Database::getAll('topic');

        foreach ($readTopics as $readTopic) {
            $topic = new Topic();

            Init::topicInitAfter($readTopic, $topic);
            array_push($topics, $topic);

            unset($topic);
        }

        foreach ($topics as $topic) {
            echo "<p>" .
                "<strong>Name: </strong>" .
                "<a href='ParagraphController/readAction/{$topic->getId()}'>{$topic->getName()}</a>" .
                "</p>" .
                "<p><strong>Description: </strong> {$topic->getDescription()}</p><hr>";
        }
    }
}