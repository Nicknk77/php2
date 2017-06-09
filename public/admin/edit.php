<?php
require __DIR__ . '/../autoload.php';

use App\Models\Article;

$id = (int)$_POST['id'];

$article = Article::findById($id);

if (isset($_POST['edit']) && !empty($_POST['id']) && !empty($_POST['header']) && !empty($_POST['text'])){



    $article->id          = $id;
    $article->date        = date('Y-m-d');
    $article->author      = trim($_POST['author']);
    $article->header      = strip_tags(trim($_POST['header']));
    $article->text        = trim($_POST['text']);
    $article->textPreview = strip_tags(mb_substr($article->text, 0, 400) . '...');

    $article->save();

    header('Location: /admin');
}

include __DIR__ . '/../templates/admin/editArticle.php';