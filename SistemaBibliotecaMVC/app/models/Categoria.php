<?php
require_once __DIR__ . "/../../config/conexion.php";

class Categoria
{
    // Obtiene todas las categorías para llenar la tabla
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();
        $sql = "SELECT id, nombre FROM categorias ORDER BY id DESC";
        $res = $conn->query($sql);

        $categorias = [];
        while ($fila = $res->fetch_assoc()) {
            $categorias[] = $fila;
        }
        return $categorias;
    }

    // Busca una categoría específica por su ID
    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "SELECT id, nombre FROM categorias WHERE id = $id LIMIT 1";
        $res = $conn->query($sql);
        return $res->fetch_assoc();
    }

    // Guarda una nueva categoría
    public static function crear($nombre)
    {
        $conn = Conexion::conectar();
        $nombre = $conn->real_escape_string($nombre);

        $sql = "INSERT INTO categorias (nombre) VALUES ('$nombre')";
        return $conn->query($sql);
    }

    // Actualiza el nombre de una categoría existente
    public static function actualizar($id, $nombre)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;
        $nombre = $conn->real_escape_string($nombre);

        $sql = "UPDATE categorias SET nombre = '$nombre' WHERE id = $id";
        return $conn->query($sql);
    }

    // Elimina la categoría de la base de datos
    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "DELETE FROM categorias WHERE id = $id";
        return $conn->query($sql);
    }
}