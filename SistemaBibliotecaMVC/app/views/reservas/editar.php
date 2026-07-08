<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white"><h5>Modificar Reserva</h5></div>
        <div class="card-body">
            <form action="index.php?url=reservas/actualizar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($reserva["id"]) ?>">
                <div class="mb-3">
                    <label>Libro:</label>
                    <select name="libro_id" class="form-select" required>
                        <?php foreach ($libros as $l): ?>
                            <option value="<?= $l['id'] ?>" <?= $reserva['libro_id'] == $l['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($l['titulo']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Lector:</label>
                    <select name="lector_id" class="form-select" required>
                        <?php foreach ($lectores as $lec): ?>
                            <option value="<?= $lec['id'] ?>" <?= $reserva['lector_id'] == $lec['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($lec['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Fecha de la Reserva:</label>
                    <input type="date" name="fecha_reserva" class="form-control" value="<?= htmlspecialchars($reserva["fecha_reserva"]) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Estado:</label>
                    <select name="estado" class="form-select">
                        <option value="Activa" <?= $reserva["estado"] == 'Activa' ? 'selected' : '' ?>>Activa</option>
                        <option value="Completada" <?= $reserva["estado"] == 'Completada' ? 'selected' : '' ?>>Completada</option>
                        <option value="Cancelada" <?= $reserva["estado"] == 'Cancelada' ? 'selected' : '' ?>>Cancelada</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Cambios</button>
                <a href="index.php?url=reservas/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>