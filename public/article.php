<?php
require __DIR__ . '/autoload.php';

use App\Models\Article;

if (empty($_GET['id'])){
    header('Location: /');
    die();
}

$id = (int)$_GET['id'];

$article = Article::findById($id);

include __DIR__ . '/templates/article.php';