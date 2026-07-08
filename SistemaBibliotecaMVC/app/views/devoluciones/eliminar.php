<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Devolución</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
    <div class="card border-danger shadow">
        <div class="card-header bg-danger text-white"><h5>¿Confirmar Acción?</h5></div>
        <div class="card-body text-center">
            <p>Se eliminará el registro de devolución del préstamo ID: <strong><?= htmlspecialchars($devolucion["prestamo_id"]) ?></strong></p>
            <form action="index.php?url=devoluciones/eliminar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($devolucion["id"]) ?>">
                <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                <a href="index.php?url=devoluciones/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>