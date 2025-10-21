<?php
    // registro.php
    require_once "Clases/usuarios.php"; // Esta clase incluye conexion.php internamente

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo "Método no permitido.";
        exit;
    }

    $nombre    = trim($_POST['nombre'] ?? '');
    $apellido  = trim($_POST['apellido'] ?? '');
    $provincia = trim($_POST['provincia'] ?? '');
    $pass      = $_POST['contrasenna'] ?? '';

    if ($nombre === '' || $apellido === '' || $pass === '') {
        http_response_code(400);
        echo "Faltan datos obligatorios.";
        exit;
    }

    try {
        // Crea el objeto con los datos y guarda
        $usuario = new Usuarios($nombre, $apellido, $pass, $provincia);
        $id = $usuario->guardar();

        if ($id === false) {
            // Error al insertar
            http_response_code(500);
            echo "No se pudo registrar el usuario.";
            exit;
        }
        // Redirige al login con datos en la URL
        $qNombre    = urlencode($nombre);
        $qApellido  = urlencode($apellido);
        $qProvincia = urlencode($provincia);

        header("Location: login.php?ok=1&nombre={$qNombre}&apellido={$qApellido}&provincia={$qProvincia}");
        exit;

    } catch (Throwable $e) {
        // Log interno recomendado; aquí solo devolvemos un mensaje genérico
        http_response_code(500);
        echo "Ocurrió un error al procesar el registro.";
        exit;
    }
?>
