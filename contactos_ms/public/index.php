<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ .'/../app/Config/database.php';

$endpoints = require __DIR__ . '/../app/contactos/Presentation/Routers/endpoints.php';
$endpointsAmigos = require __DIR__ . '/../app/Amigos/Presentation/Routers/endpoints.php';
$AmigosRepositories = require __DIR__ . '/../app/Amigos/Presentation/Repositories/AmigoRepository.php';
$AmigosRepositories = require __DIR__ . '/../app/Amigos/Presentation/Repositories/TestRepository.php';
$AmigoController = require __DIR__ . '/../app/Amigos/Controllers/Amigocontroller.php';
$AmigoModels = require __DIR__ . '/../app/Amigos/Models/Amigo.php';
$app = AppFactory::create();

$endpoints($app);
$endpointsAmigos($app);

$app->run();
