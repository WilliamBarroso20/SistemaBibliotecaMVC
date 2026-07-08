<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Biblioteca - Lectores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-3 col-lg-2 sidebar d-flex flex-column p-3 text-white bg-dark" style="min-height: 100vh;">
            <h4 class="text-center text-primary mb-4"><i class="bi bi-book-half"></i> Biblioteca</h4>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li><a href="index.php?url=autores/listar" class="nav-link text-white"><i class="bi bi-person-badge"></i> Autores</a></li>
                <li><a href="index.php?url=categorias/listar" class="nav-link text-white"><i class="bi bi-tags"></i> Categorías</a></li>
                <li><a href="index.php?url=editoriales/listar" class="nav-link text-white"><i class="bi bi-building"></i> Editoriales</a></li>
                <li><a href="index.php?url=libros/listar" class="nav-link text-white"><i class="bi bi-journal-bookmark"></i> Libros</a></li>
                <li><a href="index.php?url=lectores/listar" class="nav-link active"><i class="bi bi-people"></i> Lectores</a></li>
                <li><a href="index.php?url=prestamos/listar" class="nav-link text-white"><i class="bi bi-calendar-event"></i> Préstamos</a></li>
                <li><a href="index.php?url=empleados/listar" class="nav-link text-white"><i class="bi bi-person-workspace"></i> Empleados</a></li>
                <li><a href="index.php?url=reservas/listar" class="nav-link text-white"><i class="bi bi-bookmark-star"></i> Reservas</a></li>
                <li><a href="index.php?url=devoluciones/listar" class="nav-link text-white"><i class="bi bi-arrow-counterclockwise"></i> Devoluciones</a></li>
                <li><a href="index.php?url=multas/listar" class="nav-link text-white"><i class="bi bi-exclamation-triangle"></i> Multas</a></li>
            </ul>
        </div>

        <div class="col-md-9 ms-sm-auto col-lg-10 p-4">
            <div class="d-flex justify-content-between pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Módulo de Lectores</h1> <a href="index.php?url=lectores/crearForm" class="btn btn-success"><i class="bi bi-plus-circle"></i> Registrar Lector</a>
            </div>

            <div class="card mb-4 shadow-sm border-0 bg-light">
                <div class="card-body p-3">
                    <form action="index.php?url=lectores/listar" method="POST" class="d-flex m-0">
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre, correo..." value="<?= htmlspecialchars($_POST['buscar'] ?? '') ?>">
                            <button type="submit" class="btn btn-primary px-4">Buscar</button>
                            <a href="index.php?url=lectores/listar" class="btn btn-outline-secondary px-3"><i class="bi bi-x-circle"></i></a>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Teléfono</th><th>Acciones</th></tr>
                </thead>
                <tbody>
                    <?php if(empty($lectores)): ?>
                        <tr><td colspan="5" class="text-center text-muted py-4">No hay lectores registrados.</td></tr>
                    <?php else: ?>
                        <?php foreach($lectores as $l): ?>
                            <tr>
                                <td><?= htmlspecialchars($l["id"]) ?></td>
                                <td><strong><?= htmlspecialchars($l["nombre"]) ?></strong></td>
                                <td><?= htmlspecialchars($l["correo"]) ?></td>
                                <td><?= htmlspecialchars($l["telefono"]) ?></td>
                                <td>
                                    <a href="index.php?url=lectores/editarForm&id=<?= $l["id"] ?>" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="index.php?url=lectores/eliminarForm&id=<?= $l["id"] ?>" class="btn btn-sm btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>