<?php
require __DIR__ . '/../autoload.php';

use App\Models\Article;

if (isset($_POST['add']) && !empty($_POST['header']) && !empty($_POST['text'])){
    $article = new Article();

    $article->date        = date('Y-m-d');
    $article->author      = trim($_POST['author']);
    $article->header      = strip_tags(trim($_POST['header']));
    $article->text        = trim($_POST['text']);
    $article->textPreview = strip_tags(mb_substr($article->text, 0, 400) . '...');

    $article->save();

    header('Location: /admin');
}

include __DIR__ . '/../templates/admin/addArticle.php';