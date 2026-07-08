<?php
// Si no hay parámetro 'url' en la dirección, redirigimos automáticamente a inicio
if (!isset($_GET['url'])) {
    header("Location: index.php?url=inicio");
    exit;
}

// 1. Requerimos todos los controladores que vamos a usar.
require_once __DIR__ . "/../app/controllers/AutorController.php";
require_once __DIR__ . "/../app/controllers/CategoriaController.php";
require_once __DIR__ . "/../app/controllers/EditorialController.php";
require_once __DIR__ . "/../app/controllers/DevolucionController.php";
require_once __DIR__ . "/../app/controllers/EmpleadoController.php";
require_once __DIR__ . "/../app/controllers/LectorController.php";
require_once __DIR__ . "/../app/controllers/LibroController.php";
require_once __DIR__ . "/../app/controllers/MultaController.php";
require_once __DIR__ . "/../app/controllers/PrestamoController.php";
require_once __DIR__ . "/../app/controllers/ReservaController.php";
require_once __DIR__ . "/../app/controllers/DashboardController.php"; 
// 2. Capturamos la URL. Si no existe, enviamos al inicio por defecto
$url = $_GET["url"] ?? "inicio";

// 3. Instanciamos los controladores
$autorController = new AutorController();
$categoriaController = new CategoriaController();
$editorialController = new EditorialController();
$devolucionController = new DevolucionController();
$empleadoController = new EmpleadoController();
$lectorController = new LectorController();
$libroController = new LibroController();
$multaController = new MultaController();
$prestamoController = new PrestamoController();
$reservaController = new ReservaController();
$dashboardController = new DashboardController(); 

