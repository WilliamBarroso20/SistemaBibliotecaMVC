<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Biblioteca - Devoluciones</title>
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
                <li><a href="index.php?url=autores/listar" class="nav-link text-white">Autores</a></li>
                <li><a href="index.php?url=categorias/listar" class="nav-link text-white">Categorías</a></li>
                <li><a href="index.php?url=editoriales/listar" class="nav-link text-white">Editoriales</a></li>
                <li><a href="index.php?url=libros/listar" class="nav-link text-white">Libros</a></li>
                <li><a href="index.php?url=lectores/listar" class="nav-link text-white">Lectores</a></li>
                <li><a href="index.php?url=prestamos/listar" class="nav-link text-white">Préstamos</a></li>
                <li><a href="index.php?url=devoluciones/listar" class="nav-link active">Devoluciones</a></li>
            </ul>
        </div>

        <div class="col-md-9 ms-sm-auto col-lg-10 p-4">
            <h1 class="h2 border-bottom pb-2 mb-3">Gestión de Devoluciones</h1>
            
            <form action="index.php?url=devoluciones/listar" method="POST" class="mb-4">
                <div class="input-group">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar préstamo..." value="<?= htmlspecialchars($_POST['buscar'] ?? '') ?>">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                    <a href="index.php?url=devoluciones/listar" class="btn btn-outline-secondary">X</a>
                </div>
            </form>

            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr><th>Libro</th><th>Lector</th><th>F. Devolución</th><th>Estado</th></tr>
                </thead>
                <tbody>
                    <?php if(empty($pendientes)): ?>
                        <tr><td colspan="4" class="text-center">No hay registros</td></tr>
                    <?php else: ?>
                        <?php foreach($pendientes as $d): ?>
                        <tr>
                            <td><?= htmlspecialchars($d["libro"]) ?></td>
                            <td><?= htmlspecialchars($d["lector"]) ?></td>
                            <td><?= htmlspecialchars($d["fecha_devolucion_real"]) ?></td>
                            <td><span class="badge bg-success"><?= htmlspecialchars($d["estado_libro"]) ?></span></td>
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