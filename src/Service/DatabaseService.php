<?php

namespace Service\Database;

use Entity\Paragraph\Paragraph;
use Entity\Topic\Topic;
use Entity\User\User;
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
     * @param User $user
     * @return bool
     */
    public static function createUser($user)
    {
        $newUser = ORM::forTable($user->getTable())->create();

        $newUser->set('username', $user->getUsername());
        $newUser->set('email', $user->getEmail());
        $newUser->set('password', $user->getPassword());
        $newUser->set('first_name', $user->getFirstName());
        $newUser->set('last_name', $user->getLastName());
        $newUser->set('country', $user->getCountry());
        $newUser->set('city', $user->getCity());
        $newUser->set('school', $user->getSchool());
        $newUser->set('study_year', $user->getStudyYear());

        $hasSaved = $newUser->save();

        return $hasSaved;
    }

    public static function getUserByCriteria($criteria, $value)
    {
        $user = ORM::forTable('user')
            ->where($criteria, $value)
            ->findOne();

        return $user;
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

    /**
     * @param string $table
     * @param string $criteria
     * @param int $value
     * @return array|\IdiormResultSet
     */
    public static function getAllByCriteria($table, $criteria, $value)
    {
        $records = ORM::forTable($table)
            ->where($criteria, $value)
            ->orderByAsc('id')
            ->findMany();

        return $records;
    }

    public static function getTestQuestions()
    {
        $records = ORM::forTable('test_question')
            ->orderByAsc('id')
            ->limit(20)
            ->findMany();

        return $records;
    }

    public static function getExplanationForFormula($formula)
    {
        $records = ORM::forTable('formula_has_explanation')
            ->join('explanation',
                'formula_has_explanation.explanation_id = explanation.id')
            ->where('formula_id', $formula)
            ->findMany();

        return $records;
    }
}