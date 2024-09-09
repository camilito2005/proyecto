function cargarDatos() {
    var producto = document.getElementById('producto').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById('nombre').value = data.nombre;
            document.getElementById('descripcion').value = data.descripcion;
            document.getElementById('precio').value = data.precio;
            calcularTotal();
        }
    };
    xhttp.open("GET", "../Librerias/lib_facturas.php?nombre=" + encodeURIComponent(producto), true);
    xhttp.send();
}

function calcularTotal() {
    var cantidad = document.getElementById('cantidad').value;
    var precio = document.getElementById('precio').value;
    var total = cantidad * precio;
    document.getElementById('total').value = total.toFixed(2);
}