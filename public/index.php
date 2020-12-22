<?php
define('ROOT', __DIR__.'/../');

require_once(ROOT.'vendor/autoload.php');
require_once(ROOT.'DB.php');

require_once(ROOT.'controller/test.php');

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$responseFactory = new \Laminas\Diactoros\ResponseFactory();

$container = new League\Container\Container;

$container->add('DB', DB::class)
    ->addArguments(["95.217.163.190:6603", "hws", "hws", "DV8tnYKJTvcCm5QS"]);

$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);
$router   = (new League\Route\Router)->setStrategy($strategy);

// map a route
$router->map('GET', '/', HWS\Controller\TestController::class);

// map a route
$router->map('GET', '/test', function (ServerRequestInterface $request) : array {
    return [
        'title'   => $testdata,
        'version' => 1,
    ];
});

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);



/*
$database = new Database();

$db = $database->getConnection();


if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if ($_GET['url'] == "student") {
        
        

    }   
    // get schüler
    // get ausbilder
    // get ausbilder bei schüle
    // get betriebe
    // get betriebe bei schüle
            
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // add schüler 
    // add ausbilder 
    // add betriebe 
   
} else if ($_SERVER['REQUEST_METHOD'] == "PUT") {

    // edit schüler by id
    // edit ausbilder by id
    // edit betriebe by id
    
} else if ($_SERVER['REQUEST_METHOD'] == "DELETE") {

    // delete schüler by id
    // delete ausbilder by id
    // delete betriebe by id

} else {
    http_response_code(405);
}
?>*/