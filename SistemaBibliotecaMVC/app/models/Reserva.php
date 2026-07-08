<?php
require_once __DIR__ . "/../../config/conexion.php";

class Reserva
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();
        // Hacemos INNER JOIN para traer el título del libro y el nombre del lector
        $sql = "SELECT r.id, r.fecha_reserva, r.estado, 
                       l.titulo AS libro, lec.nombre AS lector
                FROM reservas r
                INNER JOIN libros l ON r.libro_id = l.id
                INNER JOIN lectores lec ON r.lector_id = lec.id
                ORDER BY r.id DESC";
        $res = $conn->query($sql);

        $reservas = [];
        while ($fila = $res->fetch_assoc()) {
            $reservas[] = $fila;
        }
        return $reservas;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "SELECT * FROM reservas WHERE id = $id LIMIT 1";
        $res = $conn->query($sql);
        return $res->fetch_assoc();
    }

    public static function crear($libro_id, $lector_id, $fecha_reserva, $estado)
    {
        $conn = Conexion::conectar();
        $libro_id = (int)$libro_id;
        $lector_id = (int)$lector_id;
        $fecha_reserva = $conn->real_escape_string($fecha_reserva);
        $estado = $conn->real_escape_string($estado);

        $sql = "INSERT INTO reservas (libro_id, lector_id, fecha_reserva, estado) 
                VALUES ($libro_id, $lector_id, '$fecha_reserva', '$estado')";
        return $conn->query($sql);
    }

    public static function actualizar($id, $libro_id, $lector_id, $fecha_reserva, $estado)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;
        $libro_id = (int)$libro_id;
        $lector_id = (int)$lector_id;
        $fecha_reserva = $conn->real_escape_string($fecha_reserva);
        $estado = $conn->real_escape_string($estado);

        $sql = "UPDATE reservas 
                SET libro_id = $libro_id, lector_id = $lector_id, 
                    fecha_reserva = '$fecha_reserva', estado = '$estado' 
                WHERE id = $id";
        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "DELETE FROM reservas WHERE id = $id";
        return $conn->query($sql);
    }
}