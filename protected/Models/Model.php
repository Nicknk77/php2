<?php

namespace App\Models;

use App\Db;
use App\MagicTrait;
//use App\IteratorTrait;

/*
 * Class Model
 * Класс модели
 *
 * @package App\Models
 *
 * @property int $id
 */
abstract class Model
    //implements \Iterator
{
    protected static $table = null;

    use MagicTrait;
    //use IteratorTrait;

    /*
     * Находит и возвращает все записи из БД
     *
     * @return mixed
     */
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

    /*
     * Находит и возвращает последние записи из БД
     * отсортированные по id в обратном порядке
     *
     * @param int $count
     * @return mixed
     */
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

    /*
     * Находит и возвращает одну запись из БД
     *
     * @param int $id
     * @return mixed
     */
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

    /*
     * Добавляет запись в БД
     *
     * @return bool
     */
    public function insert(): bool
    {
        $cols = [];
        $params = [];
        foreach ($this->data as $key => $val){
            $cols[] = $key;
            $params[':' . $key] = $val;
        }
        $sql =  'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols) . ') VALUES (' . ':' . implode(', :', $cols) . ')';

        $db = new Db();
        $result = $db->execute($sql, $params);
        $this->id = $db->lastInsertId();
        return $result;
    }

    /*
     * Обновляет запись в БД
     *
     * @return bool
     */
    public function update(): bool
    {
        $binds = [];
        $params = [];
        foreach ($this->data as $key => $val){
            if ('id' !== $key){
                $binds[] = $key . '=:' . $key;
            }
            $params[':' . $key] = $val;
        }
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $binds) . ' WHERE id=:id';

        $db = new Db();
        return $db->execute($sql, $params);
    }

    /*
     * Сохраняет запись в БД
     *
     * @return bool
     */
    public function save(): bool
    {
        if (empty($this->id)){
            return $this->insert();
        }
        return $this->update();
    }

    /*
     * Удаляет запись из БД
     *
     * @return bool
     */
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