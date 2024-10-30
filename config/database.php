<?php
require_once __DIR__ . '/../vendor/autoload.php';
$mongoClient = new MongoDB\Client("mongodb+srv://iberico:B2bFPhUf4yqYXgmh@restaurante.hkovi.mongodb.net/?retryWrites=true&w=majority&appName=restaurante");
$database = $mongoClient->selectDatabase('restaurante');
$tasksCollection = $database->restaurante;
?>
