<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Новости</title>
    <link type="text/css" rel="stylesheet" href="/css/style.css" />
</head>
<body>

<div class="menu">
    <div class="right"><a href="/admin/news/All">Администрирование</a></div>
    <div class="right center"><a href="/admin/news">Админ-таблица</a></div>
    <div class="left"><a href="/news">Главная</a></div>
</div>
<div class="container">
    <a href="/admin/news/edit" class="new block">Создать статью</a>

    <table class="admin">
        <tr>
            <th>ID</th>
            <th>Дата</th>
            <th>Заголовок</th>
            <th>Текст</th>
            <th colspan="2">Действие</th>
        </tr>

        <?php foreach ($this->news as $row): ?>
        <tr>
            <?php foreach ($row as $cell): ?>
                <td><?php echo $cell; ?></td>
            <?php endforeach; ?>

            <td><a href="/admin/news/edit/?id=<?php echo $row[0]; ?>">Редактировать</a></td>
            <td><a href="/admin/news/delete/?id=<?php echo $row[0]; ?>">Удалить</a></td>
        </tr>

        <?php endforeach;  ?>

    </table>

</div>

</body>
</html>