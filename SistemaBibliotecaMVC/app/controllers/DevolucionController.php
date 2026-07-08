<?php
require_once __DIR__ . "/../models/Devolucion.php";

class DevolucionController
{
  public function listar() {
    $busqueda = trim($_POST["buscar"] ?? "");
    // Cambiamos el nombre de la variable aquí para que coincida con la vista
    $pendientes = Devolucion::obtenerTodos($busqueda); 
    require __DIR__ . "/../views/devoluciones/listar.php";
}

    public function crearForm()
    {
        require __DIR__ . "/../views/devoluciones/crear.php";
    }

    public function crear()
    {
        $prestamo_id = $_POST["prestamo_id"] ?? 0;
        $fecha = $_POST["fecha_devolucion_real"] ?? "";
        $estado = $_POST["estado_libro"] ?? "Bueno";

        if (empty($prestamo_id) || empty($fecha)) {
            die("Error: El ID del préstamo y la fecha son obligatorios.");
        }

        Devolucion::crear($prestamo_id, $fecha, $estado);
        header("Location: index.php?url=devoluciones/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;
        $devolucion = Devolucion::obtenerPorId($id);
        require __DIR__ . "/../views/devoluciones/editar.php";
    }

    public function actualizar()
    {
        $id = (int)($_POST["id"] ?? 0);
        $prestamo_id = $_POST["prestamo_id"] ?? 0;
        $fecha = $_POST["fecha_devolucion_real"] ?? "";
        $estado = $_POST["estado_libro"] ?? "Bueno";

        if ($id === 0 || empty($prestamo_id) || empty($fecha)) {
            die("Error: Datos no válidos.");
        }

        Devolucion::actualizar($id, $prestamo_id, $fecha, $estado);
        header("Location: index.php?url=devoluciones/listar");
        exit;
    }

    public function eliminarForm()
    {
        $id = $_GET["id"] ?? 0;
        $devolucion = Devolucion::obtenerPorId($id);
        require __DIR__ . "/../views/devoluciones/eliminar.php";
    }

    public function eliminar()
    {
        $id = (int)($_POST["id"] ?? 0);
        Devolucion::eliminar($id);
        header("Location: index.php?url=devoluciones/listar");
        exit;
    }
}