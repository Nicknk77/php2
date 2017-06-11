<?php

namespace App;

trait Singleton
{
    private static $instance = null;
    // Защищаем от создания через new
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
        if (static::$instance === null) {     // если экземпляр данного класса  не создан
            static::$instance = new static();     // создаем экземпляр данного класса
        }
        return static::$instance;             // либо возвращаем экземпляр данного класса
    }
}