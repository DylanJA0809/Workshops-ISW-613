<?php
    // Configuración de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "workshop2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Procesar formulario de registro
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'] ?? '';
        $apellido = $_POST['apellido'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $telefono = $_POST['telefono'] ?? '';

        // Validación básica
        if ($nombre && $apellido && $correo && $telefono) {
            //Guardar los datos en una base de datos
            $sql = "INSERT INTO usuarios (nombre, apellido, correo, telefono) 
            VALUES ('$nombre', '$apellido', '$correo', '$telefono')";

            if ($conn->query($sql) === TRUE) {
                echo "<h2>Registro exitoso. Bienvenido, " . htmlspecialchars($nombre) . "!</h2>";

                echo '<form action="index.php" method="get">
                    <button type="submit">Volver al formulario</button>
                      </form>';

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

        } else {
            echo "Por favor, completa todos los campos.";
        }
    }
?>