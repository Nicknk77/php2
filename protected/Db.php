<?php

namespace App;

use App\Exceptions\DbException;

/*
 * Class Db
 * Класс базы данных
 *
 * @package App
 */
class Db
{
    protected $dbh;

    public function __construct()
    {
        // $config = require __DIR__ . '/config.php';
        $config = Config::getInstance()->data;
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'];
        try {
            $this->dbh = new \PDO($dsn, $config['db']['user'], $config['db']['password']);
        } catch (\PDOException $e) {
            $error = new DbException($e->getMessage(), $e->getCode());
            Logger::getInstance()->log($error);
            throw $error;
        }
    }

    /*
     * Выполняет запрос к БД
     *
     * @param string $sql
     * @param string $class
     * @param array $params
     * @return mixed
     */
    public function query(string $sql, string $class, array $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        } catch (\PDOException $e) {
            $error = new DbException($e->getMessage(), $e->getCode());
            Logger::getInstance()->log($error);
            throw $error;
        }
    }

    /*
     * Выполняет запрос к БД
     *
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = []): bool
    {
        try {
            $sth = $this->dbh->prepare($sql);
            return $sth->execute($params);
        } catch (\PDOException $e) {
            $error = new DbException($e->getMessage(), $e->getCode());
            Logger::getInstance()->log($error);
            throw $error;
        }
    }

    /*
     * Возвращает последний вставленный в БД id
     *
     * @return int
     */
    public function lastInsertId(): int
    {
        return $this->dbh->lastInsertId();
    }
}