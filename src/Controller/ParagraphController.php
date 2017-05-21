<?php

use Entity\Paragraph\Paragraph;
use Entity\Topic\Topic;
use Service\Pagination\PaginateService as Paginator;
use Service\Initialization\InitializationService as Init;
use Service\Database\DatabaseService as Database;

require_once ('src/Entity/Topic.php');
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

    public function readAction()
    {
        $id = filter_input(INPUT_GET, 'paragraph', FILTER_SANITIZE_SPECIAL_CHARS);
        $topic = filter_input(INPUT_GET, 'topic', FILTER_SANITIZE_SPECIAL_CHARS);

        $paragraph = new Paragraph();

        $read = Paginator::findThisElementByCriteria($paragraph->getTable(), $id, 'topic_id', $topic);
        $formulas = Database::getAllByCriteria('formula', 'paragraph_id', $id);
        $examples = Database::getAllByCriteria('example', 'paragraph_id', $id);
        Init::paragraphInitAfter($read, $paragraph);

        $imgPosition = array('left', 'right');

        if (!empty($paragraph->getContent()) && !empty($paragraph->getTopic())) {
            $last = Paginator::findLastElementByCriteria($paragraph->getTable(), $id, 'topic_id', $topic);
            $next = Paginator::findNextElementByCriteria($paragraph->getTable(), $id, 'topic_id', $topic);
            require 'app/Resources/view/paragraphTemplate.php';
//
//            if (!empty($formulas)){
//                echo "<ul>";
//                foreach ($formulas as $formula) {
//                    echo "<li>{$formula->formulation}</li>";
//                    $explanations = Database::getExplanationForFormula($formula->id);
//                    if (!empty($explanations)) {
//                        echo "<ul>";
//                        foreach ($explanations as $explanation)
//                            echo "<li>{$explanation->name} {$explanation->units} - {$explanation->content}</li>";
//                        echo "</ul>";
//                    }
//                }
//                echo "</ul>";
//            }
//
//            if (!empty($examples)) {
//                foreach ($examples as $example) {
//                    echo "<div>Дано:<br>{$example->is_given}</div>" .
//                        "<p>{$example->question}" .
//                        "{$example->response}</p>";
//                    echo "</div>";
//                }
//            }

        }
        unset($paragraph);
    }

    public function readAllAction($id) {

        $topic = new Topic();

        $readTopic = Paginator::findThisElement($topic->getTable(), $id);

        Init::topicInitAfter($readTopic, $topic);

        $paragraphs = array();

        $readParagraphs = Database::getAllByCriteria('paragraph', 'topic_id', $id);

        foreach ($readParagraphs as $readParagraph) {
            $paragraph = new Paragraph();

            Init::paragraphInitAfter($readParagraph, $paragraph);
            array_push($paragraphs, $paragraph);

            unset($paragraph);
        }
        session_start();
        if (!empty($_SESSION['name'])) {
            $session = $_SESSION['name'];
        } else {
            $session = '';
        }
        $title = $topic->getId() . "-й роздiл";
        $template = "paragraphs";
        $path = '../../';
        require_once 'app/Resources/view/baseOtherTemplate.php';
    }

}