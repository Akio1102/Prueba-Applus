<?php
header("Content-Type: application/json");

require_once("../Models/categoria.php");

$categoria = new Categoria();

$body = json_decode(file_get_contents("php://input"), true);

$op = isset($_GET["op"]) ? $_GET["op"] : null;

switch ($op) {
    case 'GetAll':
        $datos = $categoria->getCategorias();
        break;

    case 'GetId':
        if (isset($body["id"])) {
            $datos = $categoria->getCategoriaId($body["id"]);
        } else {
            $datos = ["error" => "Se requiere un ID para obtener una categoría"];
        }
        break;

    case "Post":
        if (isset($body["name"])) {
            $datos = $categoria->postCategoria($body["name"]);
        } else {
            $datos = ["error" => "Se requiere un nombre para agregar una categoría"];
        }
        break;

    case "Put":
        if (isset($body["id"]) && isset($body["name"])) {
            $datos = $categoria->putCategoria($body["id"], $body["name"]);
        } else {
            $datos = ["error" => "Se requiere un ID y un nombre para modificar una categoría"];
        }
        break;

    case "Delete":
        if (isset($body["id"])) {
            $datos = $categoria->deleteCategoria($body["id"]);
        } else {
            $datos = ["error" => "Se requiere un ID para eliminar una categoría"];
        }
        break;

    default:
        $datos = ["error" => "No se proporciono una operacion valida"];
        break;
}

echo json_encode($datos);
?>