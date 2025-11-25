<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio - Workshop</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Workshop 6</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Alternar navegación">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                    href="<?php echo site_url('/'); ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    href="<?php echo site_url('register_careers'); ?>">Registro de Carreras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    href="<?php echo site_url('register_students'); ?>">Registro de Estudiantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    href="<?php echo site_url('edit_careers'); ?>">Editar Carrera</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    href="<?php echo site_url('edit_students'); ?>">Editar Estudiante</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-5">

    <h1 class="mb-4">Listado de Carreras y Estudiantes</h1>

    <!-- ================== TABLA CARRERAS ================== -->
    <h3 class="mt-4">Carreras Registradas</h3>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <?php if (!empty($carreras)) : ?>
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carreras as $carrera) : ?>
                        <tr>
                            <td><?= esc($carrera['id']) ?></td>
                            <td><?= esc($carrera['nombre']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p class="text-muted">No hay carreras registradas.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- ================== TABLA ESTUDIANTES ================== -->
    <h3 class="mt-4">Estudiantes Registrados</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <?php if (!empty($estudiantes)) : ?>
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Carrera</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($estudiantes as $est) : ?>
                        <tr>
                            <td><?= esc($est['id']) ?></td>
                            <td><?= esc($est['nombre']) ?></td>
                            <td><?= esc($est['edad']) ?></td>
                            <td><?= esc($est['carrera']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p class="text-muted">No hay estudiantes registrados.</p>
            <?php endif; ?>
        </div>
    </div>

</main>

</body>
</html>
