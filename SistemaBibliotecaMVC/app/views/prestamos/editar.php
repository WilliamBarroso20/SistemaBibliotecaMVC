<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Préstamo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 700px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white"><h5>Editar Detalles del Préstamo</h5></div>
        <div class="card-body">
            <form action="index.php?url=prestamos/actualizar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($prestamo["id"]) ?>">

                <div class="mb-3">
                    <label class="form-label">Libro:</label>
                    <select name="libro_id" class="form-select" required>
                        <?php foreach ($libros as $l): ?>
                            <option value="<?= $l['id'] ?>" <?= $prestamo['libro_id'] == $l['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($l['titulo']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lector:</label>
                    <select name="lector_id" class="form-select" required>
                        <?php foreach ($lectores as $lec): ?>
                            <option value="<?= $lec['id'] ?>" <?= $prestamo['lector_id'] == $lec['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($lec['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Empleado que Procesa:</label>
                    <select name="empleado_id" class="form-select" required>
                        <?php foreach ($empleados as $emp): ?>
                            <option value="<?= $emp['id'] ?>" <?= $prestamo['empleado_id'] == $emp['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($emp['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de Préstamo:</label>
                        <input type="date" name="fecha_prestamo" class="form-control" value="<?= htmlspecialchars($prestamo["fecha_prestamo"]) ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de Devolución Esperada:</label>
                        <input type="date" name="fecha_devolucion_esperada" class="form-control" value="<?= htmlspecialchars($prestamo["fecha_devolucion_esperada"]) ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado:</label>
                    <select name="estado" class="form-select">
                        <option value="Pendiente" <?= $prestamo["estado"] == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="Devuelto" <?= $prestamo["estado"] == 'Devuelto' ? 'selected' : '' ?>>Devuelto</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php?url=prestamos/listar" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Actualizar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>