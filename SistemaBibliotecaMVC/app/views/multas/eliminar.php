<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Multa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
    <div class="card border-danger shadow">
        <div class="card-header bg-danger text-white"><h5>¿Anular esta multa?</h5></div>
        <div class="card-body text-center">
            <p>Se eliminará la multa por un monto de: <strong>$<?= htmlspecialchars($multa["monto"]) ?></strong></p>
            <p class="small text-muted">ID de Devolución asociada: <?= htmlspecialchars($multa["devolucion_id"]) ?></p>
            <form action="index.php?url=multas/eliminar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($multa["id"]) ?>">
                <button type="submit" class="btn btn-danger">Sí, anular multa</button>
                <a href="index.php?url=multas/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>