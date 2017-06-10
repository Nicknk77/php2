<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        // $config = require __DIR__ . '/config.txt';
        $config = Config::getInstance()->data;
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'];
        $this->dbh = new \PDO($dsn, $config['db']['user'], $config['db']['password']);
    }

    public function query(string $sql, string $class, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($params);
        if (false === $result){
            return false;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastInsertId(): int
    {
        return $this->dbh->lastInsertId();
    }
}