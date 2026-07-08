<?php
require_once __DIR__ . "/../../config/conexion.php";

class Prestamo
{
    // Obtiene todos los préstamos con los nombres reales
    public static function obtenerTodos($busqueda = "")
    {
        $conn = Conexion::conectar();
        $sql = "SELECT p.id, p.fecha_prestamo, p.fecha_devolucion_esperada, p.estado,
                       l.titulo AS libro, lec.nombre AS lector, e.nombre AS empleado
                FROM prestamos p
                INNER JOIN libros l ON p.libro_id = l.id
                INNER JOIN lectores lec ON p.lector_id = lec.id
                INNER JOIN empleados e ON p.empleado_id = e.id";

        if (!empty($busqueda)) {
            $busqueda = $conn->real_escape_string($busqueda);
            $sql .= " WHERE l.titulo LIKE '%$busqueda%' OR lec.nombre LIKE '%$busqueda%' OR p.estado LIKE '%$busqueda%'";
        }

        $sql .= " ORDER BY p.id DESC";
        $res = $conn->query($sql);
        $prestamos = [];
        while ($fila = $res->fetch_assoc()) { $prestamos[] = $fila; }
        return $prestamos;
    }
    public static function actualizarEstado($id, $estado) {
    $conn = Conexion::conectar();
    $stmt = $conn->prepare("UPDATE prestamos SET estado = ? WHERE id = ?");
    $stmt->bind_param("si", $estado, $id);
    $stmt->execute();
}

    
    public static function crear($libro_id, $lector_id, $empleado_id, $fecha_p, $fecha_d, $estado)
    {
        $conn = Conexion::conectar();
        
        // 1. Verificamos si el libro ya está prestado (estado 'Pendiente')
        $check = $conn->query("SELECT COUNT(*) as total FROM prestamos WHERE libro_id = " . (int)$libro_id . " AND estado = 'Pendiente'");
        $resultado = $check->fetch_assoc();

        if ($resultado['total'] > 0) {
            // Retornamos false o lanzamos un mensaje si el libro está ocupado
            return "error_libro_ocupado"; 
        }

        // 2. Si está libre, procedemos con la inserción
        $libro_id = (int)$libro_id;
        $lector_id = (int)$lector_id;
        $empleado_id = (int)$empleado_id;
        $fecha_p = $conn->real_escape_string($fecha_p);
        $fecha_d = $conn->real_escape_string($fecha_d);
        $estado = $conn->real_escape_string($estado);

        $sql = "INSERT INTO prestamos (libro_id, lector_id, empleado_id, fecha_prestamo, fecha_devolucion_esperada, estado) 
                VALUES ($libro_id, $lector_id, $empleado_id, '$fecha_p', '$fecha_d', '$estado')";
        return $conn->query($sql);
    }

    
    public static function obtenerPorId($id) {
        $conn = Conexion::conectar();
        $res = $conn->query("SELECT * FROM prestamos WHERE id = " . (int)$id . " LIMIT 1");
        return $res->fetch_assoc();
    }

    public static function actualizar($id, $libro_id, $lector_id, $empleado_id, $fecha_p, $fecha_d, $estado) {
        $conn = Conexion::conectar();
        $sql = "UPDATE prestamos SET libro_id = ".(int)$libro_id.", lector_id = ".(int)$lector_id.", empleado_id = ".(int)$empleado_id.", 
                fecha_prestamo = '".$conn->real_escape_string($fecha_p)."', 
                fecha_devolucion_esperada = '".$conn->real_escape_string($fecha_d)."', 
                estado = '".$conn->real_escape_string($estado)."' WHERE id = ".(int)$id;
        return $conn->query($sql);
    }

    public static function eliminar($id) {
        $conn = Conexion::conectar();
        return $conn->query("DELETE FROM prestamos WHERE id = " . (int)$id);
    }
}