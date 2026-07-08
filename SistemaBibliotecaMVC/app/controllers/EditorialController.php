<?php
require_once __DIR__ . "/../models/Editorial.php";

class EditorialController
{
    public function listar()
    {
        $editoriales = Editorial::obtenerTodos();
        require __DIR__ . "/../views/editoriales/listar.php";
    }

    public function crearForm()
    {
        require __DIR__ . "/../views/editoriales/crear.php";
    }

    public function crear()
    {
        $nombre = trim($_POST["nombre"] ?? "");
        $telefono = trim($_POST["telefono"] ?? "");

        if (empty($nombre)) {
            die("Error: El nombre de la editorial es obligatorio.");
        }

        Editorial::crear($nombre, $telefono);
        header("Location: index.php?url=editoriales/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;
        $editorial = Editorial::obtenerPorId($id);
        require __DIR__ . "/../views/editoriales/editar.php";
    }

    public function actualizar()
    {
        $id = (int)($_POST["id"] ?? 0);
        $nombre = trim($_POST["nombre"] ?? "");
        $telefono = trim($_POST["telefono"] ?? "");

        if ($id === 0 || empty($nombre)) {
            die("Error: Datos insuficientes para actualizar.");
        }

        Editorial::actualizar($id, $nombre, $telefono);
        header("Location: index.php?url=editoriales/listar");
        exit;
    }

    public function eliminarForm()
    {
        $id = $_GET["id"] ?? 0;
        $editorial = Editorial::obtenerPorId($id);
        require __DIR__ . "/../views/editoriales/eliminar.php";
    }

    public function eliminar()
    {
        $id = (int)($_POST["id"] ?? 0);
        Editorial::eliminar($id);
        header("Location: index.php?url=editoriales/listar");
        exit;
    }
}