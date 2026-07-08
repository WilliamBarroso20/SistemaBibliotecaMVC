<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Biblioteca - Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-2 sidebar d-flex flex-column p-3 text-white bg-dark" style="min-height: 100vh;">
            <h4 class="text-center text-primary mb-4"><i class="bi bi-book-half"></i> Biblioteca</h4><hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li><a href="index.php?url=autores/listar" class="nav-link text-white"><i class="bi bi-person-badge"></i> Autores</a></li>
                <li><a href="index.php?url=categorias/listar" class="nav-link text-white"><i class="bi bi-tags"></i> Categorías</a></li>
                <li><a href="index.php?url=editoriales/listar" class="nav-link text-white"><i class="bi bi-building"></i> Editoriales</a></li>
                <li><a href="index.php?url=libros/listar" class="nav-link text-white"><i class="bi bi-journal-bookmark"></i> Libros</a></li>
                <li><a href="index.php?url=lectores/listar" class="nav-link text-white"><i class="bi bi-people"></i> Lectores</a></li>
                <li><a href="index.php?url=prestamos/listar" class="nav-link text-white"><i class="bi bi-calendar-event"></i> Préstamos</a></li>
                <li><a href="index.php?url=empleados/listar" class="nav-link active"><i class="bi bi-person-workspace"></i> Empleados</a></li>
                <li><a href="index.php?url=reservas/listar" class="nav-link text-white"><i class="bi bi-bookmark-star"></i> Reservas</a></li>
                <li><a href="index.php?url=devoluciones/listar" class="nav-link text-white"><i class="bi bi-arrow-counterclockwise"></i> Devoluciones</a></li>
                <li><a href="index.php?url=multas/listar" class="nav-link text-white"><i class="bi bi-exclamation-triangle"></i> Multas</a></li>
            </ul>
        </div>
        <div class="col-md-9 ms-sm-auto col-lg-10 main-content">
            <div class="d-flex justify-content-between pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Personal / Empleados</h1>
                <a href="index.php?url=empleados/crearForm" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo Empleado</a>
            </div>
            <div class="card shadow-sm"><div class="card-body"><table class="table table-hover table-bordered align-middle">
                <thead class="table-dark"><tr><th>ID</th><th>Nombre</th><th>Cargo</th><th>Teléfono</th><th class="text-center">Acciones</th></tr></thead>
                <tbody>
                    <?php if(empty($empleados)): ?><tr><td colspan="5" class="text-center">No hay registros</td></tr><?php else: ?>
                    <?php foreach($empleados as $emp): ?><tr><td><?= htmlspecialchars($emp["id"]) ?></td><td><strong><?= htmlspecialchars($emp["nombre"]) ?></strong></td><td><span class="badge bg-secondary"><?= htmlspecialchars($emp["cargo"]) ?></span></td><td><?= htmlspecialchars($emp["telefono"] ?? 'N/A') ?></td>
                    <td class="text-center"><a href="index.php?url=empleados/editarForm&id=<?= $emp["id"] ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a> <a href="index.php?url=empleados/eliminarForm&id=<?= $emp["id"] ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a></td></tr><?php endforeach; endif; ?>
                </tbody>
            </table></div></div>
        </div>
    </div>
</div>
</body>
</html>