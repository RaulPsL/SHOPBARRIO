function validate() {
    const formulario = document.getElementById('formulario');
    const nombreproducto = document.getElementById('nombreproducto');
    
    validateInputs();
}       
const setError = (element,message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
}

const validateInputs = () => {
    event.preventDefault();
    const nombreproductoValue = nombreproducto.value.trim();

    if(nombreproductoValue === ''){
        setError(nombreproducto, 'Campo obligatorio');
        return false;
    }else{
        formulario.submit();
    }
}