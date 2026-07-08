<?php
require_once __DIR__ . "/../models/Categoria.php";

class CategoriaController
{
    public function listar()
    {
        $categorias = Categoria::obtenerTodos();
        require __DIR__ . "/../views/categorias/listar.php";
    }

    public function crearForm()
    {
        require __DIR__ . "/../views/categorias/crear.php";
    }

    public function crear()
    {
        $nombre = trim($_POST["nombre"] ?? "");

        if (empty($nombre)) {
            die("Error: El nombre de la categoría no puede estar vacío.");
        }

        Categoria::crear($nombre);
        header("Location: index.php?url=categorias/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;
        $categoria = Categoria::obtenerPorId($id);
        require __DIR__ . "/../views/categorias/editar.php";
    }

    public function actualizar()
    {
        $id = (int)($_POST["id"] ?? 0);
        $nombre = trim($_POST["nombre"] ?? "");

        if ($id === 0 || empty($nombre)) {
            die("Error: Datos no válidos.");
        }

        Categoria::actualizar($id, $nombre);
        header("Location: index.php?url=categorias/listar");
        exit;
    }

    public function eliminarForm()
    {
        $id = $_GET["id"] ?? 0;
        $categoria = Categoria::obtenerPorId($id);
        require __DIR__ . "/../views/categorias/eliminar.php";
    }

    public function eliminar()
    {
        $id = (int)($_POST["id"] ?? 0);
        Categoria::eliminar($id);
        header("Location: index.php?url=categorias/listar");
        exit;
    }
}