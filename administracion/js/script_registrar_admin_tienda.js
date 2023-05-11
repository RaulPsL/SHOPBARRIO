document.addEventListener("DOMContentLoaded", function() {
    const botonSiguiente=document.querySelector(".botonsiguiente")
    const botonAnterior=document.querySelector(".botonR")
    
    const tituloAdmin=document.querySelector(".der_titulo_admin")
    const tituloTienda=document.querySelector(".der_titulo_tienda")
    
    const formularioAdmin=document.querySelector(".formulario_admin")
    const formularioTienda=document.querySelector(".formulario_tienda")

    document.getElementById('telefono').addEventListener('keydown',
        function(event){
            if(event.key === '+' || 
            event.key === 'e' || 
            event.key === '-' || 
            event.key === 'E' || 
            event.key === ',' || 
            event.key === '.'){
                event.preventDefault();
            }
        }        
    )

    /* GENERAL */

    botonSiguiente.addEventListener("click", function(){
        if(validateInputs()){
            formularioTienda.classList.remove("ocultar")
            formularioAdmin.classList.add("ocultar")

            tituloTienda.classList.remove("ocultar")
            tituloAdmin.classList.add("ocultar")
        }
    })
    botonAnterior.addEventListener("click", function(){
        formularioTienda.classList.add("ocultar")
        formularioAdmin.classList.remove("ocultar")

        tituloTienda.classList.add("ocultar")
        tituloAdmin.classList.remove("ocultar")
    })
     /* FIN GENERAL */


     /* TIENDA */
    const telefonoCelular = document.getElementById('telefonoCelular');
        telefonoCelular.addEventListener('keypress', (event) => {
            const charCode = event.which ? event.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            event.preventDefault();
            }
        });
      
        telefonoCelular.addEventListener('paste', (event) => {
            const pasteData = event.clipboardData.getData('text');
            if (isNaN(pasteData)) {
            event.preventDefault();
            }
        });
    /* FIN TIENDA */
})
   /* CAMPOS ADMINISTRADOR */

const validateInputs = () => {
    const formulario = document.getElementById('formulario');
    const nombre = document.getElementById('nombre');
    const password = document.getElementById('password'); 
    const email = document.getElementById('email');
    const telefono = document.getElementById('telefono');
    const confpass = document.getElementById('password2');
    
    const divErros = document.getElementById('error_nombre');

    const nombreValue = nombre.value.toLowerCase();
    const passwordValue = password.value;
    const confpassValue = confpass.value;
    const emailValue = email.value;
    const telefonoValue = telefono.value.trim();
    
    let res = true;
    let res2 = false;
    
    /*let res3 = true;

    const dir = 'back/datos_registrar_admin.php?user='+nombreValue;
    const consulta = new XMLHttpRequest();
    consulta.open('GET', dir);
    consulta.send();
    var datosusuario = JSON.parse(consulta.responseText);
    */
    console.log(variable_nombre);
    
    /*let array_names = [];
    const response_fetch = fetch('back/datos_registrar_admin.php')
                        .then(response => response.json())
                        .then(data => {
                            res3 = console.log(data);
                            if(data.includes(nombreValue)){
                                setError(nombre, '*El usuario ya existe.')
                            }else{
                                setSuccess(nombre);
                            }
                        });
    */

    if(nombreValue === ''){
        setError(nombre, '*Campo obligatorio');
        res = false;
    }else if(nombreValue.length > 15){
        setError(nombre, '*La longitud máxima del usuario es de 15 caracteres.');
        res = false;
    }else if (nombreValue.length < 5) {
        setError(nombre, '*La longitud mínima del usuario es de 5 caracteres.');
        res = false;
    } else if(!/^[a-zA-Z0-9\s]+$/.test(nombreValue)){
        setError(nombre, '*El campo debe tener caracteres alfabéticos.');
        res = false;
    } else if(variable_nombre.includes(nombreValue)){
        setError(nombre, '*El usuario ya existe.');
        res = false;
    } else {
        setSuccess(nombre);
    }

    

    if (passwordValue === "") {
        setError(password, '*Campo obligatorio');
        res = false;
    } else if (passwordValue.length < 8) {
        setError(password, '*La longitud mínima de la contraseña es de 8 caracteres.');
        res = false;
    } else if (passwordValue.length > 16) {
        setError(password, '*La longitud máxima de la contraseña es de 16 caracteres.');
        res = false;
    } else {
        res2 = true;
        setSuccess(password);
    }

    if (confpassValue === "") {
        setError(confpass, '*Campo obligatorio');
        res = false;
    } else if (confpassValue.length < 8) {
        setError(confpass, '*La longitud mínima de la confirmacion es de 8 caracteres.');
        res = false;
    } else if (confpassValue.length > 16) {
        setError(confpass, '*La longitud máxima de la contraseña es de 16 caracteres.');
        res = false;
    } else {
        res2 = true;
        setSuccess(confpass);
    }
    
    if(res2 !== false) {
        if(confpassValue !== passwordValue){
            setError(confpass, "*Las contraseñas no coinciden, intente de nuevo.");
            setError(password, "*Las contraseñas no coinciden, intente de nuevo.");
            res = false;
        } else {
            setSuccess(confpass);
            setSuccess(password);
        }
    }

    if(emailValue === ''){
        setError(email, '*Campo obligatorio');
        res = false;
    } else if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
        setError(email, '*Debe parecer a la expresion xxxxx@dominio.com.');
        res = false;
    } else {
        setSuccess(email);
    }


    if (telefonoValue === '') {
        setError(telefono, '*Campo obligatorio');
        res = false;
    } else if (telefonoValue.length != 7) {
        setError(telefono, '*Solo se permite números con 7 digitos.');
        res = false;
    } else if (!/^[4]/.test(telefonoValue) || !/^[2]/.test(telefonoValue)) {
        setError(telefono, '*El campo debe comenzar con 4 o 2.');
        res = false;
    } else {
        setSuccess(telefono);
    }
    
    if(res==false){
        return res;
    }else{
        return true;
    }
} 
const setError = (element,message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error-admin');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    return res = false;
}
const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error-admin');

    errorDisplay.innerText = '';
    inputControl.classList.add('error');
    return res = true;
}
   /* FIN CAMPOS ADMINISTRADOR */
   
