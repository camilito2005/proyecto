$("#search").keyup(function () {
    let search = $("#search").val();

    if (search) {
        $.ajax({
            url: "./usuarios.php?accion=buscar", // Asegúrate de que la URL incluya la acción "buscar"
            type: "POST",
            data: { search },
            success: function (response) {
                if (response) {
                    try {
                        let tasks = JSON.parse(response);
                        
                        if (tasks.length > 0) {
                            let template = "";
                            tasks.forEach((task) => {
                                template += `
                                    <tr> 
                                        <td>${task.nombre}</td>
                                        <td>${task.apellidos}</td>
                                        <td>${task.telefono}</td>
                                        <td>${task.direccion}</td>
                                        <td>${task.correo}</td>
                                        <td>${task.contraseña}</td>
                                    </tr>
                                `;
                            });
                            $("#tasks").html(template);
                        } else {
                            $("#tasks").html("<tr><td colspan='6'>No se encontraron resultados</td></tr>");
                        }
                    } catch (e) {
                        console.error("Error en el parseo JSON:", e);
                    }
                }
            }
        });
    }
});
