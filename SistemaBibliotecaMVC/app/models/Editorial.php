<?php
require_once __DIR__ . "/../../config/conexion.php";

class Editorial
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();
        $sql = "SELECT id, nombre, telefono FROM editoriales ORDER BY id DESC";
        $res = $conn->query($sql);

        $editoriales = [];
        while ($fila = $res->fetch_assoc()) {
            $editoriales[] = $fila;
        }
        return $editoriales;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "SELECT id, nombre, telefono FROM editoriales WHERE id = $id LIMIT 1";
        $res = $conn->query($sql);
        return $res->fetch_assoc();
    }

    public static function crear($nombre, $telefono)
    {
        $conn = Conexion::conectar();
        $nombre = $conn->real_escape_string($nombre);
        $telefono = $conn->real_escape_string($telefono);

        $sql = "INSERT INTO editoriales (nombre, telefono) VALUES ('$nombre', '$telefono')";
        return $conn->query($sql);
    }

    public static function actualizar($id, $nombre, $telefono)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;
        $nombre = $conn->real_escape_string($nombre);
        $telefono = $conn->real_escape_string($telefono);

        $sql = "UPDATE editoriales SET nombre = '$nombre', telefono = '$telefono' WHERE id = $id";
        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "DELETE FROM editoriales WHERE id = $id";
        return $conn->query($sql);
    }
}