/* CAMPOS TIENDA */
function validate_tienda() {
    const formulario = document.getElementById('formulario');
    const nombretienda = document.getElementById('nombretienda');
    const direccion = document.getElementById('direccion');
    const referencia = document.getElementById('referencia');
    
    validateInputsTienda();
}  
const validateInputsTienda = () => {
    event.preventDefault();
    const nombretiendaValue = nombretienda.value.trim();
    const direccionValue = direccion.value.trim();
    const referenciaValue = referencia.value.trim();
    const telefonoValue = telefonoCelular.value.trim();

    const telefonoRegex = /^[67]\d{7}$/;

    let res = true;

    ///// validacion nombretienda
    ///// convertir a minuscula
    //////  
    // Verificar si la tienda "ejemplo" existe en el objeto "tiendas"
    //console.log(nombretiendaValue)
    console.log(tiendas)
    if(nombretiendaValue === ''){
        setErrorTienda(nombretienda, '*Campo obligatorio');
        res = false;
    }else{
        var nombreminuscula = nombretiendaValue.toLowerCase();
        if (tiendas.includes(nombreminuscula)) {
            setErrorTienda(nombretienda, '*Nombre ya registrado');
          res = false;
        } else {
            setSuccessTienda(nombretienda);
         }        
     }

    ///// validacion direccion
    if (direccionValue === '') {
        setErrorTienda(direccion, '*Campo obligatorio');
        res = false;
      } else {
        setSuccessTienda(direccion);
        }

      
    ///// validacion referencia
    if(referenciaValue === ''){
        setErrorTienda(referencia, '*Campo obligatorio');
        res = false;
    }else{
        setSuccessTienda(referencia);
    }

    ///// validacion telefono
    if(telefonoValue.length >= 1 ){
        if(telefonoValue.length != 8 ){
            setErrorTienda(telefonoCelular, '*El campo debe tener 8 dígitos y debe ser celular')
            res = false;
        }else if(!telefonoRegex.test(telefonoValue)){
            setErrorTienda(telefonoCelular, '*El campo debe empezar con 6 o 7')
            res = false;
        }else{
            setSuccessTienda(telefonoCelular);
        }
    }
    
    
    ///// condición para subir a la base de datos
    if(res==false){
        return res;
    }else{
        formulario.submit();
    }
    
}
const setErrorTienda = (element,message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error-tienda');

    errorDisplay.innerText = message;
    inputControl.classList.add('error-tienda');
}
const setSuccessTienda = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error-tienda');

    errorDisplay.innerText = '';
    inputControl.classList.add('error-tienda');
}
/* FIN CAMPOS TIENDA */