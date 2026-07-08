<?php
require_once __DIR__ . "/../../config/conexion.php";

class Lector
{
    public static function obtenerTodos($busqueda = "")
    {
        $conn = Conexion::conectar();
        $sql = "SELECT * FROM lectores";

        if (!empty($busqueda)) {
            $busqueda = $conn->real_escape_string($busqueda);
            $sql .= " WHERE nombre LIKE '%$busqueda%' 
                      OR correo LIKE '%$busqueda%' 
                      OR telefono LIKE '%$busqueda%'";
        }

        $sql .= " ORDER BY id DESC";
        $res = $conn->query($sql);

        $lectores = [];
        while ($fila = $res->fetch_assoc()) {
            $lectores[] = $fila;
        }
        return $lectores;
    }

    public static function obtenerPorId($id) {
        $conn = Conexion::conectar();
        $res = $conn->query("SELECT * FROM lectores WHERE id = " . (int)$id);
        return $res->fetch_assoc();
    }

    public static function crear($nombre, $correo, $telefono)
    {
        $conn = Conexion::conectar();
        $nombre = $conn->real_escape_string($nombre);
        $correo = $conn->real_escape_string($correo);
        $telefono = $conn->real_escape_string($telefono);

        $sql = "INSERT INTO lectores (nombre, correo, telefono) VALUES ('$nombre', '$correo', '$telefono')";
        return $conn->query($sql);
    }

    public static function actualizar($id, $nombre, $correo, $telefono)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;
        $nombre = $conn->real_escape_string($nombre);
        $correo = $conn->real_escape_string($correo);
        $telefono = $conn->real_escape_string($telefono);

        $sql = "UPDATE lectores SET nombre = '$nombre', correo = '$correo', telefono = '$telefono' WHERE id = $id";
        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "DELETE FROM lectores WHERE id = $id";
        return $conn->query($sql);
    }
}