<?php

namespace App;

use App\View;

/*
 * Class AdminDataTable
 * Класс админ-панели
 *
 * @package App
 */
class AdminDataTable
{
    protected $models;
    protected $functions;

    public function __construct(array $models, array $functions)
    {
        $this->models    = $models;
        $this->functions = $functions;
    }

    public function render($template)
    {
        $view = new View();

        $view->models    = $this->models;
        $view->functions = $this->functions;

        return $view->render($template);
    }
}