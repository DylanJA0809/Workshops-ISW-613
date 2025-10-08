<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Workshop 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Formulario de Registro</h1>

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
                include 'provincias.php';
                foreach ($provincias as $provincia) {
                    echo "<option value=\"$provincia\">$provincia</option>";
                }
            ?>
        </select>
        <br>
        <button type="submit">Registrar</button>
    </form>

    <script>
        document.getElementById('registroForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Evita el envío tradicional

            const nombre = document.getElementById('nombre').value.trim();
            const apellido = document.getElementById('apellido').value.trim();
            const provincia = document.getElementById('provincia').value;

            // Redirige a login.php con los datos en la URL
            window.location.href = `login.php?nombre=${encodeURIComponent(nombre)}&apellido=${encodeURIComponent(apellido)}&provincia=${encodeURIComponent(provincia)}`;
        });
    </script>
    
</body>
</html>