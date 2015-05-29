<?php

require('../vendor/autoload.php');

$app = new \Slim\Slim();
$app->get('/', function () {
    $container = trim(exec('hostname') ?: "unknown");
    echo "Powered by " . (isset($_ENV["POWERED_BY"]) ? $_ENV['POWERED_BY'] : "Deis!") . "\n";
    echo "Running on container ID " . $container . "\n";
});
$app->run();

?>
