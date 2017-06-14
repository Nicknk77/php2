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
        <h4>Редактировать статью</h4>
        <form action="/admin/update.php" method="post">
            Автор:
            <input type="text" name="author" value="<?php echo $article->author; ?>">
            Заголовок:
            <input type="text" name="header" value="<?php echo $article->header; ?>" required>
            Текст:
            <textarea name="text" required><?php echo $article->text; ?></textarea>
            <input type="hidden" name="id" value="<?php echo $article->id; ?>">
            <input type="submit" name="edit" value="Отправить">
        </form>
    </div>
</div>

</body>
</html>