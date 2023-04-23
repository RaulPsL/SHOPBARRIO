document.addEventListener("DOMContentLoaded", function(){
    event.preventDefault();
    const nombreproducto = document.getElementById('Nombre_prod');
    const precioventa = document.getElementById('Precio_v');
    const preciocompra = document.getElementById('Precio_c');
    const fecha = document.getElementById('Nac');
    const cantidad = document.getElementById('Cant');
    const imagen = document.getElementById('fot');

    validar();
});

function validar(){
    const form = document.getElementById('formulario');
    const inputs = document.querySelectorAll('#formulario input');
    inputs.forEach(input => {
        
        switch (input.tagName) {
            case "Nombre_prod":
                const errorNombre = document.getElementById('');
                if(input.tagName.valueOf === ""){
                    input.ariaRequired = true;
                    errorNombre.textContent = "*Campo obligatorio.";
                    document.getElementById().classList.add(errorNombre);
                }else if(/^(a-zA-Z0-9)+$/.test(input.tagName)){
                    errorNombre.textContent = "*.";
                    document.getElementById().classList.add(errorNombre);
                }else if (input.ariaValueText.length > 10) {
                    errorNombre.textContent = "*Campo obligatorio.";
                    document.getElementById().classList.add(errorNombre);
                }else if (input.ariaValueText.length < 2) {
                    errorNombre.textContent = "*Campo obligatorio.";
                    document.getElementById().classList.add(errorNombre);
                }else{
                    document.getElementById().classList.remove(errorNombre);
                }

                break;
            case "Precio_v":
                const errorVenta = document.getElementById('');
                input.ariaValueMax = 999,9;
                input.ariaValueMin = 0,5;
                if(input.ariaValueNow){

                }else if(input.ariaValueNow < input.ariaValueMin){

                }else if (input.ariaValueNo > input.ariaValueMax) {
                    
                }else if (condition) {
                    
                }
                break;
            case "Precio_c":
                input.ariaRequired = true;
                break;
            case "Nac":
                input.ariaRequired = true;
                break;
            case "Cant":
                input.ariaRequired = true;
                break;
            case "fot":
                input.ariaRequired = true;
                break;
            default:
                break;
        }
    });
}

