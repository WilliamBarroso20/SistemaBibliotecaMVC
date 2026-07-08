<?php
require_once __DIR__ . "/../../config/conexion.php";

class Libro
{
    // Obtiene todos los libros, con opción de filtrarlos por una búsqueda completa
    public static function obtenerTodos($busqueda = "")
    {
        $conn = Conexion::conectar();
        $sql = "SELECT l.id, l.titulo, l.anio_publicacion, 
                       a.nombre AS autor, c.nombre AS categoria, e.nombre AS editorial
                FROM libros l
                INNER JOIN autores a ON l.autor_id = a.id
                INNER JOIN categorias c ON l.categoria_id = c.id
                INNER JOIN editoriales e ON l.editorial_id = e.id";

        // Si hay texto en el buscador, filtramos por título, autor, categoría o AÑO
        if (!empty($busqueda)) {
            $busqueda = $conn->real_escape_string($busqueda);
            $sql .= " WHERE l.titulo LIKE '%$busqueda%' 
                      OR a.nombre LIKE '%$busqueda%' 
                      OR c.nombre LIKE '%$busqueda%'
                      OR l.anio_publicacion LIKE '%$busqueda%'";
        }

        $sql .= " ORDER BY l.id DESC";

        $res = $conn->query($sql);
        $libros = [];
        while ($fila = $res->fetch_assoc()) {
            $libros[] = $fila;
        }
        return $libros;
    }

    // Obtiene un libro específico 
    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "SELECT * FROM libros WHERE id = $id LIMIT 1";
        $res = $conn->query($sql);
        return $res->fetch_assoc();
    }

    // Inserta un nuevo libro respetando las llaves foráneas
    public static function crear($titulo, $anio_publicacion, $autor_id, $categoria_id, $editorial_id)
    {
        $conn = Conexion::conectar();
        $titulo = $conn->real_escape_string($titulo);
        $anio_publicacion = (int)$anio_publicacion;
        $autor_id = (int)$autor_id;
        $categoria_id = (int)$categoria_id;
        $editorial_id = (int)$editorial_id;

        $sql = "INSERT INTO libros (titulo, anio_publicacion, autor_id, categoria_id, editorial_id) 
                VALUES ('$titulo', $anio_publicacion, $autor_id, $categoria_id, $editorial_id)";
        return $conn->query($sql);
    }

    // Actualiza los datos
    public static function actualizar($id, $titulo, $anio_publicacion, $autor_id, $categoria_id, $editorial_id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;
        $titulo = $conn->real_escape_string($titulo);
        $anio_publicacion = (int)$anio_publicacion;
        $autor_id = (int)$autor_id;
        $categoria_id = (int)$categoria_id;
        $editorial_id = (int)$editorial_id;

        $sql = "UPDATE libros 
                SET titulo = '$titulo', anio_publicacion = $anio_publicacion, 
                    autor_id = $autor_id, categoria_id = $categoria_id, editorial_id = $editorial_id 
                WHERE id = $id";
        return $conn->query($sql);
    }

    // Elimina el registro del libro
    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "DELETE FROM libros WHERE id = $id";
        return $conn->query($sql);
    }
}