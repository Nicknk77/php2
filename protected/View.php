<?php

namespace App;

class View
    implements \Iterator
{
    use Iterator;
    use MagicTrait;

    public function render(string $template)
    {
        foreach ($this as $name => $value) {
            $$name = $value;
        }
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function display(string $template)
    {
        echo $this->render($template);
    }
}