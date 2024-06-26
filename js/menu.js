// Esper a que el DOM esté completamente cargado antes de ejecutar el código
document.addEventListener("DOMContentLoaded", function() {
    // Obtengo la referencia al botón de alternancia del menú
    const menuToggle = document.getElementById("menu-toggle");
    // Obtiene la referencia a la lista de enlaces del menú
    const navLinks = document.getElementById("nav-links");

    // Agrego un evento de clic al botón de alternancia del menú
    menuToggle.addEventListener("click", function() {
          // Alterno la clase "active" en la lista de enlaces del menú cuando se hace clic en el botón de alternancia
        navLinks.classList.toggle("active");
    });
});
