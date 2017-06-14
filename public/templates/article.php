<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Новости</title>
    <link type="text/css" rel="stylesheet" href="/css/style.css" />
</head>
<body>



<?php

var_dump($article->id);




?>









<div class="container">
    <div class="news">
        <h4><?php echo $article->header; ?></h4>
        <div class="date"><?php echo $article->date; ?></div>
        <div class="text"><?php echo $article->text; ?></div>
        <div class="author"><?php echo $article->author->name; ?></div>
    </div>
</div>

</body>
</html>