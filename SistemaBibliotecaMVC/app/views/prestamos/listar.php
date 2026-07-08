<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Préstamos - Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-2 bg-dark text-white p-3" style="min-height: 100vh;">
            <h4 class="text-center text-primary mb-4"><i class="bi bi-book-half"></i> Biblioteca</h4>
            <hr>
            <ul class="nav nav-pills flex-column">
                <li><a href="index.php?url=inicio" class="nav-link text-white">Inicio</a></li>
                <li><a href="index.php?url=autores/listar" class="nav-link text-white">Autores</a></li>
                <li><a href="index.php?url=libros/listar" class="nav-link text-white">Libros</a></li>
                <li><a href="index.php?url=lectores/listar" class="nav-link text-white">Lectores</a></li>
                <li><a href="index.php?url=prestamos/listar" class="nav-link active">Préstamos</a></li>
                <li><a href="index.php?url=devoluciones/listar" class="nav-link text-white">Devoluciones</a></li>
                <li><a href="index.php?url=multas/listar" class="nav-link text-white">Multas</a></li>
            </ul>
        </div>

        <div class="col-md-9 ms-sm-auto col-lg-10 p-4 bg-light">
            <div class="d-flex justify-content-between mb-3">
                <h1>Control de Préstamos</h1>
                <a href="index.php?url=prestamos/crearForm" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo Préstamo</a>
            </div>

            <form action="index.php?url=prestamos/listar" method="POST" class="mb-4 d-flex">
                <input type="text" name="buscar" class="form-control" placeholder="Buscar por libro, lector o estado..." value="<?= htmlspecialchars($_POST['buscar'] ?? '') ?>">
                <button type="submit" class="btn btn-primary ms-2"><i class="bi bi-search"></i> Buscar</button>
            </form>

            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Libro</th>
                                <th>Lector</th>
                                <th>F. Préstamo</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($prestamos as $p): ?>
                            <tr>
                                <td><?= htmlspecialchars($p["libro"]) ?></td>
                                <td><?= htmlspecialchars($p["lector"]) ?></td>
                                <td><?= htmlspecialchars($p["fecha_prestamo"]) ?></td>
                                <td>
                                    <span class="badge <?= $p["estado"]=='Pendiente' ? 'bg-warning text-dark' : 'bg-success' ?>">
                                        <?= $p["estado"] ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($p['estado'] == 'Pendiente'): ?>
                                        <a href="index.php?url=prestamos/devolver&id=<?= $p['id'] ?>" class="btn btn-success btn-sm">
                                            <i class="bi bi-check-circle"></i> Marcar Devuelto
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted"><i class="bi bi-check-all"></i> Finalizado</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>