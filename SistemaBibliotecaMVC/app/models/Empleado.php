<?php
require_once __DIR__ . "/../../config/conexion.php";

class Empleado
{
    // Recupera todos los empleados de la base de datos
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();
        $sql = "SELECT id, nombre, cargo, telefono FROM empleados ORDER BY id DESC";
        $res = $conn->query($sql);

        $empleados = [];
        while ($fila = $res->fetch_assoc()) {
            $empleados[] = $fila;
        }
        return $empleados;
    }

    // Busca un empleado por su ID
    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "SELECT id, nombre, cargo, telefono FROM empleados WHERE id = $id LIMIT 1";
        $res = $conn->query($sql);
        return $res->fetch_assoc();
    }

    // Inserta un nuevo empleado en la tabla
    public static function crear($nombre, $cargo, $telefono)
    {
        $conn = Conexion::conectar();
        $nombre = $conn->real_escape_string($nombre);
        $cargo = $conn->real_escape_string($cargo);
        $telefono = $conn->real_escape_string($telefono);

        $sql = "INSERT INTO empleados (nombre, cargo, telefono) VALUES ('$nombre', '$cargo', '$telefono')";
        return $conn->query($sql);
    }

    // Actualiza los datos de un empleado existente
    public static function actualizar($id, $nombre, $cargo, $telefono)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;
        $nombre = $conn->real_escape_string($nombre);
        $cargo = $conn->real_escape_string($cargo);
        $telefono = $conn->real_escape_string($telefono);

        $sql = "UPDATE empleados SET nombre = '$nombre', cargo = '$cargo', telefono = '$telefono' WHERE id = $id";
        return $conn->query($sql);
    }

    // Elimina el registro definitivo de un empleado
    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "DELETE FROM empleados WHERE id = $id";
        return $conn->query($sql);
    }
}