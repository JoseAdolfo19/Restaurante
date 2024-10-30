<?php
require_once __DIR__ . '/functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$cliente = obtenerClientePorId($_GET['id']);

if (!$cliente) {
    header("Location: index.php?mensaje=cliente no encontrado");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarCliente($_GET['id'], $_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['direccion']);
    if ($count > 0) {
        header("Location: index.php?mensaje=cliente actualizado con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar al cliente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h1>Editar Cliente</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>
        <label>Correo:</label>
        <input type="email" name="correo" value="<?php echo $cliente['correo']; ?>" required>
        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo $cliente['telefono']; ?>" required>
        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?php echo $cliente['direccion']; ?>" required>
        <button type="submit">Actualizar Cliente</button>
    </form>
</body>
</html>
