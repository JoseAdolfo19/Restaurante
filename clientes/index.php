<?php
require_once __DIR__ . '/functions.php';

if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarCliente($_GET['id']);
    $mensaje = $count > 0 ? "Cliente eliminado con éxito." : "No se pudo eliminar a cliente.";
}

$clientes = obtenerCliente();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Lista de Clientes</title>
</head>
<body>
    <div class ="container">
    <h1>Lista de Clientes</h1>
    <?php if (isset($mensaje)): ?>
        <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <a href="nuevo.php">Añadir Cliente</a>
    </div>
    <table >
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?php echo htmlspecialchars($cliente['nombre']); ?></td>
            <td><?php echo htmlspecialchars($cliente['correo']); ?></td>
            <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
            <td><?php echo htmlspecialchars($cliente['direccion']); ?></td>
            <td class ="actions">
                <a href="editar.php?id=<?php echo $cliente['_id']; ?>">Editar</a>
                <a href="index.php?accion=eliminar&id=<?php echo $cliente['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar al cliente?');">Eliminar</a>           
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
        </div>
</body>
</html>
