<?php
require_once "Clases/usuarios.php"; // importa la clase Usuarios (que incluye la conexión)

// Obtenemos datos desde la URL (redirigidos desde registro.php)
$nombre = $_GET['nombre'] ?? '';
$apellido = $_GET['apellido'] ?? '';
$provincia = $_GET['provincia'] ?? '';

// Si tenemos nombre y apellido, creamos un objeto Usuarios para saludar
$saludo = '';
if ($nombre && $apellido) {
    // La contraseña aquí no importa para el saludo
    $usuario = new Usuarios($nombre, $apellido, '', $provincia);
    $saludo = $usuario->saludar();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Workshop 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Ingreso de Usuarios</h1>

    <?php if ($saludo): ?>
        <p><?= $saludo ?></p>
    <?php else: ?>
        <p>Por favor, ingrese sus credenciales.</p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" value="<?= $nombre ?>" required>
        <br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
