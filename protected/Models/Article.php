<?php

namespace App\Models;

/*
 * Class Article
 * Модель статьи
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $date
 * @property int $author_id
 * @property string $header
 * @property Author $text
 */
class Article
    extends Model
{

    protected static $table = 'news';

    public function __get($name)
    {
        if ($name === 'author' && null !== $this->author_id){
            return Author::findById($this->author_id);
        }
        return $this->data[$name];
    }
}