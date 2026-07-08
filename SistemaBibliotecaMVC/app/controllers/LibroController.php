<?php
require_once __DIR__ . "/../models/Libro.php";
// Llamamos a los otros modelos para llenar las listas desplegables
require_once __DIR__ . "/../models/Autor.php";
require_once __DIR__ . "/../models/Categoria.php";
require_once __DIR__ . "/../models/Editorial.php";

class LibroController
{
public function listar()
    {
        // Atrapamos la palabra que el usuario escribe en el buscador (si no hay nada, queda vacío)
        $busqueda = trim($_POST["buscar"] ?? "");
        
        // Le pasamos esa palabra al modelo
        $libros = Libro::obtenerTodos($busqueda);
        
        require __DIR__ . "/../views/libros/listar.php";
    }

    public function crearForm()
    {
        // Traemos los datos para los selectores del formulario
        $autores = Autor::obtenerTodos();
        $categorias = Categoria::obtenerTodos();
        $editoriales = Editorial::obtenerTodos();
        
        require __DIR__ . "/../views/libros/crear.php";
    }

    public function crear()
    {
        $titulo = trim($_POST["titulo"] ?? "");
        $anio_publicacion = (int)($_POST["anio_publicacion"] ?? 0);
        $autor_id = (int)($_POST["autor_id"] ?? 0);
        $categoria_id = (int)($_POST["categoria_id"] ?? 0);
        $editorial_id = (int)($_POST["editorial_id"] ?? 0);

        if (empty($titulo) || $autor_id === 0 || $categoria_id === 0 || $editorial_id === 0) {
            die("Error: Todos los campos del libro son obligatorios y deben estar vinculados.");
        }

        Libro::crear($titulo, $anio_publicacion, $autor_id, $categoria_id, $editorial_id);
        header("Location: index.php?url=libros/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;
        $libro = Libro::obtenerPorId($id);
        
        // Traemos las listas para que el usuario pueda cambiar de autor/categoría
        $autores = Autor::obtenerTodos();
        $categorias = Categoria::obtenerTodos();
        $editoriales = Editorial::obtenerTodos();
        
        require __DIR__ . "/../views/libros/editar.php";
    }

    public function actualizar()
    {
        $id = (int)($_POST["id"] ?? 0);
        $titulo = trim($_POST["titulo"] ?? "");
        $anio_publicacion = (int)($_POST["anio_publicacion"] ?? 0);
        $autor_id = (int)($_POST["autor_id"] ?? 0);
        $categoria_id = (int)($_POST["categoria_id"] ?? 0);
        $editorial_id = (int)($_POST["editorial_id"] ?? 0);

        if ($id === 0 || empty($titulo)) {
            die("Error: Datos no válidos.");
        }

        Libro::actualizar($id, $titulo, $anio_publicacion, $autor_id, $categoria_id, $editorial_id);
        header("Location: index.php?url=libros/listar");
        exit;
    }

    public function eliminarForm()
    {
        $id = $_GET["id"] ?? 0;
        $libro = Libro::obtenerPorId($id);
        require __DIR__ . "/../views/libros/eliminar.php";
    }

    public function eliminar()
    {
        $id = (int)($_POST["id"] ?? 0);
        Libro::eliminar($id);
        header("Location: index.php?url=libros/listar");
        exit;
    }
}