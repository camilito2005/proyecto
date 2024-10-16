<?php

function Mapa_html (){


echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/mapa.css">
</head>
<body>

<div class="container">
    <h1 class="title">Mapa numero 1 prueba </h1>
    <div id="map"></div>
    <form id="myForm" action="../index.php" onsubmit="showLoading()" method="post">
        <button class="btn">
            <i class="fa-solid fa-house"></i> Inicio
        </button>
    </form>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // Crear el mapa centrado en Cartagena
    var map = L.map('map').setView([10.3910, -75.4792], 13);

    // Cargar las capas de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Función para obtener la ubicación actual
    function obtenerUbicacion() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(mostrarUbicacion, manejarError);
        } else {
            alert("La geolocalización no es soportada por este navegador.");
        }
    }

    // Mostrar la ubicación en el mapa
    function mostrarUbicacion(position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;

        // Centrar el mapa en la ubicación actual
        map.setView([lat, lon], 15);

        // Agregar un marcador en la ubicación actual
        L.marker([lat, lon]).addTo(map)
            .bindPopup('Tu ubicación actual')
            .openPopup();
    }

    // Manejar errores en la obtención de la ubicación
    function manejarError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("Se denegó la solicitud de geolocalización.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("La ubicación no está disponible.");
                break;
            case error.TIMEOUT:
                alert("La solicitud de geolocalización ha caducado.");
                break;
            case error.UNKNOWN_ERROR:
                alert("Se produjo un error desconocido.");
                break;
        }
    }

    // Llamar a la función para obtener la ubicación
    obtenerUbicacion();
</script>

</body>
</html>
HTML;
}
?>
