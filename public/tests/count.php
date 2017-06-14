<?php
require __DIR__ . '/../autoload.php';

$view = new \App\View();

$view->news = \App\Models\Article::findAll();
$view->authors = \App\Models\Author::findAll();

var_dump(count($view));