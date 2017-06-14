<?php

namespace App\Models;


class Article
    extends Model
{
    protected static $table = 'news';
    /*
        public $date;
        public $author_id;
        public $header;
        public $text;
    */
    public function __get($name)
    {
        if ($name === 'author' && !empty($this->author_id)){
            $this->data['author'] = Author::findById($this->author_id);
            return $this->data[$name];
        }
    }
}