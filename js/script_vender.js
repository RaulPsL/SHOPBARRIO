document.addEventListener("DOMContentLoaded", function() {
    // Obtener una lista de elementos con la clase "miBoton"
    var botones = document.getElementsByClassName("tarjeta-imagen");
    var detalleV = document.querySelector(".vender-detalle-vacio");

    // Recorrer la lista de elementos y agregar el evento click a cada uno
    for (var i = 0; i < botones.length; i++) {
        botones[i].addEventListener("click", function() {
          // Obtener el atributo "src" de la imagen que se hizo clic
          var id = this.getAttribute("id");
            console.log(id.substring(9));
          // Tu código aquí para manejar el evento
          console.log("Haz hecho clic en la imagen con src: " + id);
          detalleV.classList.add('ocultar');
        });
    }
    console.log(productos[0]);   
});
function pintarArea(){
    let paginaActual = window.location.pathname.split("/").pop();
    console.log(paginaActual);
    if (paginaActual === "vender") {
        
    }
}