<?php
require __DIR__ . '/../autoload.php';

// вывод автора с шаблоне

$view = new \App\View();

$view->news = \App\Models\Article::findById(4);

$view->display(__DIR__ . '/authorView.php');