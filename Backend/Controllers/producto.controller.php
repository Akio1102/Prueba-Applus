<?php
header("Content-Type: application/json");

require_once("../Models/producto.php");

$producto = new Producto();

$body = json_decode(file_get_contents("php://input"), true);

$op = isset($_GET["op"]) ? $_GET["op"] : null;

switch ($op) {
    case 'GetAll':
        $datos = $producto->getProductos();
        break;

    case 'GetId':
        if (isset($body["id"])) {
            $datos = $producto->getProductoId($body["id"]);
        } else {
            $datos = ["error" => "Se requiere un ID para obtener una Producto"];
        }
        break;

    case "Post":
        if (isset($body["code"]) && isset($body["name"]) && isset($body["category_id"]) && isset($body["price"])) {
            $datos = $producto->postProducto($body["code"], $body["name"], $body["category_id"], $body["price"]);
        } else {
            $datos = ["error" => "Se requiere un nombre para agregar una Producto"];
        }
        break;

    case "Put":
        if (isset($body["id"]) && isset($body["code"]) && isset($body["name"]) && isset($body["category_id"]) && isset($body["price"])) {
            $datos = $producto->putProducto($body["id"], $body["code"], $body["name"], $body["category_id"], $body["price"]);
        } else {
            $datos = ["error" => "Se requiere un ID y un nombre para modificar una Producto"];
        }
        break;

    case "Delete":
        if (isset($body["id"])) {
            $datos = $producto->deleteProducto($body["id"]);
        } else {
            $datos = ["error" => "Se requiere un ID para eliminar un Producto"];
        }
        break;

    default:
        $datos = ["error" => "No se proporciono una operacion valida"];
        break;
}

echo json_encode($datos);
?>