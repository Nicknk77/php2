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
            <h4><a href="/article.php?id=<?php echo $article->id; ?>"><?php echo $article->header; ?></a></h4>
            <div class="text">
                <?php echo strip_tags(mb_substr($article->text, 0, 400) . '...'); ?>
            </div>
        </div>

    <?php endforeach; ?>

</div>

</body>
</html>