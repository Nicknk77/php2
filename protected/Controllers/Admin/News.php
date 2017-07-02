<?php

namespace App\Controllers\Admin;

use App\AdminDataTable;
use App\Logger;
use App\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Exceptions\NotFoundException;

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
        $this->view->news = Article::findAllLines();
        $this->view->display(__DIR__ . '/../../../templates/admin/index.php');
    }

    /*
     * Метод actionDefault
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->news = (new AdminDataTable(
            Article::findAll(),
            [
            function($article) {
                return $article->id;
            },
            function($article) {
                return $article->date;
            },
            function($article) {
                return $article->header;
            },
            function($article) {
                return $article->text;
            }
            ]
        ))->render();
        $this->view->display(__DIR__ . '/../../../templates/admin/table.php');
    }

    /*
     * Метод actionOne
     * Выводит одну конкретную новость
     */
    protected function actionOne()
    {
        $news = $this->view->article = Article::findById($_GET['id']);

        if (empty($news)) {
            $exc = new NotFoundException('Новость не найдена!');
            Logger::getInstance()->error($exc);
            throw $exc;
        }

        $this->view->display(__DIR__ . '/../../../templates/admin/article.php');
    }

    /*
     * Метод actionEdit
     * Выводит форму редактирования статьи
     */
    protected function actionEdit()
    {
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
            $this->view->article = Article::findById($id);

            if (empty($this->view->article)) {
                $exc = new NotFoundException('Новость не найдена!');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
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

                if (empty($article)) {
                    $exc = new NotFoundException('Новость не найдена!');
                    Logger::getInstance()->error($exc);
                    throw $exc;
                }

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
        if (empty($this->view->article)) {
            $exc = new NotFoundException('Новость не найдена!');
            Logger::getInstance()->error($exc);
            throw $exc;
        }

        if (true === $this->view->article->delete()) {
            header('Location: /admin/news');
            die();
        }
    }
}