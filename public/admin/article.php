<?php
require __DIR__ . '/../autoload.php';

use App\View;
use App\Models\Article;

if (empty($_GET['id'])){
    header('Location: /');
    die();
}

$id = (int)$_GET['id'];

$view = new View();

$view->article = Article::findById($id);

$view->display(__DIR__ . '/../templates/admin/article.php');