// 4. El switch decide qué función ejecutar según la URL
switch ($url) {
    case "inicio":
        // Vista del panel principal por defecto
        $dashboardController->index(); 
        break;
 case "prestamos/devolver": $prestamoController->registrarDevolucion(); break;

    // ==========================================
    // RUTAS DEL CRUD DE AUTORES
    // ==========================================
    case "autores/listar":
        $autorController->listar();
        break;
    case "autores/crearForm":
        $autorController->crearForm();
        break;
    case "autores/crear":
        $autorController->crear();
        break;
    case "autores/editarForm":
        $autorController->editarForm();
        break;
    case "autores/actualizar":
        $autorController->actualizar();
        break;
    case "autores/eliminarForm":
        $autorController->eliminarForm();
        break;
    case "autores/eliminar":
        $autorController->eliminar();
        break;

    // ==========================================
    // RUTAS DEL CRUD DE CATEGORÍAS
    // ==========================================
    case "categorias/listar":
        $categoriaController->listar();
        break;
    case "categorias/crearForm":
        $categoriaController->crearForm();
        break;
    case "categorias/crear":
        $categoriaController->crear();
        break;
    case "categorias/editarForm":
        $categoriaController->editarForm();
        break;
    case "categorias/actualizar":
        $categoriaController->actualizar();
        break;
    case "categorias/eliminarForm":
        $categoriaController->eliminarForm();
        break;
    case "categorias/eliminar":
        $categoriaController->eliminar();
        break;

    // ==========================================
    // RUTAS DEL CRUD DE EDITORIALES
    // ==========================================
    case "editoriales/listar":
        $editorialController->listar();
        break;
    case "editoriales/crearForm":
        $editorialController->crearForm();
        break;
    case "editoriales/crear":
        $editorialController->crear();
        break;
    case "editoriales/editarForm":
        $editorialController->editarForm();
        break;
    case "editoriales/actualizar":
        $editorialController->actualizar();
        break;
    case "editoriales/eliminarForm":
        $editorialController->eliminarForm();
        break;
    case "editoriales/eliminar":
        $editorialController->eliminar();
        break;

    // ==========================================
    // RUTAS DEL CRUD DE DEVOLUCIONES
    // ==========================================
    case "devoluciones/listar":
        $devolucionController->listar();
        break;
    case "devoluciones/crearForm":
        $devolucionController->crearForm();
        break;
    case "devoluciones/crear":
        $devolucionController->crear();
        break;
    case "devoluciones/editarForm":
        $devolucionController->editarForm();
        break;
    case "devoluciones/actualizar":
        $devolucionController->actualizar();
        break;
    case "devoluciones/eliminarForm":
        $devolucionController->eliminarForm();
        break;
    case "devoluciones/eliminar":
        $devolucionController->eliminar();
        break;

    // ==========================================
    // RUTAS DEL CRUD DE EMPLEADOS
    // ==========================================
    case "empleados/listar":
        $empleadoController->listar();
        break;
    case "empleados/crearForm":
        $empleadoController->crearForm();
        break;
    case "empleados/crear":
        $empleadoController->crear();
        break;
    case "empleados/editarForm":
        $empleadoController->editarForm();
        break;
    case "empleados/actualizar":
        $empleadoController->actualizar();
        break;
    case "empleados/eliminarForm":
        $empleadoController->eliminarForm();
        break;
    case "empleados/eliminar":
        $empleadoController->eliminar();
        break;
    // ==========================================
    // RUTAS DEL CRUD DE LECTORES
    // ==========================================
    case "lectores/listar":
        $lectorController->listar();
        break;
    case "lectores/crearForm":
        $lectorController->crearForm();
        break;
    case "lectores/crear":
        $lectorController->crear();
        break;
    case "lectores/editarForm":
        $lectorController->editarForm();
        break;
    case "lectores/actualizar":
        $lectorController->actualizar();
        break;
    case "lectores/eliminarForm":
        $lectorController->eliminarForm();
        break;
    case "lectores/eliminar":
        $lectorController->eliminar();
        break;
    // ==========================================
    // RUTAS DEL CRUD DE LIBROS
    // ==========================================
    case "libros/listar":
        $libroController->listar();
        break;
    case "libros/crearForm":
        $libroController->crearForm();
        break;
    case "libros/crear":
        $libroController->crear();
        break;
    case "libros/editarForm":
        $libroController->editarForm();
        break;
    case "libros/actualizar":
        $libroController->actualizar();
        break;
    case "libros/eliminarForm":
        $libroController->eliminarForm();
        break;
    case "libros/eliminar":
        $libroController->eliminar();
        break;
    // ==========================================
    // RUTAS DEL CRUD DE MULTAS
    // ==========================================
    case "multas/listar":
        $multaController->listar();
        break;
    case "multas/crearForm":
        $multaController->crearForm();
        break;
    case "multas/crear":
        $multaController->crear();
        break;
    case "multas/editarForm":
        $multaController->editarForm();
        break;
    case "multas/actualizar":
        $multaController->actualizar();
        break;
    case "multas/eliminarForm":
        $multaController->eliminarForm();
        break;
    case "multas/eliminar":
        $multaController->eliminar();
        break;
    // ==========================================
    // RUTAS DEL CRUD DE PRÉSTAMOS
    // ==========================================
    case "prestamos/listar":
        $prestamoController->listar();
        break;
    case "prestamos/crearForm":
        $prestamoController->crearForm();
        break;
    case "prestamos/crear":
        $prestamoController->crear();
        break;
    case "prestamos/editarForm":
        $prestamoController->editarForm();
        break;
    case "prestamos/actualizar":
        $prestamoController->actualizar();
        break;
    case "prestamos/eliminarForm":
        $prestamoController->eliminarForm();
        break;
    case "prestamos/eliminar":
        $prestamoController->eliminar();
        break;
    // ==========================================
    // RUTAS DEL CRUD DE RESERVAS
    // ==========================================
    case "reservas/listar":
        $reservaController->listar();
        break;
    case "reservas/crearForm":
        $reservaController->crearForm();
        break;
    case "reservas/crear":
        $reservaController->crear();
        break;
    case "reservas/editarForm":
        $reservaController->editarForm();
        break;
    case "reservas/actualizar":
        $reservaController->actualizar();
        break;
    case "reservas/eliminarForm":
        $reservaController->eliminarForm();
        break;
    case "reservas/eliminar":
        $reservaController->eliminar();
        break;

    // ==========================================
    // RUTA POR DEFECTO (ERROR 404)
    // ==========================================
    default:
        http_response_code(404);
        echo "<h3>Error 404 - Ruta no encontrada</h3>";
        echo "<a href='index.php?url=inicio'>Volver al inicio</a>";
        break;
}