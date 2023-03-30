var elementosClickeados = {};
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
          
          if (!elementosClickeados[id]) {
            elementosClickeados[id] = true;
            console.log("Haz hecho clic en la imagen con src: " + id);
            agregarProducto(id.substring(9))
            ocultargif()
          } else {
            aumentarCantidad(id.substring(9))
            console.log("Ya has hecho clic en la imagen con src: " + id);
          }       
          //detalleV.classList.add('ocultar');
        });
    }
     
});
function pintarArea(){
    let paginaActual = window.location.pathname.split("/").pop();
    console.log(paginaActual);
    if (paginaActual === "vender") {
        
    }
}
function agregarProducto(id){
  console.log(productos[id]); 
  // Seleccionar el div por su clase
  var contenedor = document.querySelector(".contenedor-items");

  // Asignar el HTML deseado al contenido del div
  contenedor.insertAdjacentHTML('beforeend', `
    <div class="item" id="item-${productos[id].ID_PRODUCTO}">
    <div class="imagen-nombre">
        <img src="${productos[id].IMAGEN_PRODUCTO}" width="50px" onerror="this.onerror=null;this.src='src/sinimagen.jpg';">
        <span class="item-nombre">${productos[id].NOMBRE_PRODUCTO}</span>
    </div>
        
    <div class="selector-cantidad">
        
        <input type="number" value="1" class="detalle-item-cantidad" id="cantidad-${productos[id].ID_PRODUCTO}">
        
    </div>

    <div class="precio-eliminar">    
        <strong>Bs. <span class="item-precio" id="precio-${productos[id].ID_PRODUCTO}">${productos[id].PRECIOV_PRODUCTO}</span></strong>
        <span class="boton-eliminar">
            <img onclick=eliminar(${productos[id].ID_PRODUCTO}) src="src/icon-delete.svg">
        </span>
    </div>  
  </div>
  `)
  var inputsCantidad = document.getElementById('cantidad-'+productos[id].ID_PRODUCTO);
  inputsCantidad.addEventListener('change', function() {
    const regex = /^[1-9][0-9]*$/; // Expresión regular para números naturales sin ceros a la izquierda
    if (!regex.test(this.value) || isNaN(this.value) || this.value % 1 !== 0 || this.value < 0) {
      this.value = 1;
      actualizarPrecioTotalCantidad(this.value, id)
      actualizarPrecioParcial(this.value, id)
      
    } else { 
      console.log(this.value + " stock " + productos[id].STOCK_PRODUCTO);
      if (parseInt(this.value) > productos[id].STOCK_PRODUCTO) {
        this.value = productos[id].STOCK_PRODUCTO;
        actualizarPrecioTotalCantidad(this.value, id)
        actualizarPrecioParcial(this.value, id)
      } else {
        console.log('El valor del input ha cambiado a: ' + this.value);
        actualizarPrecioTotalCantidad(this.value, id)
        actualizarPrecioParcial(this.value, id)
      }
    }
  });
  actualizarPrecioTotal(id);
}
function actualizarPrecioTotalCantidad(cantidad, id){
  var precioParcial = document.getElementById('precio-'+id);
  var precioParcialActual = parseFloat(precioParcial.textContent).toFixed(2);

  var precioTotal = document.querySelector('.detalle-precio-total');
  var precioTotalActual = parseFloat(precioTotal.textContent).toFixed(2);;

  // Obtener el valor actual y convertirlo en un número entero
  
  var precioParcialNuevo = cantidad * parseFloat(productos[id].PRECIOV_PRODUCTO)

  var precioNuevo;
  
  if(precioParcialActual>precioParcialNuevo){
    precioNuevo = precioParcialActual-precioParcialNuevo

    // Actualizar el valor con el nuevo precio
    precioTotal.textContent = precioTotalActual - precioNuevo;
    precioTotalActual.textContent = parseFloat(precioTotalActual.textContent).toFixed(2);
  }
  if(precioParcialActual<precioParcialNuevo){
    precioNuevo = precioParcialNuevo - precioParcialActual
    
    // Actualizar el valor con el nuevo precio
    precioTotal.textContent = precioTotalActual + precioNuevo;
    precioTotalActual.textContent = parseFloat(precioTotalActual.textContent).toFixed(2);
  }
}
function actualizarPrecioParcial(cantidad, id){
  var precioParcial = document.getElementById('precio-'+id);
  // Obtener el valor actual
  //var valorActual = parseInt(precioParcial.textContent)

  // Cambiar el valor
  precioParcial.textContent = cantidad*productos[id].PRECIOV_PRODUCTO;
  precioParcial.textContent = parseFloat(precioParcial.textContent).toFixed(2);
}
function actualizarPrecioTotal(id){
  var precioTotal = document.querySelector('.detalle-precio-total');
  // Obtener el valor actual y convertirlo en un número entero
  var valorActual = parseFloat(precioTotal.textContent);
  // Actualizar el valor con el nuevo precio
  precioTotal.textContent = valorActual + parseFloat(productos[id].PRECIOV_PRODUCTO);
  precioTotal.textContent = parseFloat(precioTotal.textContent).toFixed(2);
}
function aumentarCantidad(id){

  let cantidadInput = document.getElementById("cantidad-"+id);

  let cantidadActual = parseInt(cantidadInput.value);
  if(cantidadActual<productos[id].STOCK_PRODUCTO){
    cantidadInput.value = cantidadActual + 1;
    actualizarPrecioParcial(cantidadInput.value, id)
    actualizarPrecioTotal(id);
  }else{
    cantidadInput.value = productos[id].STOCK_PRODUCTO
  }
}
function eliminar(id){
  
  var precioParcial = document.getElementById('precio-'+id);
  var precioParcialActual = parseFloat(precioParcial.textContent).toFixed(2);
  
  var precioTotal = document.querySelector('.detalle-precio-total');
  var precioTotalActual = parseFloat(precioTotal.textContent).toFixed(2);;

  precioTotal.textContent = precioTotalActual - precioParcialActual;
  precioTotalActual.textContent = parseFloat(precioTotalActual.textContent).toFixed(2);

  var divAEliminar = document.getElementById("item-"+id);
  var padre = divAEliminar.parentNode;
  padre.removeChild(divAEliminar);

  elementosClickeados["producto-"+id] = false;
}
function ocultargif(){
  document.querySelector(".detalle-gif").classList.add("ocultar")
  document.querySelector(".detalle-total").classList.remove("ocultar")
}
function vaciar(){
  
}