<?php

namespace Service\Pagination;


use ORM;

class PaginateService
{



    /**
     * @param $table
     * @param $id
     * @return bool|ORM
     */
    public static function findThisElement($table, $id)
    {
        $element = ORM::forTable($table)
            ->where('id', $id)
            ->findOne();

        return $element;
    }

    /**
     * @param string $table
     * @param int $id
     * @param string $criteria
     * @param int $value
     * @return bool|ORM
     */
    public static function findThisElementByCriteria($table, $id, $criteria, $value)
    {
        $element = ORM::forTable($table)
            ->where(array(
                'id' => $id,
                $criteria => $value
            ))
            ->findOne();
        return $element;
    }

    /**
     * @param string $table
     * @param int $id
     * @return mixed
     */
    public static function findLastElement($table, $id)
    {
        $element = ORM::forTable($table)
            ->where_lt('id', $id)
            ->orderByDesc('id')
            ->findOne();

        return $element;
    }

    /**
     * @param string $table
     * @param int $id
     * @param string $criteria
     * @param int $value
     * @return bool|ORM
     */
    public static function findLastElementByCriteria($table, $id, $criteria, $value)
    {
        $element = ORM::forTable($table)
            ->where_lt('id', $id)
            ->where($criteria, $value)
            ->orderByDesc('id')
            ->findOne();

        return $element;
    }

    /**
     * @param string $table
     * @param int $id
     * @return mixed
     */
    public static function findNextElement($table, $id)
    {
        $element = ORM::forTable($table)
            ->where_gt('id', $id)
            ->orderByAsc('id')
            ->findOne();

        return $element;
    }

    /**
     * @param string $table
     * @param int $id
     * @param string $criteria
     * @param int $value
     * @return bool|ORM
     */
    public static function findNextElementByCriteria($table, $id, $criteria, $value)
    {
        $element = ORM::forTable($table)
            ->where_gt('id', $id)
            ->where($criteria, $value)
            ->orderByAsc('id')
            ->findOne();

        return $element;
    }
}