<?php

namespace Service\Database;

use Entity\Paragraph\Paragraph;
use Entity\Topic\Topic;
use ORM;

class DatabaseService
{

    /**
     * @param Topic $topic
     * @return bool
     */
    public static function createTopic($topic)
    {
        $new = ORM::forTable($topic->getTable())->create();

        $new->set('name', $topic->getName());
        $new->set('description', $topic->getDescription());

        $hasSaved = $new->save();

        return $hasSaved;
    }

    /**
     * @param Paragraph $paragraph
     * @return bool
     */
    public static function createParagraph($paragraph)
    {
        $new = ORM::forTable($paragraph->getTable())->create();

        $new->set('title', $paragraph->getTitle());
        $new->set('content', $paragraph->getContent());
        $new->set('example_id', $paragraph->getExample());
        $new->set('img', $paragraph->getImg());
        $new->set('topic_id', $paragraph->getContent());

        $hasSaved = $new->save();

        return $hasSaved;
    }

    /**
     * @param string $table
     * @return array|\IdiormResultSet
     */
    public static function getAll($table)
    {
        $records = ORM::forTable($table)
            ->orderByAsc('id')
            ->findMany();

        return $records;
    }
}