<?php

namespace Service\Initialization;

use Entity\Topic\Topic;
use Entity\Paragraph\Paragraph;
use ORM;

class InitializationService
{

    /**
     * @param ORM $orm
     * @param Topic $topic
     */
    public static function topicInitAfter($orm, $topic)
    {
        $topic->setId($orm->id);
        $topic->setName($orm->name);
        $topic->setDescription($orm->description);
    }

    /**
     * @param Topic $topic
     * @param array $params
     */
    public static function topicInitBefore($topic, $params)
    {
        $topic->setName($params['name']);
        $topic->setDescription($params['description']);
    }

    /**
     * @param ORM $orm
     * @param Paragraph $paragraph
     */
    public static function paragraphInitAfter($orm, $paragraph)
    {
        $paragraph->setId($orm->id);
        $paragraph->setTitle($orm->title);
        $paragraph->setContent($orm->content);
        $paragraph->setExample($orm->example_id);
        $paragraph->setImg($orm->img);
        $paragraph->setTopic($orm->topic_id);
    }

    /**
     * @param Paragraph $paragraph
     * @param array $params
     */
    public static function paragraphInitBefore($paragraph, $params)
    {
        $paragraph->setTitle($params['title']);
        $paragraph->setContent($params['content']);
        $paragraph->setExample($params['example']);
        $paragraph->setImg($params['img']);
        $paragraph->setTopic($params['topic']);
    }
}