<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-success text-white"><h5>Separar Libro (Reserva)</h5></div>
        <div class="card-body">
            <form action="index.php?url=reservas/crear" method="POST">
                <div class="mb-3">
                    <label>Libro a Reservar:</label>
                    <select name="libro_id" class="form-select" required>
                        <option value="">Seleccione el libro...</option>
                        <?php foreach ($libros as $l): ?>
                            <option value="<?= $l['id'] ?>"><?= htmlspecialchars($l['titulo']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Lector que Reserva:</label>
                    <select name="lector_id" class="form-select" required>
                        <option value="">Seleccione al lector...</option>
                        <?php foreach ($lectores as $lec): ?>
                            <option value="<?= $lec['id'] ?>"><?= htmlspecialchars($lec['nombre']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Fecha de la Reserva:</label>
                    <input type="date" name="fecha_reserva" class="form-control" value="<?= date('Y-m-d') ?>" required>
                </div>
                <div class="mb-3">
                    <label>Estado Inicial:</label>
                    <select name="estado" class="form-select">
                        <option value="Activa">Activa</option>
                        <option value="Completada">Completada</option>
                        <option value="Cancelada">Cancelada</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Guardar Reserva</button>
                <a href="index.php?url=reservas/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>