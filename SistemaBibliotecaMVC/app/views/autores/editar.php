<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Modificar Datos del Autor</h5>
        </div>
        <div class="card-body">
            <?php if (!$autor): ?>
                <div class="alert alert-danger">El registro solicitado no existe.</div>
                <a href="index.php?url=autores/listar" class="btn btn-secondary">Volver</a>
            <?php else: ?>
                <form action="index.php?url=autores/actualizar" method="POST" class="form-validar">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($autor["id"]) ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Nombre del Autor:</label>
                        <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($autor["nombre"]) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nacionalidad:</label>
                        <input type="text" name="nacionalidad" class="form-control" value="<?= htmlspecialchars($autor["nacionalidad"]) ?>" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="index.php?url=autores/listar" class="btn btn-secondary">Volver</a>
                        <button type="submit" class="btn btn-primary">Actualizar Cambios</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="js/validaciones.js"></script>
</body>
</html>