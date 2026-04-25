<?php

use Slim\App;
use App\Amigos\Presentation\Repositories\TestRepository;
use App\Amigos\Presentation\Repositories\AmigosRepository;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->get('/test', [TestRepository::class, 'hola']);
    $app->post('/crearamigos', [AmigoRepository::class, 'create']);
    $app->get('/Amigos', [AmigoRepository::class, 'all']);
    $app->get('/Amigos/{id}', [AmigoRepository::class, 'detail']);
    $app->put('/Amigos/{id}', [AmigoRepository::class, 'update']);
    $app->delete('/Amigos/{id}', [AmigoRepository::class, 'delete']);
};

   