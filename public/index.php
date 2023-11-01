<?php
namespace EdiProceda;   

require __DIR__ . '/../vendor/autoload.php';
require '../src/Conemb.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use EdiProceda\Conemb;

// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add routes
$app->post('/', function (Request $request, Response $response) {

    $content = $request->getBody()->getContents();

    if (empty($content)) {
        $response->getBody()->write(json_encode(['message' => 'Content not found.']));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
    }

    $conemb = new Conemb($content);
    $jsonData = json_encode($conemb);

    $response->getBody()->write($jsonData);

    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
});

$app->run();