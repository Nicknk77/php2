<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Новости</title>
    <link type="text/css" rel="stylesheet" href="/css/style.css" />
</head>
<body>

<div class="container">
    <div class="news">
        <form action="/admin/delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $article->id; ?>">
            <input type="submit" name="delete" class="delete right" value="">
        </form>
        <form action="/admin/update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $article->id; ?>">
            <input type="hidden" name="author_id" value="<?php echo $article->author_id; ?>">
            <input type="submit" name="update" class="update right" value="">
        </form>
        <form action="/admin/add.php" method="post">
            <input type="submit" name="add" class="add right" value="">
        </form>

        <h4><?php echo $article->header; ?></h4>
        <div class="date"><?php echo $article->date; ?></div>
        <div class="text"><?php echo $article->text; ?></div>
        <div class="author">

            <?php
            if (null !== $article->author){
                echo $article->author->name;
            }
            ?>

        </div>
    </div>
</div>

</body>
</html>