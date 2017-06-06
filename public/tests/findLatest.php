<?php require __DIR__ . '/../autoload.php'; ?>

    <hr>Проверка поиска последних новостей с помощью статического метода<hr>

<?php
$data1 = \App\Models\Article::findLatest(2);

var_dump($data1);