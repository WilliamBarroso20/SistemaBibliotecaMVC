<?php
require_once __DIR__ . "/../models/Autor.php";

class AutorController
{
    // Muestra la lista completa de autores
public function listar()
{
    $busqueda = trim($_POST["buscar"] ?? "");
    $autores = Autor::obtenerTodos($busqueda);
    require __DIR__ . "/../views/autores/listar.php";
}

    // Despliega el formulario para añadir un autor
    public function crearForm()
    {
        require __DIR__ . "/../views/autores/crear.php";
    }

    // Recibe los datos del formulario e invoca la creación
    public function crear()
    {
        $nombre = trim($_POST["nombre"] ?? "");
        $nacionalidad = trim($_POST["nacionalidad"] ?? "");

        // Validación de Backend (Obligatoria según la rúbrica)
        if (empty($nombre) || empty($nacionalidad)) {
            die("Error: Los datos enviados no pueden estar vacíos.");
        }

        Autor::crear($nombre, $nacionalidad);
        header("Location: index.php?url=autores/listar");
        exit;
    }

    // Carga los datos de un autor y los envía al formulario de edición
    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;
        $autor = Autor::obtenerPorId($id);
        require __DIR__ . "/../views/autores/editar.php";
    }

    // Procesa los cambios de edición sobre la base de datos
    public function actualizar()
    {
        $id = (int)($_POST["id"] ?? 0);
        $nombre = trim($_POST["nombre"] ?? "");
        $nacionalidad = trim($_POST["nacionalidad"] ?? "");

        if ($id === 0 || empty($nombre) || empty($nacionalidad)) {
            die("Error: Datos no válidos para la actualización.");
        }

        Autor::actualizar($id, $nombre, $nacionalidad);
        header("Location: index.php?url=autores/listar");
        exit;
    }

    // Muestra la pantalla intermedia de confirmación de borrado
    public function eliminarForm()
    {
        $id = $_GET["id"] ?? 0;
        $autor = Autor::obtenerPorId($id);
        require __DIR__ . "/../views/autores/eliminar.php";
    }

    // Ejecuta la baja definitiva del registro
    public function eliminar()
    {
        $id = (int)($_POST["id"] ?? 0);
        Autor::eliminar($id);
        header("Location: index.php?url=autores/listar");
        exit;
    }
}