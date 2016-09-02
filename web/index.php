<?php
require('../vendor/autoload.php');
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app = new Slim\App();

// This endppint returns 200 for kubernetes healthchecks.
$app->get('/healthz', function (ServerRequestInterface $request, ResponseInterface $response) {
    return $response->withStatus(200);
});
$app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
    $powered = isset($_ENV["POWERED_BY"]) ? $_ENV['POWERED_BY'] : "Deis";
    $container = trim(exec('hostname') ?: "unknown");
    $release = isset($_ENV["WORKFLOW_RELEASE"]) ? $_ENV['WORKFLOW_RELEASE'] : "unknown";
    return $response->withStatus(200)->write("Powered by $powered\nRelease $release on $container\n");
});
$app->run();

?>
