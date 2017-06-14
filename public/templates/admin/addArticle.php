<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Новости</title>
    <link type="text/css" rel="stylesheet" href="/css/style.css" />
</head>
<body>

<div class="container">
    <div class="article">
        <h4>Добавить статью</h4>
        <form action="/admin/add.php" method="post">
            Автор:
            <input type="text" name="author">
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