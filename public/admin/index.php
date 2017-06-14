<?php
require __DIR__ . '/../autoload.php';

use App\View;
use App\Models\Article;

$view = new View();

$view->news = Article::findAll();

$view->display(__DIR__ . '/../templates/admin/index.php');