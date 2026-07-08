<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Multa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-success text-white"><h5>Generar Nueva Multa</h5></div>
        <div class="card-body">
            <form action="index.php?url=multas/crear" method="POST">
                <div class="mb-3">
                    <label>ID de la Devolución (Problema):</label>
                    <input type="number" name="devolucion_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Monto a Pagar ($):</label>
                    <input type="number" step="0.01" name="monto" class="form-control" placeholder="Ej. 5.50" required>
                </div>
                <div class="mb-3">
                    <label>Estado de la Multa:</label>
                    <select name="estado" class="form-select">
                        <option value="Pendiente">Pendiente</option>
                        <option value="Pagada">Pagada</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Guardar Multa</button>
                <a href="index.php?url=multas/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>