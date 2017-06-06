<?php

namespace App\Models;

class Article
    extends Model
{
    protected static $table = 'news';

    public $date;
    public $author;
    public $header;
    public $textPreview;
    public $text;
}