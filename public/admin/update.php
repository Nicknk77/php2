<?php
require __DIR__ . '/../autoload.php';

use App\Models\Article;
use App\Models\Author;

if (!isset($_POST['id'], $_POST['author_id'])){
    header('Location: /admin');
    die();
}

$id = (int)$_POST['id'];

if (isset($_POST['update']) && !empty($_POST['id']) && !empty($_POST['header']) && !empty($_POST['text'])){
    $article = Article::findById($id);


    $article->id          = $id;
    $article->date        = $_POST['date'];
    $article->header      = strip_tags(trim($_POST['header']));
    $article->text        = trim($_POST['text']);

    if (empty($_POST['author_id'])){
        $article->author_id = null;
    } else {
        $article->author_id   = (int)($_POST['author_id']);
    }



    //var_dump($_POST);
    var_dump($article);





}



$view = new \App\View();

$view->article = Article::findById($id);

$view->authors = Author::findAll();

$view->display(__DIR__ . '/../templates/admin/updateArticle.php');