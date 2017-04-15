<?php

use Entity\Paragraph\Paragraph;
use Service\Pagination\PaginateService as Paginator;
use Service\Initialization\InitializationService as Init;
use Service\Database\DatabaseService as Database;

require_once ('src/Entity/Paragraph.php');
require_once ('src/Service/PaginateService.php');
require_once ('src/Service/InitializationService.php');
require_once ('src/Service/DatabaseService.php');

class ParagraphController
{

    public function createAction()
    {
        $title = filter_input(INPUT_POST, 'title',  FILTER_SANITIZE_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content',  FILTER_SANITIZE_SPECIAL_CHARS);
        $example = filter_input(INPUT_POST, 'example',  FILTER_SANITIZE_SPECIAL_CHARS);
        $img = filter_input(INPUT_POST, 'img',  FILTER_SANITIZE_SPECIAL_CHARS);
        $topic = filter_input(INPUT_POST, 'topic',  FILTER_SANITIZE_SPECIAL_CHARS);

        $params = array(
            'title' => $title,
            'content' => $content,
            'example' => $example,
            'img' => $img,
            'topic' => $topic
        );

        $paragraph = new Paragraph();

        Init::paragraphInitBefore($paragraph, $params);

        $hasSaved = Database::createParagraph($paragraph);

        if ($hasSaved)
            echo "<h2>Paragraph has created</h2>";
        else
            echo "<h2>Paragraph has not created</h2>";

        unset($paragraph);
    }

    public function readAction($id)
    {
        $paragraph = new Paragraph();

        $read = Paginator::findThisElementByCriteria($paragraph->getTable(), $id, 'topic_id', 1);

        Init::paragraphInitAfter($read, $paragraph);

        if (!empty($paragraph->getContent()) && !empty($paragraph->getTopic())) {
            echo "<p>Title: {$paragraph->getTitle()}</p>" .
                "<br>" .
                "<p>Content: {$paragraph->getContent()}</p>";

            $last = Paginator::findLastElementByCriteria($paragraph->getTable(), $id, 'topic_id', 1);
            $next = Paginator::findNextElementByCriteria($paragraph->getTable(), $id, 'topic_id', 1);

            if ($last == null)
                echo "<a href='../readNextAction/{$paragraph->getId()}'>Next</a>";
            else if ($next == null)
                echo "<a href='../readLastAction/{$paragraph->getId()}'>Last</a>";
            else if ($last == null && $next == null)
                echo '';
            else
                echo "<a href='../readLastAction/{$paragraph->getId()}'>Last</a> / " .
                    "<a href='../readNextAction/{$paragraph->getId()}'>Next</a>";
        } else
            echo "<h2>Topic has not found</h2>";

        unset($paragraph);
    }

    public function readLastAction($id)
    {
        $paragraph = new Paragraph();

        $last = Paginator::findLastElement($paragraph->getTable(), $id);
        Init::paragraphInitAfter($last, $paragraph);

        if (!empty($paragraph->getContent()) && !empty($paragraph->getTopic())) {

            echo "<p>Title: {$paragraph->getTitle()}</p>" .
                "<br>" .
                "<p>Content: {$paragraph->getContent()}</p>";

            $lastOfLast = Paginator::findLastElement($paragraph->getTable(), $id - 1);

            if ($lastOfLast != null)
                echo "<a href='../readLastAction/{$paragraph->getId()}'>Last</a> / " .
                    "<a href='../readNextAction/{$paragraph->getId()}'>Next</a>";
            else
                echo "<a href='../readNextAction/{$paragraph->getId()}'>Next</a>";
        } else
            echo "<h2>Topic has not found</h2>";

        unset($paragraph);
    }

    public function readNextAction($id)
    {
        $paragraph = new Paragraph();

        $next = Paginator::findNextElement($paragraph->getTable(), $id);
        Init::paragraphInitAfter($next, $paragraph);

        if (!empty($paragraph->getContent()) && !empty($paragraph->getTopic())) {

            echo "<p>Title: {$paragraph->getTitle()}</p>" .
                "<br>" .
                "<p>Content: {$paragraph->getContent()}</p>";

            $nextOfNext = Paginator::findNextElement($paragraph->getTable(), $id + 1);

            if ($nextOfNext != null)
                echo "<a href='../readLastAction/{$paragraph->getId()}'>Last</a> / " .
                    "<a href='../readNextAction/{$paragraph->getId()}'>Next</a>";
            else
                echo "<a href='../readLastAction/{$paragraph->getId()}'>Last</a>";
        } else
            echo "<h2>Topic has not found</h2>";

        unset($paragraph);
    }

    public function readAllAction() {

        $topics = array();

        $readTopics = Database::getAll('paragraph');

        foreach ($readTopics as $readTopic) {
            $topic = new Topic();

            Init::topicInitAfter($readTopic, $topic);
            array_push($topics, $topic);

            unset($topic);
        }

        foreach ($topics as $topic) {
            echo "<p>" .
                "<strong>Name: </strong>" .
                "<a href='readAction/{$topic->getId()}'>{$topic->getName()}</a>" .
                "</p>" .
                "<p><strong>Description: </strong> {$topic->getDescription()}</p><hr>";
        }
    }
}