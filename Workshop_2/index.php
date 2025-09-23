<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Workshop 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Formulario de Registro</h1>

    <form id="registroForm" action="registro.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="nombre">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br>
        <label for="correo">Correo electrónico:</label>
        <input type="text" id="correo" name="correo" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        <br>
        <button type="submit">Registrar</button>
    </form>
    
</body>
</html>