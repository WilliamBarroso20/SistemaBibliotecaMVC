<?php
require_once __DIR__ . "/../models/Empleado.php";

class EmpleadoController
{
    public function listar()
    {
        $empleados = Empleado::obtenerTodos();
        require __DIR__ . "/../views/empleados/listar.php";
    }

    public function crearForm()
    {
        require __DIR__ . "/../views/empleados/crear.php";
    }

    public function crear()
    {
        $nombre = trim($_POST["nombre"] ?? "");
        $cargo = trim($_POST["cargo"] ?? "");
        $telefono = trim($_POST["telefono"] ?? "");

        if (empty($nombre) || empty($cargo)) {
            die("Error: El nombre y el cargo son campos obligatorios.");
        }

        Empleado::crear($nombre, $cargo, $telefono);
        header("Location: index.php?url=empleados/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;
        $empleado = Empleado::obtenerPorId($id);
        require __DIR__ . "/../views/empleados/editar.php";
    }

    public function actualizar()
    {
        $id = (int)($_POST["id"] ?? 0);
        $nombre = trim($_POST["nombre"] ?? "");
        $cargo = trim($_POST["cargo"] ?? "");
        $telefono = trim($_POST["telefono"] ?? "");

        if ($id === 0 || empty($nombre) || empty($cargo)) {
            die("Error: Datos insuficientes para actualizar.");
        }

        Empleado::actualizar($id, $nombre, $cargo, $telefono);
        header("Location: index.php?url=empleados/listar");
        exit;
    }

    public function eliminarForm()
    {
        $id = $_GET["id"] ?? 0;
        $empleado = Empleado::obtenerPorId($id);
        require __DIR__ . "/../views/empleados/eliminar.php";
    }

    public function eliminar()
    {
        $id = (int)($_POST["id"] ?? 0);
        Empleado::eliminar($id);
        header("Location: index.php?url=empleados/listar");
        exit;
    }
}