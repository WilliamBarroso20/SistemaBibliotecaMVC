<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Editorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-success text-white"><h5>Registrar Editorial</h5></div>
        <div class="card-body">
            <form action="index.php?url=editoriales/crear" method="POST">
                <div class="mb-3">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required placeholder="Ej. Planeta">
                </div>
                <div class="mb-3">
                    <label>Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" placeholder="Ej. 0999999999">
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="index.php?url=editoriales/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>