<?php
require __DIR__ . '/../autoload.php';
/*
$article = \App\Models\Article::findById(37);

$article->date = date('Y-m-d');
$article->author = '555';
$article->header = '555';
$article->textPreview = '555';
$article->text = '555555';
*/

$article = new \App\Models\Article();

$article->date = date('Y-m-d');
$article->author = '000';
$article->header = '000';
$article->textPreview = '000';
$article->text = '000000';


var_dump($article->save());