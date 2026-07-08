<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 700px;">
    <div class="card shadow">
        <div class="card-header bg-success text-white"><h5>Registrar Nuevo Libro</h5></div>
        <div class="card-body">
            <form action="index.php?url=libros/crear" method="POST">
                <div class="mb-3">
                    <label>Título del Libro:</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Año de Publicación:</label>
                    <input type="number" name="anio_publicacion" class="form-control" required>
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Autor:</label>
                        <select name="autor_id" class="form-select" required>
                            <option value="">Seleccione...</option>
                            <?php foreach ($autores as $a): ?>
                                <option value="<?= $a['id'] ?>"><?= htmlspecialchars($a['nombre']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Categoría:</label>
                        <select name="categoria_id" class="form-select" required>
                            <option value="">Seleccione...</option>
                            <?php foreach ($categorias as $c): ?>
                                <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Editorial:</label>
                        <select name="editorial_id" class="form-select" required>
                            <option value="">Seleccione...</option>
                            <?php foreach ($editoriales as $e): ?>
                                <option value="<?= $e['id'] ?>"><?= htmlspecialchars($e['nombre']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Guardar Libro</button>
                <a href="index.php?url=libros/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>