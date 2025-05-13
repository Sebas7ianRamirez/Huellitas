document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.getElementById("descripcion");
    if (!textarea) return;

    function autoResize() {
        // Limitar caracteres a 300
        if (this.value.length > 1000) {
            this.value = this.value.substring(0, 1000);
        }

        // Ajustar altura automáticamente
        this.style.height = "auto";
        this.style.height = this.scrollHeight + "px";
    }

    textarea.addEventListener("input", autoResize);

    // Ajustar altura inicial
    textarea.style.height = "auto";
    textarea.style.height = textarea.scrollHeight + "px";
});
