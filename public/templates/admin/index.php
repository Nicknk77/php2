<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Новости</title>
    <link type="text/css" rel="stylesheet" href="/css/style.css" />
</head>
<body>

<div class="container">

    <?php foreach ($news as $article): ?>

        <div class="news">
            <form action="/admin/delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $article->id; ?>">
                <input type="submit" name="delete" class="delete right" value="">
            </form>
            <form action="/admin/update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $article->id; ?>">
                <input type="submit" name="update" class="update right" value="">
            </form>
            <form action="/admin/add.php" method="post">
                <input type="submit" name="add" class="add right" value="">
            </form>

            <h4><a href="/admin/article.php?id=<?php echo $article->id; ?>"><?php echo $article->header; ?></a></h4>
            <div class="text">
                <?php echo strip_tags(mb_substr($article->text, 0, 400) . '...'); ?>
            </div>
        </div>

    <?php endforeach; ?>

</div>

</body>
</html>