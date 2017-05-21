<?php

namespace Service\Initialization;

use Entity\User\User;
use Entity\Section\Section;
use Entity\Task\Task;
use Entity\TaskAnswer\TaskAnswer;
use Entity\Tests\TestAnswer;
use Entity\Tests\TestQuestion;
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

    /**
     * @param ORM $orm
     * @param Section $section
     */
    public static function sectionInitAfter($orm, $section)
    {
        $section->setId($orm->id);
        $section->setPart($orm->part);
        $section->setTopic($orm->topic_id);
    }

    /**
     * @param Section $section
     * @param array $params
     */
    public static function sectionInitBefore($section, $params)
    {
        $section->setPart($params['part']);
        $section->setTopic($params['topic']);
    }

    /**
     * @param ORM $orm
     * @param Task $task
     */
    public static function taskInitAfter($orm, $task)
    {
        $task->setId($orm->id);
        $task->setNum($orm->num);
        $task->setFormulation($orm->formulation);
        $task->setAnswer($orm->answer_id);
        $task->setSection($orm->section_id);
    }

    /**
     * @param Task $task
     * @param array $params
     */
    public static function taskInitBefore($task, $params)
    {
        $task->setNum($params['num']);
        $task->setFormulation($params['formulation']);
        $task->setAnswer($params['answer']);
        $task->setSection($params['section']);
    }

    /**
     * @param ORM $orm
     * @param TaskAnswer $answer
     */
    public static function answerInitAfter($orm, $answer)
    {
        $answer->setId($orm->id);
        $answer->setQuantity($orm->quantity);
        $answer->setAnswer($orm->answer);
    }

    /**
     * @param TaskAnswer $answer
     * @param array $params
     */
    public static function answerInitBefore($answer, $params)
    {
        $answer->setQuantity($params['quantity']);
        $answer->setAnswer($params['answer']);
    }

    /**
     * @param ORM $orm
     * @param TestQuestion $question
     */
    public static function questionInitAfter($orm, $question)
    {
        $question->setId($orm->id);
        $question->setFormulation($orm->formulation);
        $question->setAnswer($orm->answer_id);
        $question->setTopic($orm->topic_id);
    }

    /**
     * @param TestQuestion $question
     * @param array $params
     */
    public static function questionInitBefore($question, $params)
    {
        $question->setFormulation($params['formulation']);
        $question->setAnswer($params['answer']);
        $question->setTopic($params['topic']);
    }

    /**
     * @param ORM $orm
     * @param TestAnswer $answer
     */
    public static function testAnswerInitAfter($orm, $answer)
    {
        $answer->setId($orm->id);
        $answer->setFormulation($orm->formulation);
        $answer->setResult($orm->is_true);
        $answer->setQuestion($orm->question_id);
    }

    /**
     * @param TestAnswer $answer
     * @param array $params
     */
    public static function testAnswerInitBefore($answer, $params)
    {
        $answer->setFormulation($params['formulation']);
        $answer->setResult($params['result']);
        $answer->setQuestion($params['question']);
    }


    /**
     * @param ORM $orm
     * @param User $user
     */
    public static function userInitAfter($orm, $user)
    {
        $user->setId($orm->id);
        $user->setUsername($orm->username);
        $user->setEmail($orm->email);
        $user->setPassword($orm->password);
        $user->setFirstName($orm->first_name);
        $user->setLastName($orm->last_name);
        $user->setCountry($orm->country);
        $user->setCity($orm->city);
        $user->setSchool($orm->school);
        $user->setStudyYear($orm->study_year);
        $user->setTheoryPlace($orm->theory_topic_id);
        $user->setParagraph($orm->paragraph_id);
        $user->setPracticePlace($orm->practice_topic_id);
        $user->setSection($orm->section_id);
    }

    /**
     * @param User $user
     * @param array $params
     */
    public static function userInitBefore($user, $params)
    {
        $user->setUsername($params['username']);
        $user->setEmail($params['email']);
        $user->setPassword($params['password']);
        $user->setFirstName($params['firstName']);
        $user->setLastName($params['lastName']);
        $user->setCountry($params['country']);
        $user->setCity($params['city']);
        $user->setSchool($params['school']);
        $user->setStudyYear($params['studyYear']);
    }

    public static function userInitAfterAuth($orm, $user)
    {
        $user->setUsername($orm->username);
        $user->setEmail($orm->email);
        $user->setPassword($orm->password);
    }

    /**
     * @param User $user
     * @param array $params
     */
    public static function userInitBeforeAuth($user, $params)
    {
        if(strlen($params['username']) > 0)
            $user->setUsername($params['username']);
        else if (strlen($params['email']) > 0)
            $user->setEmail($params['email']);

        $user->setPassword($params['password']);
    }
}