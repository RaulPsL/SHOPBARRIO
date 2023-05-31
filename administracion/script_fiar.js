var elementosClickeados = {};
document.addEventListener("DOMContentLoaded", function () {
  // Obtener una lista de elementos con la clase "miBoton"
  var botones = document.getElementsByClassName("tarjeta-imagen");

  document.getElementById('telefono-deudor').addEventListener('keydown', (event)=>{
    if(event.key === 'E' || event.key === 'e' || event.key === '.' || event.key === ',' || event.key === '-' || event.key === '+'){
      event.preventDefault();
    }
  });

  // Recorrer la lista de elementos y agregar el evento click a cada uno
  for (var i = 0; i < botones.length; i++) {
    botones[i].addEventListener("click", function () {
      // Obtener el atributo "src" de la imagen que se hizo clic
      var id = this.getAttribute("id");

      if (!elementosClickeados[id]) {
        elementosClickeados[id] = true;
        agregarProducto(id.substring(9))
        ocultargif()
      } else {
        aumentarCantidad(id.substring(9))
      }
    });
  }

  var detalleActivo=false;
  const botonDetalle=document.querySelector(".detalle-gestor");
  const detalleLleno=document.querySelector(".vender-detalle-lleno");
  botonDetalle.addEventListener('click', function(){
    if(detalleActivo==false){
        detalleLleno.classList.add("vender-detalle-lleno-mostrar");
        detalleActivo=true;
    }else{
        detalleLleno.classList.remove("vender-detalle-lleno-mostrar");
        detalleActivo=false;
    }
  })

  
  document.querySelector(".search").addEventListener('click', function(){
    var buscador=document.getElementById("buscador").value.toLowerCase().trim()
    if(buscador.length>0){
      document.getElementById('lista-productos').classList.add('ocultar')
      document.getElementById("lista-productos-buscados").classList.remove('ocultar')
      buscarProductos(buscador);
      // Obtener una lista de elementos con la clase "miBoton"
      var tarjetas = document.getElementsByClassName("tarjeta-imagen-nuevo");
      // Recorrer la lista de elementos y agregar el evento click a cada uno
      for (var i = 0; i < tarjetas.length; i++) {
        tarjetas[i].addEventListener("click", function () {
          // Obtener el atributo "src" de la imagen que se hizo clic
          var id = this.getAttribute("id");
          if (!elementosClickeados[id]) {
            elementosClickeados[id] = true;
            agregarProducto(id.substring(9))
            ocultargif()
          } else {
            aumentarCantidad(id.substring(9))
          }
        });
      }
    }else{
      document.getElementById('lista-productos').classList.remove('ocultar')
      document.getElementById("lista-productos-buscados").classList.add('ocultar')
    }
  })

  document.getElementById("buscador").addEventListener("keydown", function(event) {
    if (event.keyCode === 13) {
      var buscador = this.value.toLowerCase().trim();
      if (buscador.length > 0) {
        document.getElementById('lista-productos').classList.add('ocultar');
        document.getElementById("lista-productos-buscados").classList.remove('ocultar');
        buscarProductos(buscador);
        var tarjetas = document.getElementsByClassName("tarjeta-imagen-nuevo");
        for (var i = 0; i < tarjetas.length; i++) {
          tarjetas[i].addEventListener("click", function () {
            var id = this.getAttribute("id");
            if (!elementosClickeados[id]) {
              elementosClickeados[id] = true;
              agregarProducto(id.substring(9))
              ocultargif()
            } else {
              aumentarCantidad(id.substring(9))
            }
          });
        }
      } else {
        document.getElementById('lista-productos').classList.remove('ocultar');
        document.getElementById("lista-productos-buscados").classList.add('ocultar');
      }
    }
  });
});

function buscarProductos(buscador){
  var contenedor = document.getElementById("lista-productos-buscados")
  contenedor.innerHTML=''
  var catnidadProductos=0;
  for (var key in productos) {
    var nombre = productos[key]['NOMBRE_PRODUCTO'].toLowerCase();
    if (nombre.includes(buscador)) {
      catnidadProductos++;
      contenedor.insertAdjacentHTML('beforeend', `
        <div class="tarjeta-producto">
          <div class="contenedor-imagen">
              <img class="tarjeta-imagen tarjeta-imagen-nuevo" id="producto-${productos[key]['ID_PRODUCTO']}" src="${productos[key]['IMAGEN_PRODUCTO']}" alt="imagen no encontrada" onerror="this.onerror=null;this.src='src/sinimagen.jpg';">
          </div>
          <div class="tarjeta-datos">
              <div class="tarjeta-precio">
                  <p><span>Bs. </span>${productos[key]['PRECIOV_PRODUCTO']}</p>
              </div>
              <div class="tarjeta-stock">
                  <p><span>Cant. </span>${productos[key]['STOCK_PRODUCTO']}</p>
              </div>
          </div>                                  
          <p>${productos[key]['NOMBRE_PRODUCTO']}</p>
        </div> 
      `)
    }
  }
  if(catnidadProductos==0){
    contenedor.innerHTML=`<p>No se encontraron productos que coincidan con ${buscador}</p>`
  }
}

