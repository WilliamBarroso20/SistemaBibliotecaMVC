<?php
require_once __DIR__ . "/../../config/conexion.php";

class Dashboard {
    public static function obtenerResumen() {
        $conn = Conexion::conectar();
        
        // 1. Contadores 
        $query = "SELECT 
            (SELECT COUNT(*) FROM libros) AS total_libros,
            (SELECT COUNT(*) FROM prestamos WHERE estado = 'Pendiente') AS libros_prestados,
            (SELECT COUNT(*) FROM lectores) AS total_lectores,
            (SELECT COUNT(*) FROM multas) AS total_multas";
        $res = $conn->query($query);
        $datos = $res->fetch_assoc();

        // 2. Últimos 5 préstamos
        $queryPrestamos = "SELECT p.fecha_prestamo, l.titulo, lec.nombre 
                           FROM prestamos p 
                           INNER JOIN libros l ON p.libro_id = l.id 
                           INNER JOIN lectores lec ON p.lector_id = lec.id 
                           ORDER BY p.id DESC LIMIT 5";
        $resP = $conn->query($queryPrestamos);
        
        $ultimos = [];
        while ($fila = $resP->fetch_assoc()) {
            $ultimos[] = $fila;
        }
        
        return ['contadores' => $datos, 'ultimos' => $ultimos];
    }
}