<?php
require_once __DIR__ . "/../../config/conexion.php";

class Autor
{
    // Obtiene todos los autores, con opción de filtrarlos por una búsqueda
    public static function obtenerTodos($busqueda = "")
    {
        $conn = Conexion::conectar();
        $sql = "SELECT id, nombre, nacionalidad FROM autores";

        // Si hay texto en el buscador, filtramos por nombre o nacionalidad
        if (!empty($busqueda)) {
            $busqueda = $conn->real_escape_string($busqueda);
            $sql .= " WHERE nombre LIKE '%$busqueda%' 
                      OR nacionalidad LIKE '%$busqueda%'";
        }

        $sql .= " ORDER BY id DESC";
        $res = $conn->query($sql);

        $autores = [];
        while ($fila = $res->fetch_assoc()) {
            $autores[] = $fila;
        }
        return $autores;
    }

    // Obtiene un autor específico
    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "SELECT * FROM autores WHERE id = $id LIMIT 1";
        $res = $conn->query($sql);
        return $res->fetch_assoc();
    }

    // Inserta un nuevo autor
    public static function crear($nombre, $nacionalidad)
    {
        $conn = Conexion::conectar();
        $nombre = $conn->real_escape_string($nombre);
        $nacionalidad = $conn->real_escape_string($nacionalidad);

        $sql = "INSERT INTO autores (nombre, nacionalidad) VALUES ('$nombre', '$nacionalidad')";
        return $conn->query($sql);
    }

    // Actualiza los datos
    public static function actualizar($id, $nombre, $nacionalidad)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;
        $nombre = $conn->real_escape_string($nombre);
        $nacionalidad = $conn->real_escape_string($nacionalidad);

        $sql = "UPDATE autores SET nombre = '$nombre', nacionalidad = '$nacionalidad' WHERE id = $id";
        return $conn->query($sql);
    }

    // Elimina un autor
    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "DELETE FROM autores WHERE id = $id";
        return $conn->query($sql);
    }
}