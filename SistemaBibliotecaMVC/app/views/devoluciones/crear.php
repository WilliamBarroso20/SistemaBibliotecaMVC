<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Devolución</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-success text-white"><h5>Registrar Devolución</h5></div>
        <div class="card-body">
            <form action="index.php?url=devoluciones/crear" method="POST">
                <div class="mb-3">
                    <label>ID del Préstamo Original:</label>
                    <input type="number" name="prestamo_id" class="form-control" required placeholder="Ej. 1">
                </div>
                <div class="mb-3">
                    <label>Fecha de Devolución Real:</label>
                    <input type="date" name="fecha_devolucion_real" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Estado del Libro:</label>
                    <select name="estado_libro" class="form-select">
                        <option value="Bueno">Bueno</option>
                        <option value="Dañado">Dañado</option>
                        <option value="Perdido">Perdido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="index.php?url=devoluciones/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>