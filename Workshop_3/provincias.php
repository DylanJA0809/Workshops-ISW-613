<?php
include 'conexion.php';
// Consulta para obtener las provincias
$sql = "SELECT nombre FROM provincias";
$result = $conn->query($sql);

$provincias = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $provincias[] = $row['nombre'];
    }
}

// Cerrar conexión
$conn->close();
?>