<?php
require_once __DIR__ . "/../../config/conexion.php";

class Devolucion
{
    // Obtiene todas las devoluciones cruzando datos con préstamos, libros y lectores
    public static function obtenerTodos($busqueda = "")
{
    $conn = Conexion::conectar();
   
    $sql = "SELECT d.id, d.prestamo_id, d.fecha_devolucion_real, d.estado_libro, 
                   IFNULL(l.titulo, 'Sin libro') AS libro, 
                   IFNULL(lec.nombre, 'Sin lector') AS lector
            FROM devoluciones d
            LEFT JOIN prestamos p ON d.prestamo_id = p.id
            LEFT JOIN libros l ON p.libro_id = l.id
            LEFT JOIN lectores lec ON p.lector_id = lec.id
            ORDER BY d.id DESC";

    $res = $conn->query($sql);
    $devoluciones = [];
    while ($fila = $res->fetch_assoc()) {
        $devoluciones[] = $fila;
    }
    return $devoluciones;
}
   
    // Busca una devolución específica
    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "SELECT id, prestamo_id, fecha_devolucion_real, estado_libro FROM devoluciones WHERE id = $id LIMIT 1";
        $res = $conn->query($sql);
        return $res->fetch_assoc();
    }

    // Registra una nueva devolución
    public static function crear($prestamo_id, $fecha, $estado)
    {
        $conn = Conexion::conectar();
        $prestamo_id = (int)$prestamo_id;
        $fecha = $conn->real_escape_string($fecha);
        $estado = $conn->real_escape_string($estado);

        $sql = "INSERT INTO devoluciones (prestamo_id, fecha_devolucion_real, estado_libro) 
                VALUES ($prestamo_id, '$fecha', '$estado')";
        return $conn->query($sql);
    }

    // Actualiza los datos
    public static function actualizar($id, $prestamo_id, $fecha, $estado)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;
        $prestamo_id = (int)$prestamo_id;
        $fecha = $conn->real_escape_string($fecha);
        $estado = $conn->real_escape_string($estado);

        $sql = "UPDATE devoluciones 
                SET prestamo_id = $prestamo_id, fecha_devolucion_real = '$fecha', estado_libro = '$estado' 
                WHERE id = $id";
        return $conn->query($sql);
    }

    // Elimina el registro
    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;

        $sql = "DELETE FROM devoluciones WHERE id = $id";
        return $conn->query($sql);
    }
}