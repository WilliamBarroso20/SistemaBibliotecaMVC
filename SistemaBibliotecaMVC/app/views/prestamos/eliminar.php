<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Préstamo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
    <div class="card border-danger shadow">
        <div class="card-header bg-danger text-white"><h5>¿Eliminar Registro de Préstamo?</h5></div>
        <div class="card-body text-center">
            <p class="fs-5">¿Estás seguro de que deseas eliminar este registro de préstamo?</p>
            <p class="text-muted small">ID de Registro Interno: <?= htmlspecialchars($prestamo["id"]) ?></p>
            <form action="index.php?url=prestamos/eliminar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($prestamo["id"]) ?>">
                <div class="d-flex justify-content-around mt-4">
                    <a href="index.php?url=prestamos/listar" class="btn btn-secondary">No, cancelar</a>
                    <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>