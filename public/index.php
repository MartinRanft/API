<?php

echo __DIR__;

require __DIR__ . '/../vendor/autoload.php';
require_once( __DIR__ .  "/../DB.php");



use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$responseFactory = new \Laminas\Diactoros\ResponseFactory();


$container = new League\Container\Container; 
$container->add(Acme\SomeController::class)->addArgument(Acme\TemplateRenderer::class); 
$container->add(Acme\TemplateRenderer::class);
$container->add(DB("95.217.163.190:6603", "hws", "hws", "DV8tnYKJTvcCm5QS"));

$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);
$router   = (new League\Route\Router)->setStrategy($strategy);



// map a route
$router->map('GET', '/', function (ServerRequestInterface $request) : array {
    $db = new DB("95.217.163.190:6603", "hws", "hws", "DV8tnYKJTvcCm5QS");
    
    $testdata = $db->query('SELECT name FROM test');

    return [
        'title'   => $testdata,
        'version' => 1,
    ];
});


// map a route
$router->map('GET', '/test', function (ServerRequestInterface $request) : array {
    
    

    
    return 
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