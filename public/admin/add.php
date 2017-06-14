<?php
require __DIR__ . '/../autoload.php';

use App\Models\Article;
use App\Models\Author;
use App\View;

if (isset($_POST['add']) && !empty($_POST['header']) && !empty($_POST['text'])){
    $article = new Article();

    $article->date        = date('Y-m-d');
    $article->header      = strip_tags(trim($_POST['header']));
    $article->text        = trim($_POST['text']);

    if (!empty($_POST['author_id'])){
        $article->author_id   = (int)($_POST['author_id']);
    }

    $article->save();

    header('Location: /admin');
    die();
}

$view = new View();

$view->authors = Author::findAll();

$view->display(__DIR__ . '/../templates/admin/addArticle.php');