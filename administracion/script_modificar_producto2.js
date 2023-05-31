document.addEventListener('DOMContentLoaded', ()=>{
    const form = document.getElementById("formulario");
    
    form.addEventListener("submit", (event)=>{
        event.preventDefault();

        const nombreproducto = document.getElementById('Nombre_prod');
        const precioventa = document.getElementById('Precio_v');
        const preciocompra = document.getElementById('Precio_c');
        const fechavencimiento = document.getElementById('Nac');
        const cantidad = document.getElementById('Cant');
        const imagen = document.getElementById('Modific_image');
        const foto = document.getElementById('fot');

        const nombreproductoValue = nombreproducto.value;
        const precioventaValue = precioventa.value;
        const preciocompraValue = preciocompra.value;
        const cantidadValue = cantidad.value;
        const image_srcValue = imagen.src;

        const setError = (element,  message)=>{
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('#alerta');

            errorDisplay.innerText = message;
            inputControl.classList.add('alerta');
        }

        const succesError = (element,  message)=>{
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('#alerta');

            errorDisplay.innerText = message;
            inputControl.classList.remove('alerta');
        }
        
        if(nombreproductoValue === ""){
            setError(nombreproducto, "*Campo obligatorio.");
        } else if (nombreproductoValue < 3) {
            setError(nombreproducto, "*El campo debe tener más de 2 caracteres y solo alfabéticos.");
        } else if (nombreproductoValue > 16) {
            setError(nombreproducto, "*El campo debe tener más de 2 caracteres y solo alfabéticos.");
        } else {
            succesError(nombreproducto, "");
        }

        precioventa.addEventListener('keydown', function(event){
            if (event.key === 'e' || event.key === 'E' || event.key === ',') {
                event.preventDefault();
            }   
        });

        if(precioventaValue === ""){
            setError(precioventa, "*Campo obligatorio.");
        } else if (isNaN(precioventaValue)) {
            setError(precioventa, "*No se admiten letras.");
        } else {
            if(parseFloat(precioventaValue) !== parseFloat(parseFloat(precioventaValue).toFixed(1))){
                setError(precioventa, "*El campo debe tener solo 1 decimal.");
            }else if (precioventaValue < 0) {
                setError(precioventa, "*El campo no puede ser negativo.");
            } else if (precioventaValue > 999.9) {
                setError(precioventa, "*El campo debe ser menor a 1000.");
            } else if(precioventaValue < 0.5) {
                setError(precioventa, "*El campo debe ser mayor a 0.49");
            } else if (preciocompraValue == precioventaValue) {
                setError(precioventa, "*Venta y compra no permiten el mismo valor.");
            } else {
                succesError(precioventa, "");
            }
        }
        preciocompra.addEventListener('keydown', function(event) {
            if (event.key === 'e' || event.key === 'E' || event.key === ',') {
                event.preventDefault();
            }
        });

        if(preciocompraValue === ""){
            setError(preciocompra, "*Campo obligatorio.");
        } else if (isNaN(preciocompraValue)) {
            setError(preciocompra, "*No se admiten letras.");
        } else {
            
            if(parseFloat(preciocompraValue) !== parseFloat(parseFloat(preciocompraValue).toFixed(1))){
                setError(preciocompra, "*El campo debe tener solo 1 decimal.");
            }else if (preciocompraValue < 0) {
                setError(preciocompra, "*El campo no puede ser negativo.");
            } else if (preciocompraValue > 999.9) {
                setError(preciocompra, "*El campo debe ser menor a 1000.");
            } else if(preciocompraValue < 0.5) {
                setError(preciocompra, "*El campo debe ser mayor a 0.49");
            } else if (preciocompraValue == precioventaValue) {
                setError(preciocompra, "*Venta y compra no permiten el mismo valor.");
            } else {
                succesError(preciocompra, "");
            }
        }

        cantidad.addEventListener('keydown', function(event) {
            if (event.key === 'e' || event.key === 'E'|| event.key === ',') {
                event.preventDefault();
            }
        });
        
        if(cantidadValue === ""){
            setError(cantidad, "*Campo obligatorio.");
        } else if (isNaN(cantidadValue)) {
            alerta.textContent = "*No se admiten letras.";
        } else{
            if(!Number.isInteger(parseFloat(cantidadValue))){
                setError(cantidad, "*El campo debe ser un número entero sin decimales.");
            } else if (cantidadValue < 0) {
                setError(cantidad, "*El campo no puede ser negativo.");
            } else if(cantidadValue > 999){
                setError(cantidad, "*Sólo se permite hasta 999 de stock.");
            } else {
                succesError(cantidad, "");
            }
        }

        var today = new Date();
        fechavencimiento.min =  today.setHours(0, 0, 0, 0);
        var inputDate = new Date(fechavencimiento.value);

        if (inputDate < today) {
            setError(fecha, '*Fecha no permitida');
            res = false;
        }else{
            setSuccess(fecha);
        }
        
        if(image_srcValue === ""){
            setError(imagen, "*Campo obligatorio.");
        } else if (image_srcValue !== "" && !/\.(jpg|png|jpeg)$/i.test(image_srcValue)) {
            setError(imagen, "*Solo se permiten archivos de tipo JPG o PNG.");
        } else {
            succesError(imagen, "");
        }

        foto.addEventListener('change', function(event){
                const archivo = event.target.files[0];
                const src_url = URL.createObjectURL(archivo);
                imagen.src = src_url;

            }
            );

        const divsAlerta = document.querySelectorAll("#alerta");
        let error = false;
        for(let i=0; i < divsAlerta.length; i++){
            if(divsAlerta[i].textContent !== ""){
                error = true;
                break;
            }
        }
        

        if (error) {
            return false;
        }else{
            event.target.submit();
        }
    });

    const $seleccionArchivos = document.querySelector("#fot");
    $imagenPrevisualizacion = document.querySelector("#Modific_image");

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
    // Y a la fuente de la imagen le ponemos el objectURL
    $imagenPrevisualizacion.src = objectURL;
    });
});