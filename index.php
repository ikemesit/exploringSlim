<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;



require 'vendor/autoload.php';
require 'post.php';


// Register Classes
spl_autoload_register(function ($classname) {
    require ("classes/" . $classname . ".php");
});

// Turn on Error reporting
$config['displayErrorDetails'] = true;

// DB config
$config['db']['host']   = 'localhost';
$config['db']['user']   = 'root';
$config['db']['pass']   = 'root';
$config['db']['dbname'] = 'scotchbox';


$app = new \Slim\App(["settings" => $config]);

// Create DIC container
$container = $app->getContainer();

// Add monolog
$container['logger'] = function($c){
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

// Add PDO
$container['db'] = function($c){
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};


$app->get('/destination/{id}', function (Request $request, Response $response, $args) {
    
    //$name = $request->getAttribute('name');
    //$response->getBody()->write("Hello, $name");
    $ticket_id = (int)$args['id'];
    //$this->logger->addInfo("Ticket list");
    $mapper = new TicketMapper($this->db);
    $ticket = $mapper->getTicketById($ticket_id);

    $response->getBody()->write(var_export($ticket, true));
    return $response;
});

$app->get('/destinations/', function(Request $request, Response $response){
    $mapper = new DestinationMapper($this->db);
    $destinations = $mapper->getDestinations();
    $json_response = $response->withJson($destinations);
    $response->getBody()->write($json_response);
    return $response;
});

$app->post('/destination/new', $post);



$app->run();