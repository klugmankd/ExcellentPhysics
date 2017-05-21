<?php

use Entity\Section\Section;
use Entity\Topic\Topic;
use Service\Pagination\PaginateService as Paginator;
use Service\Initialization\InitializationService as Init;
use Service\Database\DatabaseService as Database;

require_once ('src/Entity/Topic.php');
require_once ('src/Entity/Section.php');
require_once ('src/Service/PaginateService.php');
require_once ('src/Service/InitializationService.php');
require_once ('src/Service/DatabaseService.php');

class SectionController
{
    public function readAllAction($id) {
//        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $topic = new Topic();

        $readTopic = Paginator::findThisElement($topic->getTable(), $id);

        Init::topicInitAfter($readTopic, $topic);

        $sections = array();

        $readSections = Database::getAllByCriteria('section', 'topic_id', $id);

        foreach ($readSections as $readSection) {
            $section = new Section();

            Init::sectionInitAfter($readSection, $section);
            array_push($sections, $section);

            unset($section);
        }
        session_start();
        if (!empty($_SESSION['name'])) {
            $session = $_SESSION['name'];
        } else {
            $session = '';
        }
        $title = $topic->getId() . "-й роздiл";
        $template = "sections";
        $path = '../../';
        require_once "app/Resources/view/baseOtherTemplate.php";
    }
}