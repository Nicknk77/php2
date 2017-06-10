<?php
require __DIR__ . '/../autoload.php';

$article = new \App\Models\Article();

var_dump($article);
?>

<br><br><br>

<?php
$article->date = date('Y-m-d');
$article->author = '000';
$article->header = '000';
$article->textPreview = '000';
$article->text = '000000';

var_dump($article);
?>

<br><br><br>

<?php
var_dump($article->insert());
?>

<br><br><br>

<?php
var_dump($article);