<?php
require __DIR__ . '/../autoload.php';

$article = \App\Models\Article::findById(48);

$article->date = date('Y-m-d');
$article->author = '555';
$article->header = '555';
$article->textPreview = '555';
$article->text = '555555';

var_dump($article->update());