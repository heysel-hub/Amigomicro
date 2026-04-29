<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Config\Database;
use App\Amigos\Presentation\Repositories\AmigoRepository;
use App\Amigos\Controllers\AmigoController;

$db = (new Database())->connect();
$repo = new AmigoRepository($db);
$controller = new AmigoController($repo);

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

switch ($method) {
    case 'GET':
        $id ? $controller->obtenerUno($id) : $controller->obtenerTodos();
        break;

    case 'POST':
        $controller->crear();
        break;

    case 'PUT':
        $controller->actualizar($id);
        break;

    case 'DELETE':
        $controller->eliminar($id);
        break;

    default:
        echo json_encode(["error" => "Método no permitido"]);
}