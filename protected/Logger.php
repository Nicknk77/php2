<?php

namespace App;

use App\Traits\Singleton;

class Logger
{
    use Singleton;

    protected $res;

    protected function __construct()
    {
        $config = Config::getInstance()->data;
        $this->res = fopen($config['log']['error'], 'a');
    }

    public function log($error)
    {
        $log = '[' . date('Y-m-d H:i:s') . '] ' . (string)$error . "\n";
        fwrite($this->res, $log);
    }
}