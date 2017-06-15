<?php

namespace App;

/*
 * Class View
 * Класс представления
 *
 * @package App
 */
class View
    implements \Iterator, \Countable
{
    use IteratorTrait;
    use MagicTrait;

    /*
     * Возвращает строку - HTML-код шаблона
     *
     * @param string $template
     */
    public function render(string $template)
    {
        ob_start();
        //foreach ($this->data as $name => $value) {
        //    $$name = $value;
        //}
        include $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    /*
     * Возвращает строку - HTML-код шаблона
     * Данный метод я принес в виде багажа с php-1
     * Пользуюсь - не нарадуюсь
     *
     * @param string $template
     */
    public function display(string $template)
    {
        echo $this->render($template);
    }

    /*
     * Возвращает количество элементов
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->data);
    }
}