<?php
// Archivo: validateActiveSessions.php
// Uso desde consola: php validateActiveSessions.php 24

include(__DIR__ . '/../common/connection.php');

// Verificar si se pasó el parámetro
if ($argc < 2) {
    echo " Uso: php validateActiveSessions.php <horas>\n";
    exit(1);
}

$hours = (int)$argv[1];
if ($hours <= 0) {
    echo " El parámetro de horas debe ser mayor a 0.\n";
    exit(1);
}

echo " Buscando usuarios activos con más de $hours horas sin iniciar sesión...\n";

// Buscar usuarios activos con más de X horas desde su último login
$sql = "
    SELECT id, username, last_login_datetime
    FROM users
    WHERE status = 'active'
      AND last_login_datetime IS NOT NULL
      AND TIMESTAMPDIFF(HOUR, last_login_datetime, NOW()) > $hours
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo " Error en la consulta: " . mysqli_error($conn) . "\n";
    exit(1);
}

$found = mysqli_num_rows($result);

if ($found === 0) {
    echo " No se encontraron usuarios para desactivar.\n";
} else {
    echo " Se encontraron $found usuario(s) para marcar como inactivos.\n";

    // Marcar los usuarios encontrados como inactivos
    while ($row = mysqli_fetch_assoc($result)) {
        $update = "UPDATE users SET status = 'inactive' WHERE id = " . $row['id'];
        if (mysqli_query($conn, $update)) {
            echo " Usuario '" . $row['username'] . "' marcado como INACTIVE (último login: " . $row['last_login_datetime'] . ")\n";
        } else {
            echo " Error al actualizar usuario ID " . $row['id'] . ": " . mysqli_error($conn) . "\n";
        }
    }
}

mysqli_close($conn);

echo " Proceso finalizado!\n";
?>
