<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white"><h5><i class="bi bi-pencil-square"></i> Modificar Datos del Empleado</h5></div>
        <div class="card-body">
            <form action="index.php?url=empleados/actualizar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($empleado["id"]) ?>">
                <div class="mb-3">
                    <label class="form-label">Nombre Completo:</label>
                    <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($empleado["nombre"]) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cargo / Puesto:</label>
                    <input type="text" name="cargo" class="form-control" value="<?= htmlspecialchars($empleado["cargo"]) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono de Contacto:</label>
                    <input type="text" name="telefono" class="form-control" value="<?= htmlspecialchars($empleado["telefono"]) ?>">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="index.php?url=empleados/listar" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>