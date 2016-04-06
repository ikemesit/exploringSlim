<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;



require 'vendor/autoload.php';

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



$app->get('/tickets', function (Request $request, Response $response) {
    // $name = $request->getAttribute('name');
    // $response->getBody()->write("Hello, $name");
    $this->logger->addInfo("Ticket list");
    $mapper = new TicketMapper($this->db);
    $tickets = $mapper->getTickets();

    $response->getBody()->write(var_export($tickets, true));
    return $response;
});
$app->run();