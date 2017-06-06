<?php

namespace App\Models;

abstract class Model
{
    protected static $table = null;

    public $id;

    public static function findAll()
    {
        $sql = 'SELECT * FROM ' . static::$table;

        $db = new \App\Db();

        $data = $db->query($sql, static::class);

        if (empty($data)){
            return false;
        }
        return $data;
    }

    public static function findLatest(int $count)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $count;

        $db = new \App\Db();

        $data = $db->query($sql, static::class);

        if (empty($data)){
            return false;
        }
        return $data;
    }

    public static function findById($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $params = [
            ':id' => $id
        ];

        $db = new \App\Db();

        $data = $db->query($sql, static::class, $params);

        if (empty($data)){
            return false;
        }
        return array_shift($data);
    }
}