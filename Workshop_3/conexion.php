<?php
    // Configuración de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "workshop3";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
?>