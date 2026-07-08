<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white"><h5>Modificar Categoría</h5></div>
        <div class="card-body">
            <form action="index.php?url=categorias/actualizar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($categoria["id"]) ?>">
                <div class="mb-3">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($categoria["nombre"]) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="index.php?url=categorias/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>