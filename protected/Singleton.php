<?php

namespace App;

trait Singleton
{
    private static $instance = null;
    // Делаем конструктор непубличным. Защищаем от создания через new. Конструктор отрабатывает один раз при вызове Config::getInstance();
    private function __construct()
    {
    }
    // Защищаем от создания через клонирование
    private function __clone()
    {
    }
    // Защищаем от создания через unserialize
    private function __wakeup()
    {
    }
    /*
     * Для того чтобы создать объект нам нужно вызвать статический метод Config::getInstance().
     * Единственной точкой входа в класс является статическая функция getInstance() цель которой – создать первый
     * и единственный экземпляр класса, записав его в переменную $instance.
     * При вызове getInstance() функция создает экземпляр класса, а следовательно задействует механизм конструктора.
     */
    public static function getInstance()    // получаем экземпляр данного класса
    {
        if (self::$instance === null) {     // если экземпляр данного класса  не создан
            self::$instance = new self;     // создаем экземпляр данного класса
        }
        return self::$instance;             // либо возвращаем экземпляр данного класса
    }
}