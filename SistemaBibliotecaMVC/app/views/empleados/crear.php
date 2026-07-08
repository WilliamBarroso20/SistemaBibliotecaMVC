<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-success text-white"><h5><i class="bi bi-plus-circle"></i> Registrar Nuevo Empleado</h5></div>
        <div class="card-body">
            <form action="index.php?url=empleados/crear" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nombre Completo:</label>
                    <input type="text" name="nombre" class="form-control" required placeholder="Ej. Carlos Mendoza">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cargo / Puesto:</label>
                    <input type="text" name="cargo" class="form-control" required placeholder="Ej. Bibliotecario Principal, Asistente, Administrador">
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono de Contacto:</label>
                    <input type="text" name="telefono" class="form-control" placeholder="Ej. 0998887776">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="index.php?url=empleados/listar" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar Registro</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>