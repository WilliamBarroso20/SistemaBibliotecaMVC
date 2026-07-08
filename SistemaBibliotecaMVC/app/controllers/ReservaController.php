<?php
require_once __DIR__ . "/../models/Reserva.php";
require_once __DIR__ . "/../models/Libro.php";
require_once __DIR__ . "/../models/Lector.php";

class ReservaController
{
    public function listar()
    {
        $reservas = Reserva::obtenerTodos();
        require __DIR__ . "/../views/reservas/listar.php";
    }

    public function crearForm()
    {
        $libros = Libro::obtenerTodos();
        $lectores = Lector::obtenerTodos();
        require __DIR__ . "/../views/reservas/crear.php";
    }

    public function crear()
    {
        $libro_id = (int)($_POST["libro_id"] ?? 0);
        $lector_id = (int)($_POST["lector_id"] ?? 0);
        $fecha_reserva = $_POST["fecha_reserva"] ?? "";
        $estado = $_POST["estado"] ?? "Activa";

        if ($libro_id === 0 || $lector_id === 0 || empty($fecha_reserva)) {
            die("Error: El libro, el lector y la fecha son obligatorios.");
        }

        Reserva::crear($libro_id, $lector_id, $fecha_reserva, $estado);
        header("Location: index.php?url=reservas/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;
        $reserva = Reserva::obtenerPorId($id);
        
        $libros = Libro::obtenerTodos();
        $lectores = Lector::obtenerTodos();
        require __DIR__ . "/../views/reservas/editar.php";
    }

    public function actualizar()
    {
        $id = (int)($_POST["id"] ?? 0);
        $libro_id = (int)($_POST["libro_id"] ?? 0);
        $lector_id = (int)($_POST["lector_id"] ?? 0);
        $fecha_reserva = $_POST["fecha_reserva"] ?? "";
        $estado = $_POST["estado"] ?? "Activa";

        if ($id === 0 || $libro_id === 0 || $lector_id === 0 || empty($fecha_reserva)) {
            die("Error: Datos no válidos para actualizar.");
        }

        Reserva::actualizar($id, $libro_id, $lector_id, $fecha_reserva, $estado);
        header("Location: index.php?url=reservas/listar");
        exit;
    }

    public function eliminarForm()
    {
        $id = $_GET["id"] ?? 0;
        $reserva = Reserva::obtenerPorId($id);
        require __DIR__ . "/../views/reservas/eliminar.php";
    }

    public function eliminar()
    {
        $id = (int)($_POST["id"] ?? 0);
        Reserva::eliminar($id);
        header("Location: index.php?url=reservas/listar");
        exit;
    }
}