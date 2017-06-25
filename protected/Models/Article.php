<?php

namespace App\Models;

use App\Logger;
use App\Exceptions\NotFoundException;

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
            $author = Author::findById($this->author_id);
            if (empty($author)) {
                $error = new NotFoundException('Автор не найден!');
                Logger::getInstance()->log($error);
                throw $error;
            }
            return $author;
        }
        return $this->data[$name];
    }
}