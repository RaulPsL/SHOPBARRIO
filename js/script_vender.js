var elementosClickeados = {};
document.addEventListener("DOMContentLoaded", function () {
  // Obtener una lista de elementos con la clase "miBoton"
  var botones = document.getElementsByClassName("tarjeta-imagen");
  var detalleV = document.querySelector(".vender-detalle-vacio");

  // Recorrer la lista de elementos y agregar el evento click a cada uno
  for (var i = 0; i < botones.length; i++) {
    botones[i].addEventListener("click", function () {
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
function pintarArea() {
  let paginaActual = window.location.pathname.split("/").pop();
  console.log(paginaActual);
  if (paginaActual === "vender") {

  }
}
function agregarProducto(id) {
  console.log(productos[id]);
  // Seleccionar el div por su clase
  var contenedor = document.querySelector(".contenedor-items");

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
    $.post("back/envio_venta.php", {
      elementos: JSON.stringify(elementos),
      total: total
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
function vaciar() {
  var contenedor = document.querySelector(".contenedor-items");
  contenedor.innerHTML = "";
  elementosClickeados = {};
  document.querySelector('.detalle-precio-total').textContent = '0';
  mostrarGif()
}