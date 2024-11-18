$("#search").keyup(function () {
    let search = $("#search").val();
    //console.log(search);

    if (search) {
        $.ajax({
            url: "./usuarios.php?accion=buscar", // URL con la acción "buscar"
            type: "POST",
            data: { search },
            success: function (response) {
                //console.log(response);
                try {
                    if (response) {
                        let tasks = JSON.parse(response);
                        if (tasks.length > 0) {
                    let template = "";
                    tasks.forEach((task) => {
                        // Encripta el ID usando btoa (base64)
                    let idencriptado = btoa(task.id);
                        template += `
                            <tr> 
                                <td>${task.id}</td>
                                <td>${task.dni}</td>
                                <td>${task.nombre}</td>
                                <td>${task.apellidos}</td>
                                <td>${task.telefono}</td>
                                <td>${task.direccion}</td>
                                <td>${task.correo}</td>
                                <td>${task.contraseña}</td>
                                <td>${task.cargo}</td>
                                <td>
                    <a href='usuarios.php?accion=modificar&id=${encodeURIComponent(idencriptado)}'><i class='fa-solid fa-pen'>m</i></a>
                    <a href='usuarios.php?accion=eliminar&id=${encodeURIComponent(idencriptado)}' onclick='return pregunta()'><i class='fa-solid fa-trash'>e</i></a>
                  </td>";
                            </tr>
                        `;
                    });
                    $("#resultados-usuarios").html(template);
                } else {
                            $("#resultados-usuarios").html("<tr><td colspan='6'>No se encontraron resultados</td></tr>");
                        }
                    } else {
                        console.log("La respuesta está vacía");
                        $("#resultados-usuarios").html("<tr><td colspan='6'>No se encontraron resultados</td></tr>");
                    }
                } catch (e) {
                    console.error("Error al parsear JSON:", e);
                    console.log("Respuesta del servidor:", response);
                    $("#resultados-usuarios").html("<tr><td colspan='6'>Error al procesar la solicitud</td></tr>");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }
});