<?php

require('../vendor/autoload.php');

$app = new \Slim\Slim();
$app->get('/', function () {
    echo "Powered by " . ($_ENV["POWERED_BY"] ? $_ENV["POWERED_BY"] : "Deis") . "\n";
});
$app->run();

?>
