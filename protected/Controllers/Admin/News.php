<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Article;
use App\Models\Author;

/*
 * Class Admin\News
 * Класс контроллера админ-панели News
 *
 * @package App\Controllers\Admin
 */
class News
    extends Controller
{
    /*
     * Метод actionAll
     * Выводит список всех новостей
     */
    protected function actionAll()
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../../../templates/admin/index.php');
    }

    /*
     * Метод actionOne
     * Выводит одну конкретную новость
     */
    protected function actionOne()
    {
        $this->view->article = Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../../templates/admin/article.php');
    }

    /*
     * Метод actionEdit
     * Выводит форму редактирования статьи
     */
    protected function actionEdit()
    {
        if (false === $this->isNew()) {
            $id = (int)$_GET['id'];
            $this->view->article = Article::findById($id);
        }
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../../templates/admin/editArticle.php');
    }

    /*
     * Метод actionSave
     * Сохраняет статью в БД
     */
    protected function actionSave()
    {
        if (isset($_POST['edit']) && !empty($_POST['header']) && !empty($_POST['text'])){
            if (!empty($_POST['id'])) {
                $id = (int)$_POST['id'];
                $article = Article::findById($id);
                $article->id = $id;
            } else {
                $article = new Article();
            }

            $article->date   = date('Y-m-d');
            $article->header = strip_tags(trim($_POST['header']));
            $article->text   = trim($_POST['text']);

            if (!empty($_POST['author_id'])){
                $article->author_id = (int)($_POST['author_id']);
            } else {
                $article->author_id = null;
            }

            if (true === $article->save()) {
                header('Location: /admin/news/');
                die();
            }
        }
    }

    /*
     * Метод actionDelete
     * Удаляет новость из БД
     */
    protected function actionDelete()
    {
        $this->view->article = Article::findById($_GET['id'] ?? null);
        if (true === $this->view->article->delete()) {
            header('Location: /admin/news');
            die();
        }
    }
}