$(function () {

    $("#search").keyup(function(){
        if ($("#search").val()) {

            let search = $("#search").val();

            console.log(search)
            
        }
    });
});
// document.addEventListener("keyup",e=>{
//     if (e.target.matches("#buscador")) {
//         document.querySelectorAll(".container").forEach(Elemento =>{
//             Elemento.textContent.toLowerCase().includes(e.target.value.toLowerCase())
//             ?Elemento.classList.remove("filtro")
//             : Elemento.classList.add("filtro")
//         })
//     }
    
//     // console.log(e.target.value)
// })
