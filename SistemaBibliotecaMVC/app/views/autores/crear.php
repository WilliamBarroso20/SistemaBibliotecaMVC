<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="main-content" style="margin-left: 0; max-width: 600px; margin: 50px auto;">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="bi bi-person-plus"></i> Registrar Nuevo Autor</h5>
        </div>
        <div class="card-body">
            <form action="index.php?url=autores/crear" method="POST" class="form-validar">
                <div class="mb-3">
                    <label class="form-label">Nombre Completo:</label>
                    <input type="text" name="nombre" class="form-control" required placeholder="Ej. Gabriel García Márquez">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nacionalidad:</label>
                    <input type="text" name="nacionalidad" class="form-control" required placeholder="Ej. Colombiana">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="index.php?url=autores/listar" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar Registro</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/validaciones.js"></script>
</body>
</html>