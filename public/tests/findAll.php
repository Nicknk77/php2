<?php require __DIR__ . '/../autoload.php'; ?>

    <hr>Проверка поиска всех новостей с помощью статического метода<hr>

<?php
$data1 = \App\Models\Article::findAll();

var_dump($data1);