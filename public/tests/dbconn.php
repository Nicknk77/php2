<?php

require __DIR__ . '/../autoload.php';

$config = new \App\Config;

echo $config->data['db']['dbname'];
?>

<br><br>

<?php

echo $config->data['db']['host'];