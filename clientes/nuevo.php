<?php
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agregarCliente($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['direccion']);
    if ($id) {
        header("Location: index.php?mensaje=Cliente creado con éxito");
        exit;
    } else {
        $error = "No se pudo crear al Cliente.";
    }
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Añadir Cliente</title>
</head>
<body>
    <h1>Añadir Cliente</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>
        <label>Correo:</label>
        <input type="email" name="correo" required><br><br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" required><br><br>
        <label>Dirección:</label>
        <input type="text" name="direccion" required><br><br>
        <button type="submit">Añadir Cliente</button>
    </form>
</body>
</html>
