<?php
require_once("../Database/pdo.php");
require_once("../Models/categoria.php");

class Producto extends Conexion {
    public function __construct(){
        parent::__construct();
    }

    public function getProductos(): array {
        try {
            $sql = "SELECT p.id, p.code, p.name, p.category_id, p.price, p.`createdAt`, p.`updatedAt` FROM product p";
            $db = $this->dbCnx->prepare($sql);
            $db->execute();
            $data = $db->fetchAll();
            http_response_code(200);
            return ["msg" => "Productos obtenidos exitosamente", "data" => $data];
        } catch (Exception $e) {
            http_response_code(500); 
            return ["msg" => "Error al obtener los productos", "error" => $e->getMessage()];
        }
    }

    public function getProductoId(int $id): array {
        try {
            $sql = "SELECT p.id, p.code, p.name, p.category_id, p.price, p.`createdAt`, p.`updatedAt` FROM product p WHERE id = :id";
            $db = $this->dbCnx->prepare($sql);
            $db->bindParam(":id", $id);
            $db->execute();
            $data = $db->fetchAll();
            if ($data) {
                http_response_code(200);
                return ['msg' => 'Producto obtenido exitosamente', 'data' => $data];
            } else {
                http_response_code(404);
                return ['msg' => 'Producto no encontrado'];
            }
        } catch (Exception $e) {
            http_response_code(500); 
            return ["msg" => "Error al obtener el producto", "error" => $e->getMessage()];
        }
    }

    public function postProducto(string $code, string $name, int $category_id, float $price): array {
        try {
            if (empty(trim($code))) {
                http_response_code(400);
                return ['msg' => 'El código del producto no puede estar vacío'];
            }

            if (empty(trim($name))) {
                http_response_code(400);
                return ['msg' => 'El nombre del producto no puede estar vacío'];
            }

            if (!is_numeric($category_id)) {
                http_response_code(400);
                return ['msg' => 'El ID de categoría debe ser un número entero'];
            }

            if (!is_numeric($price)) {
                http_response_code(400);
                return ['msg' => 'El precio debe ser un número'];
            }

            $categoria = new Categoria();
            $categoriaData = $categoria->getCategoriaId($category_id);
            if (empty($categoriaData)) {
                http_response_code(404);
                return ['msg' => 'Categoría no encontrada'];
            }

            $sql = "INSERT INTO product (code, name, category_id, price) VALUES (:code ,:name, :category_id, :price)";
            $db = $this->dbCnx->prepare($sql);
            $db->bindParam(":code", $code);
            $db->bindParam(":name", $name);
            $db->bindParam(":category_id", $category_id);
            $db->bindParam(":price", $price);
            $db->execute();
            http_response_code(201); 
            return ["msg" => "Producto agregado exitosamente"];
        } catch (Exception $e) {
            http_response_code(500);
            return ["msg" => "Error al agregar el producto", "error" => $e->getMessage()];
        }
    }
    
    public function putProducto(int $id, string $code, string $name, int $category_id, float $price): array {
        try {
            $sql = "UPDATE product SET code = :code, name = :name, category_id = :category_id, price = :price WHERE id = :id";
            $db = $this->dbCnx->prepare($sql);
            $db->bindParam(":id", $id);
            $db->bindParam(":code", $code);
            $db->bindParam(":name", $name);
            $db->bindParam(":category_id", $category_id);
            $db->bindParam(":price", $price);
            $db->execute();
            if ($db->rowCount() > 0) {
                http_response_code(200);
                return ['msg' => 'Producto modificado exitosamente'];
            } else {
                http_response_code(404);
                return ['msg' => 'Producto no encontrado'];
            }
        } catch (Exception $e) {
            http_response_code(500);
            return ["msg" => "Error al modificar el producto", "error" => $e->getMessage()];
        }
    }

    public function deleteProducto(int $id): array {
        try {
            $sql = "DELETE FROM product WHERE id = :id";
            $db = $this->dbCnx->prepare($sql);
            $db->bindParam(":id", $id);
            $db->execute();
            if ($db->rowCount() > 0) {
                http_response_code(200);
                return ['msg' => 'Producto eliminado exitosamente'];
            } else {
                http_response_code(404);
                return ['msg' => 'Producto no encontrado'];
            }
        } catch (Exception $e) {
            http_response_code(500);
            return ["msg" => "Error al eliminar el producto", "error" => $e->getMessage()];
        }
    }
}

?>