<?php
namespace App\Amigos\Presentation\Repositories;

use PDO;

class AmigoRepository {
    private $conn;
    private $table = "amigos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crear($data) {
        $sql = "INSERT INTO {$this->table} (nombre, apodo, telefono, email)
                VALUES (:nombre, :apodo, :telefono, :email)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function obtenerTodos() {
        return $this->conn->query("SELECT * FROM {$this->table}")
                          ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $data) {
        $data['id'] = $id;
        $sql = "UPDATE {$this->table}
                SET nombre=:nombre, apodo=:apodo, telefono=:telefono, email=:email
                WHERE id=:id";
        return $this->conn->prepare($sql)->execute($data);
    }

    public function eliminar($id) {
        return $this->conn->prepare("DELETE FROM {$this->table} WHERE id=?")
                          ->execute([$id]);
    }
}