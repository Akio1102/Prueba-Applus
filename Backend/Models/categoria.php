<?php
require_once("../Database/pdo.php");

class Categoria extends Conexion {
    public function __construct(){
        parent::__construct();
    }

    public function getCategorias(): array {
        try {
            $sql = "SELECT c.id, c.name, c.`createdAt`, c.`updatedAt` FROM category c";
            $db = $this->dbCnx->prepare($sql);
            $db->execute();
            $data = $db->fetchAll();
            http_response_code(200);
            return ['msg' => 'Categorías obtenidas exitosamente', 'data' => $data];
        } catch (Exception $e) {
            http_response_code(500);
            return ['msg' => 'Error al obtener las categorías', 'error' => $e->getMessage()];
        }
    }

    public function getCategoriaId(int $id): array {
        try {
            $sql = "SELECT c.id, c.name, c.`createdAt`, c.`updatedAt` FROM category c WHERE id = :id";
            $db = $this->dbCnx->prepare($sql);
            $db->bindParam(":id", $id);
            $db->execute();
            $data = $db->fetchAll();
            if ($data) {
                http_response_code(200);
                return ['msg' => 'Categoría obtenida exitosamente', 'data' => $data];
            } else {
                http_response_code(404);
                return ['msg' => 'Categoría no encontrada'];
            }
        } catch (Exception $e) {
            http_response_code(500);
            return ['msg' => 'Error al obtener la categoría', 'error' => $e->getMessage()];
        }
    }

    public function postCategoria(string $name): array {
        try {
            $sql = "INSERT INTO category (name) VALUES (:name)";
            $db = $this->dbCnx->prepare($sql);
            $db->bindParam(":name", $name);
            $db->execute();
            http_response_code(201);
            return ['msg' => 'Categoría agregada exitosamente'];
        } catch (Exception $e) {
            http_response_code(500);
            return ['msg' => 'Error al agregar la categoría', 'error' => $e->getMessage()];
        }
    }

    public function putCategoria(int $id, string $name): array {
        try {
            $sql = "UPDATE category SET name = :name WHERE id = :id";
            $db = $this->dbCnx->prepare($sql);
            $db->bindParam(":id", $id);
            $db->bindParam(":name", $name);
            $db->execute();
            if ($db->rowCount() > 0) {
                http_response_code(200);
                return ['msg' => 'Categoría modificada exitosamente'];
            } else {
                http_response_code(404);
                return ['msg' => 'Categoría no encontrada'];
            }
        } catch (Exception $e) {
            http_response_code(500);
            return ['msg' => 'Error al modificar la categoría', 'error' => $e->getMessage()];
        }
    }

    public function deleteCategoria(int $id): array {
        try {
            $sql = "DELETE FROM category WHERE id = :id";
            $db = $this->dbCnx->prepare($sql);
            $db->bindParam(":id", $id);
            $db->execute();
            if ($db->rowCount() > 0) {
                http_response_code(200);
                return ['msg' => 'Categoría eliminada exitosamente'];
            } else {
                http_response_code(404);
                return ['msg' => 'Categoría no encontrada'];
            }
        } catch (Exception $e) {
            http_response_code(500);
            return ['msg' => 'Error al eliminar la categoría', 'error' => $e->getMessage()];
        }
    }
}
?>
