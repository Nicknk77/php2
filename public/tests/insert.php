<?php
require __DIR__ . '/../autoload.php';

$article = new \App\Models\Article();

$article->date = date('Y-m-d');
$article->author = '000';
$article->header = '000';
$article->textPreview = '000';
$article->text = '000000';

$article->insert();