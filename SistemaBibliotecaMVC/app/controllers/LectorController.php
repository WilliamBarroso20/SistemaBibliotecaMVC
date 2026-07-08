<?php
require_once __DIR__ . "/../models/Lector.php";

class LectorController
{
    public function listar()
    {
        $busqueda = trim($_POST["buscar"] ?? "");
        $lectores = Lector::obtenerTodos($busqueda);
        require __DIR__ . "/../views/lectores/listar.php";
    }

    public function crearForm()
    {
        require __DIR__ . "/../views/lectores/crear.php";
    }

    public function crear()
    {
        $nombre = trim($_POST["nombre"] ?? "");
        $correo = trim($_POST["correo"] ?? "");
        $telefono = trim($_POST["telefono"] ?? "");

        if (empty($nombre) || empty($correo)) {
            die("Error: El nombre y el correo son obligatorios.");
        }

        Lector::crear($nombre, $correo, $telefono);
        header("Location: index.php?url=lectores/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;
        $lector = Lector::obtenerPorId($id);
        require __DIR__ . "/../views/lectores/editar.php";
    }

    public function actualizar()
    {
        $id = (int)($_POST["id"] ?? 0);
        $nombre = trim($_POST["nombre"] ?? "");
        $correo = trim($_POST["correo"] ?? "");
        $telefono = trim($_POST["telefono"] ?? "");

        if ($id === 0 || empty($nombre) || empty($correo)) {
            die("Error: Datos no válidos.");
        }

        Lector::actualizar($id, $nombre, $correo, $telefono);
        header("Location: index.php?url=lectores/listar");
        exit;
    }

    public function eliminarForm()
    {
        $id = $_GET["id"] ?? 0;
        $lector = Lector::obtenerPorId($id);
        require __DIR__ . "/../views/lectores/eliminar.php";
    }

    public function eliminar()
    {
        $id = (int)($_POST["id"] ?? 0);
        Lector::eliminar($id);
        header("Location: index.php?url=lectores/listar");
        exit;
    }
}