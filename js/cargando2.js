
document.addEventListener('DOMContentLoaded', () => {
    initializeLoadingLink();
});

function initializeLoadingLink() {
    const link = document.getElementById('loadingLink');
    const spinner = document.getElementById('loadingSpinner');

    link.addEventListener('click', (event) => {
        event.preventDefault(); // Previene la acción predeterminada del enlace

        // Muestra el spinner
        spinner.style.display = 'inline-block';

        // Usa requestAnimationFrame para asegurar que el spinner se renderice
        requestAnimationFrame(() => {
            // Redirige a la URL del enlace
            window.location.href = link.href;
        });
    });
}