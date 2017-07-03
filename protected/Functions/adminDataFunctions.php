<?php

use App\Models\Article;

return [
    function(Article $article) {
        return $article->id;
    },
    function(Article $article) {
        return $article->date;
    },
    function(Article $article) {
        return $article->header;
    },
    function(Article $article) {
        return $article->text;
    },
    function (Article $article) {
        return (null !== $article->author_id) ? $article->author->name : '';
    }
];