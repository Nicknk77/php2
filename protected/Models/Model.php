<?php

namespace App\Models;

use App\Db;

abstract class Model
{
    protected static $table = null;

    public $id;

    public static function findAll(): array
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC';

        $db = new Db();
        $data = $db->query($sql, static::class);
        if (empty($data)){
            return false;
        }
        return $data;
    }

    public static function findLatest(int $count): array
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $count;

        $db = new Db();
        $data = $db->query($sql, static::class);
        if (empty($data)){
            return false;
        }
        return $data;
    }

    public static function findById(int $id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $params = [
            ':id' => $id
        ];

        $db = new Db();
        $data = $db->query($sql, static::class, $params);
        if (empty($data)){
            return false;
        }
        return array_shift($data);
    }

    public function insert(): bool
    {
        $data = get_object_vars($this);
        unset($data['id']);
        $cols = array_keys($data);
        $params = [];

        foreach ($data as $key => $val){
            $params[':' . $key] = $val;
        }

        $sql =  'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols) . ') VALUES (' . ':' . implode(', :', $cols) . ')';

        $db = new Db();
        $result = $db->execute($sql, $params);
        $this->id = $db->lastInsertId();
        return $result;
    }

    public function update(): bool
    {
        $binds = [];
        $params = [];

        foreach (get_object_vars($this) as $key => $val){
            if ('id' !== $key){
                $binds[] = $key . '=:' . $key;
            }
            $params[':' . $key] = $val;
        }

        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $binds) . ' WHERE id=:id';

        $db = new Db();
        return $db->execute($sql, $params);
    }

    public function save(): bool
    {
        if (empty($this->id)){
            return $this->insert();
        }
        return $this->update();
    }

    public function delete(): bool
    {
        $params = [
            ':id' => $this->id
        ];

        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';

        $db = new Db();
        return $db->execute($sql, $params);
    }
}