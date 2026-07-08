<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
    <div class="card border-danger shadow">
        <div class="card-header bg-danger text-white"><h5>¿Confirmar Eliminación?</h5></div>
        <div class="card-body text-center">
            <p class="fs-5">¿Está seguro de dar de baja al siguiente miembro del personal?</p>
            <div class="alert alert-light border">
                <strong>Empleado:</strong> <?= htmlspecialchars($empleado["nombre"]) ?><br>
                <strong>Cargo:</strong> <?= htmlspecialchars($empleado["cargo"]) ?>
            </div>
            <form action="index.php?url=empleados/eliminar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($empleado["id"]) ?>">
                <div class="d-flex justify-content-around">
                    <a href="index.php?url=empleados/listar" class="btn btn-secondary">No, cancelar</a>
                    <button type="submit" class="btn btn-danger">Sí, dar de baja</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>