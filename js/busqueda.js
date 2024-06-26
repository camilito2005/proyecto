window.addEventListener("DOMContentLoaded",()=>{ // una funcion para que el codigo empieze luego que se mande todo el html, se guardan el contendio del html en variables
    const search = document.querySelector("#search")
    const tabla = document.querySelector("#resultado tbody")
    const resultadosconainer = document.querySelector("#resultados-conainer");
    const errorcontainer = document.querySelector(".error")
    let search_criteria = '';

         
    if (search) { // si existe la varibale search 
        search.addEventListener('input',event => {  //creamos un evento "input" que hace referencia a que cuando el valor de ese elemento a cambiado se ejecutara el evento 
            search_criteria = event.target.value.toUpperCase()
            showResult()
        })
    }

    // enviar peticion usando fecth

    const searchData = async () => {
        let searchData = new FormData()
        searchData.append('search_criteria',search_criteria)
        try {
            const response = await fetch("",{ 
                method: 'POST',
                body: searchData
        })
        

        return response.json()

        } catch (error) {
            alert ('${"hubo un error y no podemos procesar su solicitud en este momento . Razones "}${error.message} ')
            console.log(error)
        }
    }
    // funcion para mostrar los datos
    const showResult = () =>{
        searchData()
        .then(DataResults=>{
            console.log(DataResults)
        })
    }
})