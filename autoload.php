<?php

require __DIR__ . '/vendor/autoload.php';

spl_autoload_register(
    function ($class){
        if (0 === strpos($class, 'App')){
            $name = str_replace('\\', '/', substr($class, 4));
            require __DIR__ . '/protected/' . $name . '.php';
        }
    }
);