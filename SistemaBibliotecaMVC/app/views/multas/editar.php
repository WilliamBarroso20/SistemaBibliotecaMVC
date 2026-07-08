<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Multa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white"><h5>Modificar Multa</h5></div>
        <div class="card-body">
            <form action="index.php?url=multas/actualizar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($multa["id"]) ?>">
                <div class="mb-3">
                    <label>ID de la Devolución:</label>
                    <input type="number" name="devolucion_id" class="form-control" value="<?= htmlspecialchars($multa["devolucion_id"]) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Monto a Pagar ($):</label>
                    <input type="number" step="0.01" name="monto" class="form-control" value="<?= htmlspecialchars($multa["monto"]) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Estado de la Multa:</label>
                    <select name="estado" class="form-select">
                        <option value="Pendiente" <?= $multa["estado"] == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="Pagada" <?= $multa["estado"] == 'Pagada' ? 'selected' : '' ?>>Pagada</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Cambios</button>
                <a href="index.php?url=multas/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>