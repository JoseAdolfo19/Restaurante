<?php 
require_once __DIR__ . '/../config/database.php';


function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// Función para agregar un nuevo cliente
function agregarCliente( $nombre, $correo, $telefono, $direccion) {
    global $tasksCollection;
    $resultado= $tasksCollection->insertOne([
        'nombre' => $nombre,
        'correo' => $correo,
        'telefono' => $telefono,
        'direccion' => $direccion
    ]);
    return $resultado->getInsertedId($cliente);
}

// Función para obtener un cliente por ID
function obtenerClientePorId($id) {
    global $tasksCollection;
    return $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

// Función para obtener todos los clientes
function obtenerCliente() {
    global $tasksCollection;
    return $tasksCollection->find();
}

// Función para actualizar un cliente
function actualizarCliente( $id, $nombre, $correo, $telefono, $direccion) {
    global $tasksCollection;
    $resultado=$tasksCollection->updateOne(
        ['_id'=>new MongoDB\BSON\ObjectId($id)],
        ['$set'=>[
            'nombre' => $nombre,
            'correo' => $correo,
            'telefono' => $telefono,
            'direccion' => $direccion
        ]]
        );
        return $resultado->getModifiedCount();}

// Función para eliminar un cliente
function eliminarCliente( $id) {
    global $tasksCollection;
    $resultado = $tasksCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    return $resultado->getDeletedCount();
}
?>
