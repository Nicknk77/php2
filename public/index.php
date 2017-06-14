<?php
require __DIR__ . '/autoload.php';

use App\View;
use App\Models\Article;

$view = new View();

$view->news = Article::findLatest(3);

$view->display(__DIR__ . '/templates/index.php');