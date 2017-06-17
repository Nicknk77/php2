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
    <div class="article">
        <h4>Добавить статью</h4>
        <form action="/admin/news/add" method="post">
            Автор:
            <select name="author_id">
                <option value=""></option>

                <?php foreach ($this->authors as $author): ?>

                    <option value="<?php echo $author->id; ?>"><?php echo $author->name; ?></option>

                <?php endforeach; ?>

            </select>
            Заголовок:
            <input type="text" name="header" required>
            Текст:
            <textarea name="text" required></textarea>
            <input type="submit" name="add" value="Отправить">
        </form>

    </div>
</div>

</body>
</html>