<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = require __DIR__ . '/config.php';
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $this->dbh = new \PDO($dsn, $config['user'], $config['password']);
    }

    public function query(string $sql, string $class, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $data = $sth->execute($params);
        if (false === $data){
            return false;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute(string $sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $data = $sth->execute($params);
        if (false === $data){
            return false;
        }
        return true;
    }
}