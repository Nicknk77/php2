<?php require __DIR__ . '/../autoload.php'; ?>

<hr>Проверка соединения с базой<hr>

<?php
$db = new \App\Db();

var_dump($db);
?>

<hr>Проверка подстановок в запрос<hr>


<?php

$author = 'Селезнева Ольга';

$sql = 'SELECT * FROM news WHERE author=:author';
$params = [
    ':author' => $author
];

$db = new \App\Db();

var_dump($db->query($sql, '\App\Models\Article', $params));