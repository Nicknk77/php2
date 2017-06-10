<?php
require __DIR__ . '/../autoload.php';

var_dump(\App\Config::getInstance()->data['db']['dbname']);
?>

<br><br><br>

<?php
var_dump(\App\Config::getInstance()->data['db']['host']);