<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Carrera - Workshop</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Workshop 6</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain"
                aria-controls="navMain" aria-expanded="false" aria-label="Alternar navegación">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('workshop6'); ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo site_url('register_careers'); ?>">Registro de Carreras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('register_students'); ?>">Registro de Estudiantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('edit_careers'); ?>">Editar Carrera</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('edit_students'); ?>">Editar Estudiante</a>
                </li>
            </ul>
        </div>

    </div>
</nav>


<!-- CONTENIDO PRINCIPAL -->
<main class="container my-5">

    <h1 class="mb-4">Registrar Nueva Carrera</h1>

    <div class="row">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body">

                   <form action="<?php echo site_url('save_career'); ?>" method="post">

                        <!-- Nombre de la carrera -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la carrera</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nombre" 
                                   name="nombre" 
                                   placeholder="Ej: Ingeniería en Software"
                                   required>
                        </div>

                        <!-- Botones -->
                        <button type="submit" class="btn btn-primary">Guardar</button>
                       <a href="<?php echo site_url('workshop6'); ?>" class="btn btn-secondary">Cancelar</a>

                    </form>

                </div>
            </div>

        </div>
    </div>

</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
