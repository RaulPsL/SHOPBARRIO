document.addEventListener("DOMContentLoaded", function() {
  const $seleccionArchivos = document.querySelector("#fot"),
    $imagenPrevisualizacion = document.querySelector("#Modific_image");

  // Escuchar cuando cambie
  $seleccionArchivos.addEventListener("change", () => {
    // Los archivos seleccionados, pueden ser muchos o uno
    const archivos = $seleccionArchivos.files;
    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
      $imagenPrevisualizacion.src = "";
      return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    const primerArchivo = archivos[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    $imagenPrevisualizacion.src = objectURL;
  });

  document.getElementById("formulario").addEventListener("submit", function(event) {
      event.preventDefault();
      validarcampos();

  });
})

function validarcampos() {
    var today = new Date();
    var nombre = document.getElementById("Nombre_prod");
    var venta = document.getElementById("Precio_v");
    var compra = document.getElementById("Precio_c");
    var vencimiento = document.getElementById("Nac");
    var cantidad = document.getElementById("Cant");
    
    var puntero = { 
        "nombre": true,
        "venta": true,
        "compra": true,
        "vencimiento": true,
        "cantidad": true
      };
      
    if (nombre.value.length <= 0) {
      var alerta = document.getElementById("nombre_alerta");
      alerta.classList.remove("ocultar");
      puntero["nombre"]=false ;
    } else if (venta.value >= 999 && venta.value <= 0) {
      var alerta = document.getElementById("venta_alerta");
      alerta.classList.remove("ocultar");
      puntero["venta"]=false ;
    } else if (compra.value >= 999 && compra.value <= 0) {
      var alerta = document.getElementById("compra_alerta");
      alerta.classList.remove("ocultar");
      puntero["compra"]=false ;
    } else if (vencimiento.value < today) {
        var alerta = document.getElementById("vencimiento_alerta");
        alerta.classList.remove("ocultar");
        puntero["vencimiento"]=false ;
    } else if (cantidad.value <= 0 && cantidad.value >= 999) {
        var alerta = document.getElementById("cantidad_alerta");
        alerta.classList.remove("ocultar");
        puntero["cantidad"]=false ;
    }  

    if(puntero["nombre"]==true && puntero["venta"]==true && puntero["compra"]==true && puntero["vencimiento"]==true && puntero["cantidad"]==true){
      // Enviar el formulario si los campos son válidos
      document.getElementById("formulario").submit();
    }
  }
