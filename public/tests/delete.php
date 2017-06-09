<?php
require __DIR__ . '/../autoload.php';

$article = \App\Models\Article::findById(50);

var_dump($article->delete());