document.addEventListener("DOMContentLoaded", function() {
    ///// funcion para evitar letras en telefono
    const telefono = document.getElementById('telefono');
        telefono.addEventListener('keypress', (event) => {
            const charCode = event.which ? event.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            event.preventDefault();
            }
        });
      
        telefono.addEventListener('paste', (event) => {
            const pasteData = event.clipboardData.getData('text');
            if (isNaN(pasteData)) {
            event.preventDefault();
            }
        });
  });
  
function validate_tienda() {
    const formulario = document.getElementById('formulario');
    const nombretienda = document.getElementById('nombretienda');
    const direccion = document.getElementById('direccion');
    const referencia = document.getElementById('referencia');
    
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
    const nombretiendaValue = nombretienda.value.trim();
    const direccionValue = direccion.value.trim();
    const referenciaValue = referencia.value.trim();
    const telefonoValue = telefono.value.trim();

    const telefonoRegex = /^[67]\d{7}$/;

    let res = true;

    ///// validacion nombretienda
    if(nombretiendaValue === ''){
        setError(nombretienda, '*Campo obligatorio');
        res = false;
    }else{
        setSuccess(nombretienda);
    }

    ///// validacion direccion
    if (direccionValue === '') {
        setError(direccion, '*Campo obligatorio');
        res = false;
      } else {
          setSuccess(direccion);
        }

      
    ///// validacion referencia
    if(referenciaValue === ''){
        setError(referencia, '*Campo obligatorio');
        res = false;
    }else{
        setSuccess(referencia);
    }

    ///// validacion telefono
    if(telefonoValue === ''){
        setError(telefono, '*Campo obligatorio');
        res = false;
    }else if(telefonoValue.length != 8 ){
        setError(telefono, '*El campo debe tener 8 dígitos y debe ser celular')
    }else if(!telefonoRegex.test(telefonoValue)){
        setError(telefono, '*El campo debe empezar con 6 o 7')
    }else{
        setSuccess(telefono);
    }
    
    ///// condición para subir a la base de datos
    if(res==false){
        return res;
    }else{
        formulario.submit();
    }
    
}