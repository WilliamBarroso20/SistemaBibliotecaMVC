<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Préstamo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 700px;">
    <div class="card shadow">
        <div class="card-header bg-success text-white"><h5>Nuevo Préstamo de Libro</h5></div>
        <div class="card-body">
            <form action="index.php?url=prestamos/crear" method="POST">
                
                <div class="mb-3">
                    <label class="form-label">Seleccionar Libro:</label>
                    <select name="libro_id" class="form-select" required>
                        <option value="">-- Elige un libro --</option>
                        <?php foreach ($libros as $l): ?>
                            <option value="<?= $l['id'] ?>"><?= htmlspecialchars($l['titulo']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Seleccionar Lector:</label>
                    <select name="lector_id" class="form-select" required>
                        <option value="">-- Elige el usuario --</option>
                        <?php foreach ($lectores as $lec): ?>
                            <option value="<?= $lec['id'] ?>"><?= htmlspecialchars($lec['nombre']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Empleado Responsable:</label>
                    <select name="empleado_id" class="form-select" required>
                        <option value="">-- Selecciona el personal de turno --</option>
                        <?php foreach ($empleados as $emp): ?>
                            <option value="<?= $emp['id'] ?>"><?= htmlspecialchars($emp['nombre']) ?> (<?= htmlspecialchars($emp['cargo']) ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de Préstamo:</label>
                        <input type="date" name="fecha_prestamo" class="form-control" value="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de Devolución Esperada:</label>
                        <input type="date" name="fecha_devolucion_esperada" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado Inicial:</label>
                    <select name="estado" class="form-select">
                        <option value="Pendiente">Pendiente</option>
                        <option value="Devuelto">Devuelto</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php?url=prestamos/listar" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar Préstamo</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>