<?php
require_once __DIR__ . '/../vendor/autoload.php';
//$mongoClient = new MongoDB\Client("mongodb+srv://iberico:B2bFPhUf4yqYXgmh@restaurante.hkovi.mongodb.net/?retryWrites=true&w=majority&appName=restaurante");
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient->selectDatabase('restaurante');
$clientesCollection = $database->clientes;
$productoCollection = $database->productos;
$pedidosCollection = $database->pedidos;
?>
