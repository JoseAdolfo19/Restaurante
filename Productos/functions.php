<?php
require_once '../config/database.php';

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}


function agregarProducto($nombre, $precio, $descripcion, $categoria){
    global $productoCollection;
    $resultado = $productoCollection->insertOne([
        'nombre' => $nombre,
        'precio' => $precio,
        'descripcion' => $descripcion,
        'categoria' => $categoria,
        'disponible'=> false
    ]);
    return $resultado->getInsertedId();
}

function obtenerProductoPorId($id) {
    global $productoCollection;
    return $productoCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]); // Retorna todos los productos
}

function obtenerProducto() {
    global $productoCollection;
    return $productoCollection->find();
}

function actualizarProducto($id, $nombre, $precio, $descripcion, $categoria, $disponible) {
    global $productoCollection;
    $resultado=$productoCollection->updateOne(
        ['_id'=>new MongoDB\BSON\ObjectId($id)],
        ['$set'=>[
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'categoria' => $categoria,
            'disponible'=>$disponible
        ]]
        );
        return $resultado->getModifiedCount();
}

function eliminarProducto($id) {
    global $productoCollection;
    $resultado = $productoCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    return $resultado->getDeletedCount();
}
?>
