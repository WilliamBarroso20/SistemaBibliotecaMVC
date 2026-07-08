<?php
require_once __DIR__ . "/../../config/conexion.php";

class Multa {
    // Obtiene multas calculadas dinámicamente según retraso
   public static function obtenerPendientes($busqueda = "") {
    $conn = Conexion::conectar();
    // Buscamos devoluciones donde la fecha real sea mayor a la esperada
    $sql = "SELECT p.id, l.titulo AS libro, lec.nombre AS lector, 
                   DATEDIFF(d.fecha_devolucion_real, p.fecha_devolucion_esperada) AS dias_retraso
            FROM devoluciones d
            INNER JOIN prestamos p ON d.prestamo_id = p.id
            INNER JOIN libros l ON p.libro_id = l.id
            INNER JOIN lectores lec ON p.lector_id = lec.id
            WHERE d.fecha_devolucion_real > p.fecha_devolucion_esperada";

        if (!empty($busqueda)) {
            $busqueda = $conn->real_escape_string($busqueda);
            $sql .= " AND (l.titulo LIKE '%$busqueda%' OR lec.nombre LIKE '%$busqueda%')";
        }

        $res = $conn->query($sql);
        $multas = [];
        while ($fila = $res->fetch_assoc()) {
            $fila['monto'] = $fila['dias_retraso'] * 0.50; 
            $multas[] = $fila;
        }
        return $multas;
    }

    public static function obtenerPorId($id) {
        $conn = Conexion::conectar();
        $res = $conn->query("SELECT * FROM multas WHERE id = " . (int)$id);
        return $res->fetch_assoc();
    }

    public static function crear($devolucion_id, $monto, $estado) {
        $conn = Conexion::conectar();
        $sql = "INSERT INTO multas (devolucion_id, monto, estado) VALUES ($devolucion_id, $monto, '$estado')";
        return $conn->query($sql);
    }

    public static function actualizar($id, $devolucion_id, $monto, $estado) {
        $conn = Conexion::conectar();
        $sql = "UPDATE multas SET devolucion_id=$devolucion_id, monto=$monto, estado='$estado' WHERE id=$id";
        return $conn->query($sql);
    }

    public static function eliminar($id) {
        $conn = Conexion::conectar();
        return $conn->query("DELETE FROM multas WHERE id = " . (int)$id);
    }
}