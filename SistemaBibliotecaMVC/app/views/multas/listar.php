<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Biblioteca - Multas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-2 bg-dark text-white p-3" style="min-height: 100vh;">
            <h4>Biblioteca</h4><hr>
            <ul class="nav nav-pills flex-column">
                <li><a href="index.php?url=autores/listar" class="nav-link text-white">Autores</a></li>
                <li><a href="index.php?url=libros/listar" class="nav-link text-white">Libros</a></li>
                <li><a href="index.php?url=lectores/listar" class="nav-link text-white">Lectores</a></li>
                <li><a href="index.php?url=prestamos/listar" class="nav-link text-white">Préstamos</a></li>
                <li><a href="index.php?url=multas/listar" class="nav-link active">Multas</a></li>
            </ul>
        </div>

        <div class="col-md-9 p-4">
            <h1 class="h2 mb-4">Gestión de Multas</h1>
            
            <form action="index.php?url=multas/listar" method="POST" class="mb-4">
                <div class="input-group">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar por libro o lector..." value="<?= htmlspecialchars($_POST['buscar'] ?? '') ?>">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                    <a href="index.php?url=multas/listar" class="btn btn-outline-secondary">X</a>
                </div>
            </form>

            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr><th>Libro</th><th>Lector</th><th>Retraso</th><th>Monto</th></tr>
                </thead>
                <tbody>
                    <?php if(empty($multas)): ?>
                        <tr><td colspan="4" class="text-center">No hay multas pendientes.</td></tr>
                    <?php else: ?>
                        <?php foreach($multas as $m): ?>
                        <tr>
                            <td><?= htmlspecialchars($m["libro"]) ?></td>
                            <td><?= htmlspecialchars($m["lector"]) ?></td>
                            <td><span class="badge bg-danger"><?= $m["dias_retraso"] ?> días</span></td>
                            <td><strong>$<?= number_format($m["monto"], 2) ?></strong></td>
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