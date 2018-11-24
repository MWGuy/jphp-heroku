<?php

use php\http\HttpServer;
use php\http\HttpServerRequest;
use php\http\HttpServerResponse;

// Heroku постоянно меняет порт. Его можно получить из переменной $_ENV['PORT']
// В качесте хоста нам нужно передать 0.0.0.0

$server = new HttpServer($_ENV['PORT'], "0.0.0.0");
$server->get("/", function (HttpServerRequest $req, HttpServerResponse $res) {
    $res->charsetEncoding("UTF-8"); // set UTF-8
    $res->body("<h1>Hello Heroku, from JPHP!</h1>");
});

$server->stopAtShutdown(true);
$server->run();