<?php
$nombre = isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '';
$apellido = isset($_GET['apellido']) ? htmlspecialchars($_GET['apellido']) : '';
$provincia = isset($_GET['provincia']) ? htmlspecialchars($_GET['provincia']) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Workshop 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Ingreso de Usuarios</h1>
    <p>Bienvenido, <?php echo $nombre . ' ' . $apellido; ?> de <?php echo $provincia; ?>. Por favor, ingrese sus credenciales.</p>
    <form action="login.php" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" value="<?php echo $nombre; ?>" required>
        <br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit">Ingresar</button>
    </form>

</body>
</html>