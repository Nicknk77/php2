<?php require __DIR__ . '/../autoload.php'; ?>

    <hr>Проверка поиска одной новости по Id<hr>

<?php
$data1 = \App\Models\Article::findById(4);

var_dump($data1);
?>

    <hr>Проверка поиска одной новости по не существующему Id<hr>

<?php
$data2 = \App\Models\Article::findById(7);

var_dump($data2);