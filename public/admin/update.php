<?php
require __DIR__ . '/../autoload.php';

use App\Models\Article;
use App\Models\Author;
use App\View;

$id = (int)$_POST['id'];

if (isset($_POST['edit']) && !empty($_POST['id']) && !empty($_POST['header']) && !empty($_POST['text'])){
    $article = Article::findById($id);

    $article->id     = $id;
    $article->date   = date('Y-m-d');
    $article->header = strip_tags(trim($_POST['header']));
    $article->text   = trim($_POST['text']);

    if (!empty($_POST['author_id'])){
        $article->author_id = (int)($_POST['author_id']);
    } else {
        $article->author_id = null;
    }

    $article->save();

    header('Location: /admin/article.php?id=' . $id);
    die();
}

$view = new View();

$view->article = Article::findById($id);

$view->authors = Author::findAll();

$view->display(__DIR__ . '/../templates/admin/updateArticle.php');