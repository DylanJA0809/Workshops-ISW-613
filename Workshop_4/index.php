<?php
    require_once 'Clases/provinciasDAO.php';

    $provinciaObj = new Provincias();
    $provincias = $provinciaObj->obtenerTodas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Workshop 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Formulario de Registro Usando POO</h1>

    <form id="registroForm" action="registro.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br>
        <label for="contrasenna">Contraseña:</label>
        <input type="text" id="contrasenna" name="contrasenna" required>
        <br>
        <label for="provincia">Provincia:</label>
        <select id="provincia" name="provincia" required>
            <?php
                foreach ($provincias as $provincia) {
                    echo "<option value=\"$provincia\">$provincia</option>";
                }
            ?>
        </select>
        <br>
        <button type="submit">Registrar</button>
    </form>

</body>
</html>