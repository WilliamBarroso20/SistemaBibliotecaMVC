<?php
require_once __DIR__ . "/../models/Dashboard.php";

class DashboardController
{
    /**
     * Carga el panel principal (Dashboard) con los contadores
     * y la lista de los últimos movimientos.
     */
    public function index()
    {
        // Obtenemos todos los datos desde el modelo
        $datos = Dashboard::obtenerResumen();

        // Extraemos las variables que usaremos en la vista
        // $resumen contiene: total_libros, libros_prestados, total_lectores, total_multas
        $resumen = $datos['contadores']; 
        
        // $ultimosPrestamos contiene la lista para la tabla
        $ultimosPrestamos = $datos['ultimos'];

        // Cargamos la vista del Dashboard
        require __DIR__ . "/../views/dashboard.php";
    }
}