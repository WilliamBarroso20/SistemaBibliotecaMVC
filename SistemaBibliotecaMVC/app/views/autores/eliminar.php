<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Baja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width: 500px;">
    <div class="card border-danger shadow">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0"><i class="bi bi-exclamation-octagon"></i> ¿Confirmar Eliminación?</h5>
        </div>
        <div class="card-body text-center">
            <?php if (!$autor): ?>
                <p class="text-danger">El registro no existe o ya fue eliminado.</p>
                <a href="index.php?url=autores/listar" class="btn btn-secondary">Regresar</a>
            <?php else: ?>
                <p class="fs-5">Está a punto de eliminar al siguiente autor del sistema:</p>
                <div class="alert alert-light border p-3 mb-4">
                    <strong>ID:</strong> <?= htmlspecialchars($autor["id"]) ?><br>
                    <strong>Nombre:</strong> <?= htmlspecialchars($autor["nombre"]) ?><br>
                    <strong>Nacionalidad:</strong> <?= htmlspecialchars($autor["nacionalidad"]) ?>
                </div>
                <p class="text-muted small"><i class="bi bi-info-circle"></i> Esta operación eliminará en cascada los libros asociados a este autor.</p>
                
                <form action="index.php?url=autores/eliminar" method="POST" onsubmit="return confirmarEliminacion(event)">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($autor["id"]) ?>">
                    <div class="d-flex justify-content-around mt-4">
                        <a href="index.php?url=autores/listar" class="btn btn-secondary">Cancelar, mantener registro</a>
                        <button type="submit" class="btn btn-danger">Sí, eliminar permanentemente</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="js/alertas.js"></script>
</body>
</html>