document.addEventListener("DOMContentLoaded", function() {
    const formulario = document.getElementById('formulario');

    const nombreproducto = document.getElementById('nombreproducto');
    const venta = document.getElementById('venta');
    const compra = document.getElementById('compra');
    const categoria = document.getElementById('categoria');
    const cantidad = document.getElementById('cantidad');   
    const fecha = document.getElementById('fecha');
    const imagen = document.getElementById('subir');
    imagen.addEventListener("change", function(){
        if(validateImagen(imagen.files)){
            const imagenPrevisualizacion = document.querySelector(".img");
            const objectURL = URL.createObjectURL(imagen.files[0]);
            imagenPrevisualizacion.src = objectURL;
        }
    })

})
var validationStatus = {
    nombreproducto: true,
    venta: true,
    compra: true,
    categoria: true,
    cantidad: true,
    compraVenta: true,
    fecha: true,
    imagen: true
};

function validate() {
    event.preventDefault();

    const nombreproductoValue = nombreproducto.value;
    const ventaValue = venta.value;
    const compraValue = compra.value;
    const categoriaValue = categoria.value;
    const cantidadValue = cantidad.value;
    const fechaValue = fecha.value;
    //CASO MUY RARO
    const imagen = document.getElementById('subir');
    const imagenValue = imagen.files;


    validateNombreProducto(nombreproductoValue); //input text
    validateVenta(ventaValue); //input number
    validateCompra(compraValue); //input number
    validateCategoria(categoriaValue); //input select
    validateCantidad(cantidadValue); //input number
    validateCompraVenta(ventaValue,compraValue);
    validateFecha(fechaValue); //input date
    validateImagen(imagenValue); //input file

    const allInputsValid = Object.values(validationStatus).every(status => status);
    if (allInputsValid) {
        formulario.submit();
    }
}
function validateNombreProducto(nombreproductoValue) {
    switch (true) {
        // Verificar si el valor está vacío o solo contiene caracteres de espacio
        case nombreproductoValue.trim() === '':
            validationStatus.nombreproducto = false;
            break;
        // Verificar si el valor tiene menos de 3 caracteres
        case nombreproductoValue.length < 3:
            validationStatus.nombreproducto = false;
            break;
        // Verificar si el valor contiene caracteres no alfanuméricos
        case !/^[a-z0-9]+$/i.test(nombreproductoValue):
            validationStatus.nombreproducto = false;
            break;
        //En el caso que no exista algun error
        default:
            validationStatus.nombreproducto = true;
            break;
    }
}
function validateVenta(ventaValue) {
    switch (true) {
        case (ventaValue.trim() === ''): // Verificar si el valor está vacío o solo contiene caracteres de espacio
          validationStatus.venta = false;
          break;
        case (ventaValue < 0): // Verificar si el valor es negativo
          validationStatus.venta = false;
          break;
        case (!/^[0-9]+(\.[0-9]{1})?$/.test(ventaValue)): // Verificar si el valor tiene más de un decimal
          validationStatus.venta = false;
          break;
        case (ventaValue.includes('e')): // Verificar si el valor contiene la constante "e"
          validationStatus.venta = false;
          break;
        default:
          validationStatus.venta = true;
          break;
      }
}
function validateCompra(compraValue) {
    switch (true) {
        case (compraValue.trim() === ''): // Verificar si el valor está vacío o solo contiene caracteres de espacio
          validationStatus.compra = false;
          break;
        case (compraValue < 0): // Verificar si el valor es negativo
          validationStatus.compra = false;
          break;
        case (!/^[0-9]+(\.[0-9]{1})?$/.test(compraValue)): // Verificar si el valor tiene más de un decimal
          validationStatus.compra = false;
          break;
        case (compraValue.includes('e')): // Verificar si el valor contiene la constante "e"
          validationStatus.compra = false;
          break;
        default:
          validationStatus.compra = true;
          break;
      }
}
function validateCategoria(categoriaValue) {
    // Verificar si no se ha seleccionado una opción en el select
    if (categoriaValue === '') {
        validationStatus.categoria = false;
    } else {
        validationStatus.categoria = true;
    }
}
function validateCantidad(cantidadValue){
    switch (true) {
        case (cantidadValue.trim() === ''): // Verificar si el valor está vacío o solo contiene caracteres de espacio
          validationStatus.cantidad = false;
          break;
        case (cantidadValue < 0): // Verificar si el valor es negativo
          validationStatus.cantidad = false;
          break;
        case (cantidadValue.includes('e')): // Verificar si el valor contiene la constante "e"
          validationStatus.cantidad = false;
          break;
        default:
          validationStatus.cantidad = true;
          break;
      }
}
function  validateCompraVenta(ventaValue,compraValue){
    if(validationStatus.compra != true || validationStatus.venta != true){
        validationStatus.compraVenta = false;
    }else{
        if(ventaValue<compraValue){
            validationStatus.compraVenta = false;
        }else{
            validationStatus.compraVenta = true;
        }
    }
}
function validateFecha(fechaValue){
    if (fechaValue !== '') {
        // Se eligió una fecha, hacer la validación correspondiente
        const fechaActual = new Date();
        const fechaSeleccionada = new Date(fechaValue);
        if (fechaSeleccionada <= fechaActual) {
            // La fecha seleccionada es una fecha actual o pasada, mostrar error
            validationStatus.fecha = false;
        } else {
            // La fecha seleccionada es una fecha futura, continuar con la validación
            validationStatus.fecha = true; 
         }
    }
}
function validateImagen(imagenValue) {
    let isValid = false;
  
    if (imagenValue && imagenValue.length > 0) {
      switch (imagenValue[0].type) {
        case 'image/jpeg':
        case 'image/png':
        case 'image/jpg':
            if (imagenValue[0].size <= 10000000) {
                isValid = true;
            }
            break;
        default:
          isValid = false;
          break;
      }
    }
    validationStatus.imagen = isValid;
    return isValid;
}