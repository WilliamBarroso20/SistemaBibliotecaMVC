// Alertas visuales de confirmación de acciones sensibles
function confirmarEliminacion(evento) {
    if (!confirm("¿Está completamente seguro de que desea eliminar este registro? Esta acción no se puede deshacer.")) {
        evento.preventDefault();
        return false;
    }
    return true;
}