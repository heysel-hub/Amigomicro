<?php
namespace App\Amigos\Controllers;

class AmigoController {
    private $repo;

    public function __construct($repo) {
        $this->repo = $repo;
    }

    public function crear() {
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode($this->repo->crear($data));
    }

    public function obtenerTodos() {
        echo json_encode($this->repo->obtenerTodos());
    }

    public function obtenerUno($id) {
        echo json_encode($this->repo->obtenerPorId($id));
    }

    public function actualizar($id) {
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode($this->repo->actualizar($id, $data));
    }

    public function eliminar($id) {
        echo json_encode($this->repo->eliminar($id));
    }
}