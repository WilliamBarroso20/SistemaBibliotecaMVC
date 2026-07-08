<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Biblioteca - Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-3 col-lg-2 sidebar d-flex flex-column p-3 text-white bg-dark" style="min-height: 100vh;">
            <h4 class="text-center text-primary mb-4"><i class="bi bi-book-half"></i> Biblioteca</h4>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li><a href="index.php?url=inicio" class="nav-link active">Inicio</a></li>
                <li><a href="index.php?url=autores/listar" class="nav-link text-white">Autores</a></li>
                <li><a href="index.php?url=categorias/listar" class="nav-link text-white">Categorías</a></li>
                <li><a href="index.php?url=editoriales/listar" class="nav-link text-white">Editoriales</a></li>
                <li><a href="index.php?url=libros/listar" class="nav-link text-white">Libros</a></li>
                <li><a href="index.php?url=lectores/listar" class="nav-link text-white">Lectores</a></li>
                <li><a href="index.php?url=prestamos/listar" class="nav-link text-white">Préstamos</a></li>
                <li><a href="index.php?url=reservas/listar" class="nav-link text-white">Reservas</a></li>
                <li><a href="index.php?url=devoluciones/listar" class="nav-link text-white">Devoluciones</a></li>
                <li><a href="index.php?url=multas/listar" class="nav-link text-white">Multas</a></li>
            </ul>
        </div>

        <div class="col-md-9 ms-sm-auto col-lg-10 p-4 bg-light">
            <h1 class="h2 border-bottom pb-2 mb-4">Bienvenido al Sistema de Biblioteca</h1>
            
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary shadow">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-journal-bookmark-fill"></i> Total Libros</h5>
                            <h2 class="display-5 fw-bold"><?= $resumen['total_libros'] ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-warning shadow">
                        <div class="card-body text-dark">
                            <h5 class="card-title"><i class="bi bi-arrow-left-right"></i> Prestados</h5>
                            <h2 class="display-5 fw-bold"><?= $resumen['libros_prestados'] ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-info shadow">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-people-fill"></i> Lectores</h5>
                            <h2 class="display-5 fw-bold"><?= $resumen['total_lectores'] ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-danger shadow">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-exclamation-triangle-fill"></i> Multas</h5>
                            <h2 class="display-5 fw-bold"><?= $resumen['total_multas'] ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 p-5 bg-white border rounded shadow-sm text-center">
                <h3>¿Qué deseas hacer hoy?</h3>
                <p class="text-muted">Selecciona una opción del menú lateral o registra un nuevo préstamo.</p>
                <a href="index.php?url=prestamos/crearForm" class="btn btn-success btn-lg">Registrar Préstamo</a>
            </div>
        </div>

    </div>
</div>
</body>
</html>