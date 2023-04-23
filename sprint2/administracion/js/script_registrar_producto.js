// eliminar la e de los inputs number 
document.addEventListener("DOMContentLoaded", function() {
  const venta = document.getElementById('venta');
  venta.addEventListener('keydown', function(event) {
    if (event.key === 'e' || event.key === 'E' || event.key === ',') {
      event.preventDefault();
    }
  });
  const compra = document.getElementById('compra');
  compra.addEventListener('keydown', function(event) {
    if (event.key === 'e' || event.key === 'E' || event.key === ',') {
      event.preventDefault();
    }
  });
  const cantidad = document.getElementById('cantidad');
  cantidad.addEventListener('keydown', function(event) {
    if (event.key === 'e' || event.key === 'E'|| event.key === ',') {
      event.preventDefault();
    }
  });
});

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

    let res = true;

    if(nombreproductoValue === ''){
        setError(nombreproducto, '*Campo obligatorio');
        res = false;
    }else if(nombreproductoValue.length<3){
        setError(nombreproducto, '*El campo debe tener más de 2 caracteres y solo alfabéticos');
        res = false;
    }else if(!/^[a-zA-Z\s]+$/.test(nombreproductoValue)){
      setError(nombreproducto, '*El campo debe tener más de 2 caracteres y solo alfabéticos');
      res = false;
    }else{
        setSuccess(nombreproducto);
    }
    ///// validacion venta
    if (ventaValue === '') {
        setError(venta, '*Campo obligatorio'); 
        res = false;
      } else if (ventaValue < 0) {
        setError(venta, '*El campo no puede ser negativo');
        res = false;
      } else {
        let ventaValue = parseFloat(venta.value);
        // Redondear el número a 1 decimal utilizando toFixed()
        const roundedValue = parseFloat(ventaValue.toFixed(1));
      
        if (roundedValue !== ventaValue) {
          // Si el número original tiene más de 1 decimal, mostrar el mensaje de error
          setError(venta, '*El campo debe tener solo 1 decimal');
          res = false;
        } else if (roundedValue > 999.9 || isNaN(roundedValue)) {
          setError(venta, '*El campo debe ser menor a 1000 y tener solo 1 decimal');
          res = false;
        } else if(ventaValue == compraValue){
          setError(venta, '*venta y compra no permiten el mismo valor');
          res = false;
        }else if(ventaValue < compraValue){
          setError(venta, '*venta no debe ser menor al campo compra');
          res = false;
        }else {
          setSuccess(venta);
        }
      }
      
    ///// validacion compra
    if (compraValue === '') {
        setError(compra, '*Campo obligatorio');
        res = false;
      } else if (compraValue < 0) {
        setError(compra, '*El campo no puede ser negativo');
        res = false;
      } else {
        let compraValue = parseFloat(compra.value);
        // Redondear el número a 1 decimal utilizando toFixed()
        const roundedValue = parseFloat(compraValue.toFixed(1));
      
        if (roundedValue !== compraValue) {
          // Si el número original tiene más de 1 decimal, mostrar el mensaje de error
          setError(compra, '*El campo debe tener solo 1 decimal');
          res = false;
        } else if (roundedValue > 999.9 || isNaN(roundedValue)) {
          setError(compra, '*El campo debe ser menor a 1000');
          res = false;
        }else if(ventaValue == compraValue){
          setError(compra, '*venta y compra no permiten el mismo valor');
          res = false;
        } else {
          setSuccess(compra);
        }
      }
    //// validacion fecha
    if (inputDate < today) {
        setError(fecha, '*Fecha no permitida');
        res = false;
    }else{
        setSuccess(fecha);
    }
    //// validacion categoria
    if(categoriaValue === ''){
        setError(categoria, '*Campo obligatorio');
        res = false;
    }
    else{
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
        $seleccionArchivos.value = '';
    }
    
}

//previsualizar

document.addEventListener("DOMContentLoaded", function() {
  const $seleccionArchivos = document.querySelector(".subir");
  $imagenPrevisualizacion = document.querySelector(".img");

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
    // Validación de tamaño de imagen
    const img = new Image();
    img.onload = function() {
      const height = this.height;
      const width = this.width;
      if (height != 200 || width != 200) {
        alert("La imagen debe tener un tamaño máximo de 200x200 píxeles");
        $imagenPrevisualizacion.src = "";
        $seleccionArchivos.value = "";
      } else {
        // Y a la fuente de la imagen le ponemos el objectURL
        $imagenPrevisualizacion.src = objectURL;
      }
    };
    img.src = objectURL;
  });
});


