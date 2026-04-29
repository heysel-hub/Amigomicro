<?php
require_once "../../Config/database.php";
require_once "../Models/Amigo.php";
require_once "../Presentation/Repositories/AmigoRepository.php";
require_once "../Controllers/AmigoController.php";

$db = (new Database())->connect();
$repo = new AmigoRepository($db);
$controller = new AmigoController($repo);

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

switch ($method) {
    case 'GET':
        if ($id) {
            $controller->obtenerUno($id);
        } else {
            $controller->obtenerTodos();
        }
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