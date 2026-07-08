<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Devolución</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white"><h5>Modificar Devolución</h5></div>
        <div class="card-body">
            <form action="index.php?url=devoluciones/actualizar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($devolucion["id"]) ?>">
                
                <div class="mb-3">
                    <label>ID del Préstamo:</label>
                    <input type="number" name="prestamo_id" class="form-control" value="<?= htmlspecialchars($devolucion["prestamo_id"]) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Fecha de Devolución:</label>
                    <input type="date" name="fecha_devolucion_real" class="form-control" value="<?= htmlspecialchars($devolucion["fecha_devolucion_real"]) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Estado del Libro:</label>
                    <select name="estado_libro" class="form-select">
                        <option value="Bueno" <?= $devolucion["estado_libro"] == 'Bueno' ? 'selected' : '' ?>>Bueno</option>
                        <option value="Dañado" <?= $devolucion["estado_libro"] == 'Dañado' ? 'selected' : '' ?>>Dañado</option>
                        <option value="Perdido" <?= $devolucion["estado_libro"] == 'Perdido' ? 'selected' : '' ?>>Perdido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="index.php?url=devoluciones/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>