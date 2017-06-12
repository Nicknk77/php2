<?php

namespace App;

class Config
{
    public $data = [];

    // подключаем trait Singleton
    use Singleton;

    // Делаем конструктор непубличным. Защищаем от создания через new. Конструктор отрабатывает один раз при вызове Config::getInstance();
    private function __construct()
    {
        $this->data = require __DIR__ . '/../config.php';
    }
}