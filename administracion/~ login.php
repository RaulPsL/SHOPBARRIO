<?php include_once 'credenciales.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once 'head.php'; ?>
</head>

<body>
    <?php include_once 'header_acceso.php'; ?>
    <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
    <!-- INICIO DEL CONTENIDO -->
    <section name="contenido-pagina">
            <form class="login-form"  novalidate> 
                <h2>INICIAR SESIÓN</h2>
                <p class="error error-1 ocultar">Usuario o Contraseña incorrectas</p>
                <p class="error error-2 ocultar">Revisa tus datos</p>
                <div class="input-fields">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" placeholder="Nombre de usuario" required>
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>

                </div>

                <div class="boton-enviar">
                    <button type="submit" class="login-button">Ingresar</button>
                </div>

                <div class="button-container">
                    <a href=".." class="cancel-button">Ir al inicio</a>
                    <p class="register-button">¿No tienes cuenta? <a href="registrar_admin_tienda" class="register-button"> Regístrate</a></p>
                </div>
            </form>
    </section>
    <!-- FIN DEL CONTENIDO -->
    <section name="footer">
        <?php include_once 'footer.php'; ?>
    </section>
</body>

</html