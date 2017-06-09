<?php
require __DIR__ . '/autoload.php';

use App\Models\Article;

$news = Article::findLatest(3);

include __DIR__ . '/templates/index.php';