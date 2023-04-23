document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('.login-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma convencional
        
        const username = form.querySelector('#username').value;
        const password = form.querySelector('#password').value;
        
        const data = new FormData(); // Crea un objeto FormData para enviar los datos
        data.append('username', username);
        data.append('password', password);
        
        fetch('back/datos_login.php', {
            method: 'POST',
            body: data
        })
        .then(response => {
            return response.json(); // llamar al método json() para obtener el cuerpo de la respuesta
        })
        .then(data => {
            if(data.mensaje.length>0){
                document.querySelector('.error-1').classList.remove("ocultar")
                document.querySelector('.error-2').classList.remove("ocultar")
            }else{
                window.location.href = "mostrar_productos";
            }
        })
        .catch(error => {
            console.log('Error:', error);
        });
    });
})