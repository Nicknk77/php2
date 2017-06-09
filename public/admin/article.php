<?php
require __DIR__ . '/../autoload.php';

if (empty($_GET['id'])){
    header('Location: /');
    die();
}

$id = (int)$_GET['id'];

$article = \App\Models\Article::findById($id);

include __DIR__ . '/../templates/admin/article.php';