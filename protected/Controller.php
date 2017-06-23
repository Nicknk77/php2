<?php

namespace App;

/*
 * Class Controller
 * Класс контроллера
 *
 * @package App
 *
 * @property $view
 */
abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /*
     * Метод access
     * Устанавливает "флаг" доступа
     */
    protected function access($action)
    {
        return true;
    }

    /*
     * Метод action
     * Проверяет доступ и формирует полное имя action
     */
    public function action(string $name)
    {
        if ($this->access($name)) {
            $methodName = 'action' . $name;

            if (method_exists($this, $methodName)) {
                $this->$methodName();
            } else {
                http_response_code(404);
                die('Метод не найден!');
            }

        } else {
            http_response_code(403);
            die('Доступ запрещен!');
        }
    }

    public function isNew() {
        if (empty($_GET['id'])) {
            return true;
        }
        return false;
    }
}