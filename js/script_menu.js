document.addEventListener("DOMContentLoaded", function() {
    const myElements = document.getElementsByClassName('menu-content-area');
    const isColored = [];
    let lastColoredIndex;
    
    Array.from(myElements).forEach((element, index) => {
        isColored[index] = { state: false };
    
        element.addEventListener('click', function() {
        if (isColored[index].state) {
            plegar(index)
            isColored[index].state = false;
            console.log("se despintó");
        } else {
            // check if there is a previously colored element
            if (typeof lastColoredIndex !== 'undefined') {
            plegar(lastColoredIndex)
            isColored[lastColoredIndex].state = false;
            console.log("se despintó el elemento anterior");
            }
            desplegar(index)
            isColored[index].state = true;
            lastColoredIndex = index;
            console.log("se pintó");
        }
        });
    });
});
function desplegar(index){
    var iconos = document.getElementsByClassName("icon-area-"+index);
    if(iconos.length > 0){
        iconos[0].classList.add('ocultar')
        iconos[1].classList.remove('ocultar')
    }
    var elementos = document.getElementsByClassName('area-'+index);
    Array.from(elementos).forEach((element) => {
        element.classList.remove('ocultar-flex')
        element.classList.add('mostrar-flex')
    });
}
function plegar(index){
    var iconos = document.getElementsByClassName("icon-area-"+index);
    if(iconos.length > 0){
        iconos[0].classList.remove('ocultar')
        iconos[1].classList.add('ocultar')
    }
    var elementos = document.getElementsByClassName('area-'+index);
    Array.from(elementos).forEach((element) => {
        element.classList.add('ocultar-flex')
        element.classList.remove('mostrar-flex')
    });
}

function abrirPagina(link){
    window.location.href="https://shopbarrio.online/administracion/vender"
}