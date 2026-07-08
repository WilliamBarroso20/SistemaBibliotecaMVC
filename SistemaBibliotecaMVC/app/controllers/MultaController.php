<?php
require_once __DIR__ . "/../models/Multa.php";

class MultaController
{
    // Esta es la función principal que carga la tabla con buscador
    public function listar()
    {
        $busqueda = trim($_POST["buscar"] ?? "");
        $multas = Multa::obtenerPendientes($busqueda);
        require __DIR__ . "/../views/multas/listar.php";
    }

    // Funciones de administración (Crear, Editar, Eliminar)
    public function crearForm() { require __DIR__ . "/../views/multas/crear.php"; }

    public function crear()
    {
        $devolucion_id = (int)($_POST["devolucion_id"] ?? 0);
        $monto = (float)($_POST["monto"] ?? 0);
        $estado = trim($_POST["estado"] ?? "Pendiente");

        if ($devolucion_id === 0 || $monto <= 0) {
            die("Error: El ID de devolución y un monto mayor a 0 son obligatorios.");
        }

        Multa::crear($devolucion_id, $monto, $estado);
        header("Location: index.php?url=multas/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;
        $multa = Multa::obtenerPorId($id);
        require __DIR__ . "/../views/multas/editar.php";
    }

    public function actualizar()
    {
        $id = (int)($_POST["id"] ?? 0);
        $devolucion_id = (int)($_POST["devolucion_id"] ?? 0);
        $monto = (float)($_POST["monto"] ?? 0);
        $estado = trim($_POST["estado"] ?? "Pendiente");

        if ($id === 0 || $devolucion_id === 0 || $monto <= 0) {
            die("Error: Datos no válidos.");
        }

        Multa::actualizar($id, $devolucion_id, $monto, $estado);
        header("Location: index.php?url=multas/listar");
        exit;
    }

    public function eliminarForm()
    {
        $id = $_GET["id"] ?? 0;
        $multa = Multa::obtenerPorId($id);
        require __DIR__ . "/../views/multas/eliminar.php";
    }

    public function eliminar()
    {
        $id = (int)($_POST["id"] ?? 0);
        Multa::eliminar($id);
        header("Location: index.php?url=multas/listar");
        exit;
    }
}