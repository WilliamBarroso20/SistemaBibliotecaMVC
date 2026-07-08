<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Editorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
    <div class="card border-danger shadow">
        <div class="card-header bg-danger text-white"><h5>¿Confirmar Acción?</h5></div>
        <div class="card-body text-center">
            <p>Se eliminará la editorial: <strong><?= htmlspecialchars($editorial["nombre"]) ?></strong></p>
            <form action="index.php?url=editoriales/eliminar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($editorial["id"]) ?>">
                <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                <a href="index.php?url=editoriales/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>