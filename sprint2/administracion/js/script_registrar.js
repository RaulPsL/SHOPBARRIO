function validate() {
    const formulario = document.getElementById('formulario');
    const nombreproducto = document.getElementById('nombreproducto');
    const venta = document.getElementById('venta');
    const compra = document.getElementById('compra');
    const cantidad = document.getElementById('cantidad');
    const categoria = document.getElementById('categoria');
    
    validateInputs();
}       
const setError = (element,message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
}
const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('error');
}
function countDecimals(value) {
    if (Math.floor(value) === value) {
      return 0;
    }
    return value.toString().split(".")[1].length || 0;
  }  

const validateInputs = () => {
    event.preventDefault();
    const nombreproductoValue = nombreproducto.value.trim();
    const ventaValue = venta.value.trim();
    const compraValue = compra.value.trim();
    const cantidadValue = cantidad.value.trim();
    const categoriaValue = categoria.value.trim();
    // imagen
    const $seleccionArchivos = document.querySelector(".subir");
    $imagenPrevisualizacion = document.querySelector(".img");
    const archivos = $seleccionArchivos.files;
    //fecha
    var today = new Date();
    var inputDate = new Date(document.getElementById("fecha").value);

    let regex = /[@_!#$%^&*()<>?/\|}{~:0-9]/;

    let res = true;

    if(nombreproductoValue === ''){
        setError(nombreproducto, 'Campo obligatorio');
        res = false;
    }else if(nombreproductoValue.length<4){
        setError(nombreproducto, 'El campo debe tener más de 3 caracteres y solo alfabéticos');
        res = false;
    }else if(regex.test(nombreproductoValue)){
        setError(nombreproducto, 'El campo debe tener más de 3 caracteres y solo alfabéticos');
        res = false;
    }else{
        setSuccess(nombreproducto);
    }
    if(ventaValue === ''){
        setError(venta, 'Campo obligatorio');
        res = false;
    }else if(ventaValue < 0){
        setError(venta, 'El campo no puede ser negativo');
        res = false;
    }
    else if (ventaValue > 999.99) {
        setError(venta, 'El campo debe tener solo 2 decimales y menor a 1000');
        res = false;
      } else if (countDecimals(ventaValue) > 2) {
        setError(venta, 'El campo debe tener solo 2 decimales y menor a 1000');
        res = false;
      }else{
        setSuccess(venta);
    }
    if(compraValue === ''){
        setError(compra, 'Campo obligatorio');
        res = false;
    }else if(compraValue < 0){
        setError(compra, 'El campo no puede ser negativo');
        res = false;
    }
    else if (compraValue > 999.99) {
        setError(compra, 'El campo debe tener solo 2 decimales y menor a 1000');
        res = false;
      } else if (countDecimals(compraValue) > 2) {
        setError(compra, 'El campo debe tener solo 2 decimales y menor a 1000');
        res = false;
      }else{
        setSuccess(compra);
    }
    if (inputDate < today) {
        setError(fecha, 'No puede ingresar productos caducados');
        res = false;
    }else{
        setSuccess(fecha);
    }
    if(categoriaValue === ''){
        setError(categoria, 'Campo obligatorio');
        res = false;
    }else{
        setSuccess(categoria);
    }
    if (cantidadValue === '') {
        setError(cantidad, '*Campo obligatorio');
        res = false;
      } else if (!Number.isInteger(parseFloat(cantidadValue))) {
        setError(cantidad, '*El campo debe ser un número entero sin decimales');
        res = false;
      } else if (cantidadValue > 999) {
        setError(cantidad, '*Sólo se permite hasta 999 de stock');
        res = false;
      } else if (cantidadValue < 0) {
        setError(cantidad, '*El campo no puede ser negativo');
        res = false;
      } else {
        setSuccess(cantidad);
      }
      if (!archivos || !archivos.length) {
        setError(img, '*Campo obligatorio');
        res = false;
      } else {
        const tiposPermitidos = ['image/jpeg', 'image/png'];
        const tipoArchivo = archivos[0].type;
        if (!tiposPermitidos.includes(tipoArchivo)) {
          setError(img, '*Solo se permiten archivos de tipo JPG o PNG');
          res = false;
        } else {
          setSuccess(img);
        }
      }
    if(res==false){
        return res;
    }else{
        formulario.submit();
    }
    
}