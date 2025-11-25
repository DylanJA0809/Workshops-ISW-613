<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Estudiantes - Workshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Workshop 6</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/'); ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('register_careers'); ?>">Registro de Carreras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('register_students'); ?>">Registro de Estudiantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('edit_careers'); ?>">Editar Carrera</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo site_url('edit_students'); ?>">Editar Estudiante</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-5">
    <h1 class="mb-4">Editar Estudiantes</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <?php if (!empty($estudiantes) && is_array($estudiantes)) : ?>
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 60px;">ID</th>
                            <th>Nombre</th>
                            <th style="width: 90px;">Edad</th>
                            <th>Carrera</th>
                            <th style="width: 200px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($estudiantes as $est) : ?>
                            <tr>
                                <td><?= esc($est['id']); ?></td>
                                <td>
                                    <form class="row g-2 align-items-center"
                                          action="<?php echo site_url('update_student/' . $est['id']); ?>"
                                          method="post">
                                        <div class="col">
                                            <input type="text"
                                                   name="nombre"
                                                   class="form-control form-control-sm"
                                                   value="<?= esc($est['nombre']); ?>"
                                                   required>
                                        </div>
                                </td>
                                <td>
                                        <input type="number"
                                               name="edad"
                                               class="form-control form-control-sm"
                                               value="<?= esc($est['edad']); ?>"
                                               min="1"
                                               required>
                                </td>
                                <td>
                                        <select name="idCarrera" class="form-select form-select-sm" required>
                                            <option value="">Seleccione...</option>
                                            <?php foreach ($carreras as $c): ?>
                                                <option value="<?php echo $c['id']; ?>"
                                                    <?php echo ($c['id'] == $est['idCarrera']) ? 'selected' : ''; ?>>
                                                    <?php echo esc($c['nombre']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                </td>
                                <td>
                                        <button type="submit" class="btn btn-sm btn-success me-2">
                                            Guardar
                                        </button>
                                        <a href="<?php echo site_url('delete_student/' . $est['id']); ?>"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('¿Seguro que desea eliminar este estudiante?');">
                                            Eliminar
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p class="text-muted mb-0">No hay estudiantes registrados.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>