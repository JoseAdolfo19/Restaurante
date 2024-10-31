<?php
require_once 'functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$producto =obtenerProductoPorId($_GET['id']);
if (!$producto) {
    header("Location: index.php?mensaje=producto no encontrado");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarProducto($_GET['id'],
        $_POST['nombre'],
        $_POST['precio'],
        $_POST['descripcion'],
        $_POST['categoria'],
        isset($_POST['disponible']));
    if ($count > 0) {
        header("Location: index.php?mensaje=producto actualizado con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar el producto.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/style.css">

    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required>
        <label>Descripción:</label>
        <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
        <label>Categoría:</label>
        <input type="text" name="categoria" value="<?php echo $producto['categoria']; ?>" required>
        <label>Disponible:</label>
        <input type="checkbox" name="disponible" <?php echo $producto['disponible'] ? 'checked' : ''; ?>>
        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