function agregarProducto(id) {
  // Seleccionar el div por su clase
  var contenedor = document.getElementById("contenedor-items");

  // Asignar el HTML deseado al contenido del div
  contenedor.insertAdjacentHTML('beforeend', `
  <div class="item" id="item-${productos[id].ID_PRODUCTO}">

    <img src="${productos[id].IMAGEN_PRODUCTO}" alt="" width="50px" onerror="this.onerror=null;this.src='src/sinimagen.jpg';">

    <div class="item-detalles">
        <span class="item-nombre">${productos[id].NOMBRE_PRODUCTO}</span>
        <div class="selector-cantidad">
            <i onclick="reducirEnUno(${productos[id].ID_PRODUCTO})" class="fa-solid fa-minus restar-cantidad"></i>
            <input type="number" value="1" class="detalle-item-cantidad" id="cantidad-${productos[id].ID_PRODUCTO}">
            <i onclick="aumentarEnUno(${productos[id].ID_PRODUCTO})" class="fa-solid fa-plus sumar-cantidad"></i>
        </div>

    </div>

    <strong>Bs. <span class="item-precio" id="precio-${productos[id].ID_PRODUCTO}">${productos[id].PRECIOV_PRODUCTO}</span></strong>
    <span onclick=eliminar(${productos[id].ID_PRODUCTO}) class="boton-eliminar">
    <i  class="fa-solid fa-trash-can"></i>
  </span>

  </div>
  `)
  var inputsCantidad = document.getElementById('cantidad-' + productos[id].ID_PRODUCTO);
  inputsCantidad.addEventListener('change', function () {
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
function actualizarPrecioTotalCantidad(cantidad, id) {
  var precioParcial = document.getElementById('precio-' + id);
  var precioParcialActual = parseFloat(precioParcial.textContent).toFixed(1);
  precioParcialActual = parseFloat(precioParcialActual)

  var precioTotal = document.querySelector('.detalle-precio-total');
  var precioTotalActual = parseFloat(precioTotal.textContent).toFixed(1);
  precioTotalActual = parseFloat(precioTotalActual)

  // Obtener el valor actual y convertirlo en un número entero

  var precioParcialNuevo = parseFloat(cantidad * productos[id].PRECIOV_PRODUCTO).toFixed(1)
  precioParcialNuevo = parseFloat(precioParcialNuevo)
  var precioNuevo;

  if (precioParcialActual > precioParcialNuevo) {

    precioNuevo = precioParcialActual - precioParcialNuevo
    precioNuevo = parseFloat(precioNuevo)

    // Actualizar el valor con el nuevo precio
    precioTotal.textContent =  (precioTotalActual - precioNuevo).toFixed(1);
  }
  if (precioParcialActual < precioParcialNuevo) {

    precioNuevo = parseFloat(precioParcialNuevo - precioParcialActual).toFixed(1)
    precioNuevo = parseFloat(precioNuevo)

    // Actualizar el valor con el nuevo precio
    precioTotal.textContent =  (precioTotalActual + precioNuevo).toFixed(1);
  }
}
function actualizarPrecioParcial(cantidad, id) {
  var precioParcial = document.getElementById('precio-' + id);

  precioParcial.textContent = cantidad * productos[id].PRECIOV_PRODUCTO;
  precioParcial.textContent = parseFloat(precioParcial.textContent).toFixed(2);
}

function actualizarPrecioTotal(id) {
  var precioTotal = document.querySelector('.detalle-precio-total');
  // Obtener el valor actual y convertirlo en un número entero
  var valorActual = parseFloat(precioTotal.textContent);
  // Actualizar el valor con el nuevo precio
  precioTotal.textContent = (valorActual + parseFloat(productos[id].PRECIOV_PRODUCTO)).toFixed(2);
}


function aumentarCantidad(id) {

  let cantidadInput = document.getElementById("cantidad-" + id);

  let cantidadActual = parseInt(cantidadInput.value);
  if (cantidadActual < productos[id].STOCK_PRODUCTO) {
    cantidadInput.value = cantidadActual + 1;
    actualizarPrecioParcial(cantidadInput.value, id)
    actualizarPrecioTotal(id);
  } else {
    cantidadInput.value = productos[id].STOCK_PRODUCTO
  }
}
function eliminar(id) {

  var precioParcial = document.getElementById('precio-' + id);
  var precioParcialActual = parseFloat(precioParcial.textContent).toFixed(2);

  var precioTotal = document.querySelector('.detalle-precio-total');
  var precioTotalActual = parseFloat(precioTotal.textContent).toFixed(2);;

  precioTotal.textContent = precioTotalActual - precioParcialActual;
  precioTotalActual.textContent = parseFloat(precioTotalActual.textContent).toFixed(2);

  var divAEliminar = document.getElementById("item-" + id);
  var padre = divAEliminar.parentNode;
  padre.removeChild(divAEliminar);

  elementosClickeados["producto-" + id] = false;
  mostrarGif()
}
function mostrarGif() {
  var items = document.getElementsByClassName("item");
  if (items.length < 1) {
    document.getElementById("detalle-gif-vacio").classList.remove("ocultar")
    document.getElementById("detalle-total").classList.add("ocultar")
    document.querySelector(".detalle-precio-total").textContent=0
  }
}
function ocultargif() {
  document.getElementById("detalle-gif-vacio").classList.add("ocultar")
  document.getElementById("detalle-total").classList.remove("ocultar")
}
function reducirEnUno(id) {
  var precioParcial = document.getElementById('precio-' + id);
  var precioParcialActual = parseFloat(precioParcial.textContent)
  var inputCantidad = document.getElementById('cantidad-' + productos[id].ID_PRODUCTO);

  if (parseInt(inputCantidad.value) > 1) {
    inputCantidad.value = parseInt(inputCantidad.value) - 1
    precioParcial.textContent = parseFloat(precioParcialActual - productos[id].PRECIOV_PRODUCTO).toFixed(1);

    var precioTotal = document.querySelector('.detalle-precio-total');
    var precioTotalActual = parseFloat(precioTotal.textContent);

    // Actualizar el valor con el nuevo precio
    precioTotal.textContent = parseFloat(precioTotalActual - productos[id].PRECIOV_PRODUCTO).toFixed(1);
  }
}

function aumentarEnUno(id) {
  var precioParcial = document.getElementById('precio-' + id);
  var precioParcialActual = parseFloat(precioParcial.textContent)
  var inputCantidad = document.getElementById('cantidad-' + productos[id].ID_PRODUCTO);

  if (parseInt(inputCantidad.value) < productos[id].STOCK_PRODUCTO) {
    inputCantidad.value = parseInt(inputCantidad.value) + 1
    precioParcial.textContent = (precioParcialActual + parseFloat(productos[id].PRECIOV_PRODUCTO)).toFixed(1);

    var precioTotal = document.querySelector('.detalle-precio-total');
    var precioTotalActual = parseFloat(precioTotal.textContent);

    // Actualizar el valor con el nuevo precio
    precioTotal.textContent = (precioTotalActual + parseFloat(productos[id].PRECIOV_PRODUCTO)).toFixed(1);
  }
}

function enviar() {
  var items = document.getElementsByClassName("item");
  var elementos = [];
  if (items.length > 0) {

    var precioTotal = document.querySelector('.detalle-precio-total');
    var total = parseFloat(precioTotal.textContent);
    console.log(total);

    Array.from(items).forEach(function (elemento) {
      var idElemento = elemento.id.substring(5);
      var cantidad = document.getElementById("cantidad-" + idElemento).value;
      var elementoObj = {
        id: idElemento,
        cantidad: cantidad
      };
      elementos.push(elementoObj);
    });
    // Realizar solicitud POST utilizando jQuery
    if(validarCampos()){
      var nombreDeudor = document.getElementById('nombre-deudor').value
      var telefonoDeudor = document.getElementById('telefono-deudor').value
      var direccionDeudor = document.getElementById('direccion-deudor').value
      $.post("back/datos_insert_deuda.php", {
        elementos: JSON.stringify(elementos),
        total: total,
        nombreDeudor: nombreDeudor,
        telefonoDeudor: telefonoDeudor,
        direccionDeudor: direccionDeudor
      }, function (data) {
        console.log(data);
        document.getElementById("modal").showModal()
        // Recargar la página después de 5 segundos
        setTimeout(function() {
          location.reload();
        }, 2000); // 5000 milisegundos = 5 segundos
        
      });
    }
  }
}
function vaciar() {
  var contenedor = document.querySelector(".contenedor-items");
  contenedor.innerHTML = "";
  elementosClickeados = {};
  document.querySelector('.detalle-precio-total').textContent = '0';
  mostrarGif()
}

function continuar(){
  document.getElementById('detalle').classList.add('ocultar')
  document.getElementById('contenedor-items').classList.add('ocultar')
  document.getElementById('continuar').classList.add('ocultar')
  document.getElementById('vaciar').classList.add('ocultar')

  document.getElementById('deudor').classList.remove('ocultar')
  document.getElementById('datos-deudor').classList.remove('ocultar')
  document.getElementById('enviar').classList.remove('ocultar')
  document.getElementById('atras').classList.remove('ocultar')
}

function irAtras(){
  document.getElementById('detalle').classList.remove('ocultar')
  document.getElementById('contenedor-items').classList.remove('ocultar')
  document.getElementById('continuar').classList.remove('ocultar')
  document.getElementById('vaciar').classList.remove('ocultar')

  document.getElementById('deudor').classList.add('ocultar')
  document.getElementById('datos-deudor').classList.add('ocultar')
  document.getElementById('enviar').classList.add('ocultar')
  document.getElementById('atras').classList.add('ocultar')
}
function validarCampos(){
  var res=true
  var nombreDeudor = document.getElementById('nombre-deudor').value
  var telefonoDeudor = document.getElementById('telefono-deudor').value
  var direccionDeudor = document.getElementById('direccion-deudor').value

  const errorNombre = document.querySelector('.error-nombre');
  const errorTelefono = document.querySelector('.error-telefono');
  const errorDireccion = document.querySelector('.error-direccion');

  if(nombreDeudor === "") {
    res=false
    errorNombre.innerText = "Campo obligatorio.";
    errorNombre.classList.remove('ocultar')
  } else if (!/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/.test(nombreDeudor)) {
    res=false
    errorNombre.innerText = "Solo se admiten caracteres alfabéticos."
    errorNombre.classList.remove('ocultar')
  } else if(nombreDeudor.trim().length > 15) {
    res=false
    errorNombre.innerText = "Longitud máxima 15 caracteres."
    errorNombre.classList.remove('ocultar')
  } else if(nombreDeudor.trim().length < 4){
    res=false
    errorNombre.innerText = "Longitud mínima 4 caracteres."
    errorNombre.classList.remove('ocultar')
  }else{
    errorNombre.classList.add('ocultar')
  }
  
  if(telefonoDeudor === ""){
    res = false
    errorTelefono.innerText = "Campo obligatorio."
    errorTelefono.classList.remove('ocultar')
  }else {
    if(isNaN(telefonoDeudor)){
      res = false
      errorTelefono.innerText = "Solo se admiten caracteres numéricos."
      errorTelefono.classList.remove('ocultar')
    } else if (telefonoDeudor.length === 7 && telefonoDeudor[0] !== '4' && telefonoDeudor[0] !== '3' && telefonoDeudor[0] !== '2') {
      res = false;
      errorTelefono.innerText = "El telefonó fijo debe comenzar con 2, 3 o 4"
      errorTelefono.classList.remove('ocultar');
    }else if (telefonoDeudor.length === 8 && telefonoDeudor[0] !== '6' && telefonoDeudor[0] !== '7') {
      res = false;
      errorTelefono.innerText = "El telefonó movil debe comenzar con 6 o 7"
      errorTelefono.classList.remove('ocultar');
    }else if (telefonoDeudor.length < 7 || telefonoDeudor.length > 8) {
      res = false;
      errorTelefono.innerText = "Solo se admiten telefonos nacionales"
      errorTelefono.classList.remove('ocultar');
    } else {
      errorTelefono.classList.add('ocultar')
    }
  }
  
  if(direccionDeudor === "") {
    res = false
    errorDireccion.innerText = "Campo obligatorio.";
    errorDireccion.classList.remove('ocultar')
  } else if(direccionDeudor.length > 50) {
    res=false
    errorDireccion.innerText = "Máximo de caracteres 50.";
    errorDireccion.classList.remove('ocultar')
  } /*else if(direccionDeudor.length < 10) {
    res = false
    errorDireccion.innerText = "Mínimo de caracteres 10.";
    errorDireccion.classList.remove('ocultar')
  } */
  else {
    errorDireccion.classList.add('ocultar')
  }
  return res;
}