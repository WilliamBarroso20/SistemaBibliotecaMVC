// Validación nativa de formularios antes del envío
document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.querySelector(".form-validar");
    
    if (formulario) {
        formulario.addEventListener("submit", function (e) {
            const inputs = formulario.querySelectorAll("[required]");
            let valido = true;

            inputs.forEach(input => {
                if (input.value.trim() === "") {
                    valido = false;
                    input.classList.add("is-invalid");
                } else {
                    input.classList.remove("is-invalid");
                    input.classList.add("is-valid");
                }
            });

            if (!valido) {
                e.preventDefault();
                alert("Por favor, llene todos los campos obligatorios obligatoriamente.");
            }
        });
    }
});