<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Lector</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white"><h5>Modificar Datos del Lector</h5></div>
        <div class="card-body">
            <form action="index.php?url=lectores/actualizar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($lector["id"]) ?>">
                
                <div class="mb-3">
                    <label>Nombre Completo:</label>
                    <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($lector["nombre"]) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Correo Electrónico:</label>
                    <input type="email" name="correo" class="form-control" value="<?= htmlspecialchars($lector["correo"]) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" value="<?= htmlspecialchars($lector["telefono"]) ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="index.php?url=lectores/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>