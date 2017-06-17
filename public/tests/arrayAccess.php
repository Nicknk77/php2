<?php
require __DIR__ . '/../autoload.php';

use App\View;
use App\Models\Article;
use App\Models\Author;

$view = new View();

$view->news = Article::findAll();
var_dump($view['news']);
?>

<br><br><br>

<?php

$view['author'] = Author::findById(2);
var_dump($view->author);