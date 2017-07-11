<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Новости</title>
    <link type="text/css" rel="stylesheet" href="/css/style.css" />
</head>
<body>

<div class="menu">
    <div class="right"><a href="/admin/news">Администрирование</a></div>
    <div class="left"><a href="/news">Главная</a></div>
</div>
<div class="container">
    <a href="/admin/news/edit" class="new block">Создать статью</a>

    <?php
        echo (new \App\AdminDataTable(
            $this->news,
            require __DIR__ . '/../../../protected/Functions/adminDataFunctions.php'))->render(__DIR__ . '/table.php');
    ?>

</div>

</body>
</html>