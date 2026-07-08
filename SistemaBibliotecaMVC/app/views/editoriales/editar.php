<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Editorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white"><h5>Modificar Editorial</h5></div>
        <div class="card-body">
            <form action="index.php?url=editoriales/actualizar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($editorial["id"]) ?>">
                <div class="mb-3">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($editorial["nombre"]) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" value="<?= htmlspecialchars($editorial["telefono"]) ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="index.php?url=editoriales/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>