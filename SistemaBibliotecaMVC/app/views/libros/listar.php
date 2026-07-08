<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Biblioteca - Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-3 col-lg-2 sidebar d-flex flex-column p-3 text-white bg-dark" style="min-height: 100vh;">
            <h4 class="text-center text-primary mb-4">
                <i class="bi bi-book-half"></i> Biblioteca
            </h4>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php?url=autores/listar" class="nav-link text-white">
                        <i class="bi bi-person-badge"></i> Autores
                    </a>
                </li>
                <li>
                    <a href="index.php?url=categorias/listar" class="nav-link text-white">
                        <i class="bi bi-tags"></i> Categorías
                    </a>
                </li>
                <li>
                    <a href="index.php?url=editoriales/listar" class="nav-link text-white">
                        <i class="bi bi-building"></i> Editoriales
                    </a>
                </li>
                <li>
                    <a href="index.php?url=libros/listar" class="nav-link active">
                        <i class="bi bi-journal-bookmark"></i> Libros
                    </a>
                </li>
                <li>
                    <a href="index.php?url=lectores/listar" class="nav-link text-white">
                        <i class="bi bi-people"></i> Lectores
                    </a>
                </li>
                <li>
                    <a href="index.php?url=prestamos/listar" class="nav-link text-white">
                        <i class="bi bi-calendar-event"></i> Préstamos
                    </a>
                </li>
                <li>
                    <a href="index.php?url=empleados/listar" class="nav-link text-white">
                        <i class="bi bi-person-workspace"></i> Empleados
                    </a>
                </li>
                <li>
                    <a href="index.php?url=reservas/listar" class="nav-link text-white">
                        <i class="bi bi-bookmark-star"></i> Reservas
                    </a>
                </li>
                <li>
                    <a href="index.php?url=devoluciones/listar" class="nav-link text-white">
                        <i class="bi bi-arrow-counterclockwise"></i> Devoluciones
                    </a>
                </li>
                <li>
                    <a href="index.php?url=multas/listar" class="nav-link text-white">
                        <i class="bi bi-exclamation-triangle"></i> Multas
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-md-9 ms-sm-auto col-lg-10 main-content p-4">
            
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Inventario Principal de Libros</h1>
                <a href="index.php?url=libros/crearForm" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Agregar Libro
                </a>
            </div>

            <div class="card mb-4 shadow-sm border-0 bg-light">
                <div class="card-body p-3">
                    <form action="index.php?url=libros/listar" method="POST" class="m-0">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" 
                                   name="buscar" 
                                   class="form-control border-start-0 shadow-none" 
                                   placeholder="Buscar por título del libro, nombre del autor o categoría..." 
                                   value="<?= htmlspecialchars($_POST['buscar'] ?? '') ?>">
                            <button type="submit" class="btn btn-primary px-4">
                                Buscar
                            </button>
                            <a href="index.php?url=libros/listar" class="btn btn-outline-secondary px-3" title="Limpiar búsqueda">
                                <i class="bi bi-x-circle"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 5%;">ID</th>
                                    <th style="width: 30%;">Título del Libro</th>
                                    <th style="width: 10%;">Año Pub.</th>
                                    <th style="width: 20%;">Autor</th>
                                    <th style="width: 15%;">Categoría</th>
                                    <th style="width: 15%;">Editorial</th>
                                    <th style="width: 10%;" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($libros)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            No se encontraron libros registrados en el inventario o que coincidan con la búsqueda.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($libros as $l): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($l["id"]) ?></td>
                                            <td>
                                                <strong><?= htmlspecialchars($l["titulo"]) ?></strong>
                                            </td>
                                            <td><?= htmlspecialchars($l["anio_publicacion"]) ?></td>
                                            <td><?= htmlspecialchars($l["autor"]) ?></td>
                                            <td>
                                                <span class="badge bg-info text-dark font-weight-normal px-2 py-1.5">
                                                    <?= htmlspecialchars($l["categoria"]) ?>
                                                </span>
                                            </td>
                                            <td><?= htmlspecialchars($l["editorial"]) ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="index.php?url=libros/editarForm&id=<?= $l["id"] ?>" 
                                                       class="btn btn-sm btn-primary" 
                                                       title="Editar Libro">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="index.php?url=libros/eliminarForm&id=<?= $l["id"] ?>" 
                                                       class="btn btn-sm btn-danger" 
                                                       title="Eliminar Libro">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>