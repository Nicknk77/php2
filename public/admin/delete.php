<?php
require __DIR__ . '/../autoload.php';

use App\Models\Article;

if (isset($_POST['delete']) && !empty($_POST['id'])){

    $id = (int)$_POST['id'];

    $article = Article::findById($id);

    $article->delete();
}
header('Location: /admin');