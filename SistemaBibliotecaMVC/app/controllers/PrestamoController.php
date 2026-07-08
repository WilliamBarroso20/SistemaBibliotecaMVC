<?php
require_once __DIR__ . "/../models/Prestamo.php";
require_once __DIR__ . "/../models/Libro.php";
require_once __DIR__ . "/../models/Lector.php";
require_once __DIR__ . "/../models/Empleado.php";
require_once __DIR__ . "/../models/Devolucion.php";

class PrestamoController
{
    public function listar()
    {
        $busqueda = trim($_POST["buscar"] ?? "");
        $prestamos = Prestamo::obtenerTodos($busqueda); 
        require __DIR__ . "/../views/prestamos/listar.php";
    }

    public function crearForm()
    {
        $libros = Libro::obtenerTodos();
        $lectores = Lector::obtenerTodos();
        $empleados = Empleado::obtenerTodos();
        require __DIR__ . "/../views/prestamos/crear.php";
    }

    public function crear()
    {
        $libro_id = (int)($_POST["libro_id"] ?? 0);
        $lector_id = (int)($_POST["lector_id"] ?? 0);
        $empleado_id = (int)($_POST["empleado_id"] ?? 0);
        $fecha_p = $_POST["fecha_prestamo"] ?? "";
        $fecha_d = $_POST["fecha_devolucion_esperada"] ?? "";
        $estado = $_POST["estado"] ?? "Pendiente";

        if ($libro_id === 0 || $lector_id === 0 || $empleado_id === 0 || empty($fecha_p) || empty($fecha_d)) {
            die("Error: Todos los campos son obligatorios.");
        }

        $resultado = Prestamo::crear($libro_id, $lector_id, $empleado_id, $fecha_p, $fecha_d, $estado);
        
        if ($resultado === "error_libro_ocupado") {
            echo "<script>alert('¡Atención! Este libro ya está prestado.'); window.history.back();</script>";
            exit;
        }
        header("Location: index.php?url=prestamos/listar");
        exit;
    }

    public function registrarDevolucion() {
        $prestamo_id = (int)($_GET["id"] ?? 0);
        
        if ($prestamo_id > 0) {
            // 1. Registramos la devolución
            Devolucion::crear($prestamo_id, date('Y-m-d'), 'Bueno'); 
            // 2. Marcamos el préstamo como Finalizado
            Prestamo::actualizarEstado($prestamo_id, 'Finalizado');
        }
        
        header("Location: index.php?url=devoluciones/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;
        $prestamo = Prestamo::obtenerPorId($id);

        $libros = Libro::obtenerTodos();
        $lectores = Lector::obtenerTodos();
        $empleados = Empleado::obtenerTodos();
        require __DIR__ . "/../views/prestamos/editar.php";
    }

    public function actualizar()
    {
        $id = (int)($_POST["id"] ?? 0);
        $libro_id = (int)($_POST["libro_id"] ?? 0);
        $lector_id = (int)($_POST["lector_id"] ?? 0);
        $empleado_id = (int)($_POST["empleado_id"] ?? 0);
        $fecha_p = $_POST["fecha_prestamo"] ?? "";
        $fecha_d = $_POST["fecha_devolucion_esperada"] ?? "";
        $estado = $_POST["estado"] ?? "Pendiente";

        if ($id === 0 || $libro_id === 0 || $lector_id === 0 || $empleado_id === 0 || empty($fecha_p) || empty($fecha_d)) {
            die("Error: Datos insuficientes para actualizar el préstamo.");
        }

        Prestamo::actualizar($id, $libro_id, $lector_id, $empleado_id, $fecha_p, $fecha_d, $estado);
        header("Location: index.php?url=prestamos/listar");
        exit;
    }

    public function eliminar()
    {
        $id = (int)($_POST["id"] ?? 0);
        Prestamo::eliminar($id);
        header("Location: index.php?url=prestamos/listar");
        exit;
    }
}