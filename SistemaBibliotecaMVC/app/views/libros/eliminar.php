<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
    <div class="card border-danger shadow">
        <div class="card-header bg-danger text-white"><h5>¿Dar de baja este libro?</h5></div>
        <div class="card-body text-center">
            <p>Se eliminará el libro: <strong><?= htmlspecialchars($libro["titulo"]) ?></strong></p>
            <p class="small text-muted">Aviso: Si este libro tiene préstamos o reservas vinculadas, se eliminarán en cascada.</p>
            <form action="index.php?url=libros/eliminar" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($libro["id"]) ?>">
                <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                <a href="index.php?url=libros/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>