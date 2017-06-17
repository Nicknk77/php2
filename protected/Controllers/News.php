<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

/*
 * Class News
 * Класс контроллера News
 *
 * @package App\Controllers
 */
class News
    extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список последних новостей
     */
    protected function actionDefault()
    {
        $this->view->news = Article::findLatest(3);
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }

    /*
     * Метод actionAll
     * Выводит список всех новостей
     */
    protected function actionAll()
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }

    /*
     * Метод actionOne
     * Выводит одну конкретную новость
     */
    protected function actionOne()
    {
        $this->view->article = Article::findById($_GET['id'] ?? null);
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }
}