<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Новости</title>
    <link type="text/css" rel="stylesheet" href="/css/style.css" />
</head>
<body>

<div class="menu">
    <div class="right"><a href="/admin">Администрирование</a></div>
    <div class="left"><a href="/">Главная</a></div>
</div>
<div class="container">
    <div class="news">
        <form action="/admin/delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $this->article->id; ?>">
            <input type="submit" name="delete" class="delete right" value="">
        </form>
        <form action="/admin/update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $this->article->id; ?>">
            <input type="submit" name="update" class="update right" value="">
        </form>
        <form action="/admin/add.php" method="post">
            <input type="submit" name="add" class="add right" value="">
        </form>

        <h4><?php echo $this->article->header; ?></h4>
        <div class="date"><?php echo $this->article->date; ?></div>
        <div class="text"><?php echo $this->article->text; ?></div>
        <div class="author">

            <?php
            if (null !== $this->article->author_id){
                echo $this->article->author->name;
            } else {}
            ?>

        </div>
    </div>
</div>

</body>
</html>