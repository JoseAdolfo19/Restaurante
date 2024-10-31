<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agregarProducto($_POST['nombre'],$_POST['precio'],$_POST['descripcion'],$_POST['categoria']);
if ($id) {
    header("Location: index.php?mensaje=Producto creado con éxito");
    exit;
} else {
    $error = "No se pudo crear al Producto.";
}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Añadir Producto</title>
</head>
<body>
    <h1>Añadir Nuevo Producto</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" required>
        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea>
        <label>Categoría:</label>
        <input type="text" name="categoria" required>
        <label>Disponible:</label>
        <input type="checkbox" name="disponible">
        <button type="submit">Añadir Producto</button>
    </form>
</body>
</html>
