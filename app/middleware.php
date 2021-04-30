<?php
declare(strict_types=1);

use Slim\App;
use App\Application\Middleware\SessionMiddleware;
use Slim\Middleware\ErrorMiddleware;

return function (App $app) {
    $app->add(SessionMiddleware::class);

    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    // Add the Slim built-in routing middleware
    $app->addRoutingMiddleware();

    // Catch exceptions and errors
//    $app->add(ErrorMiddleware::class);
};
