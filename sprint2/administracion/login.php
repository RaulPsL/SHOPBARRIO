<!DOCTYPE html>
<html>

<head>
    <?php include_once 'head.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
    <!-- INICIO DEL CONTENIDO -->
    <section name="contenido-pagina">

        <section class="head-login">
            <span class="icon">x</span>
            <h1>SHOPBARRIO</h1>
        </section>

        <form class="login-form" action="#" method="post">
            <h2>INICIAR SESIÓN</h2>

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
                <a href= https://shopbarrio.online/sprint2/ class="cancel-button">Ir al inicio</a>
                <p class="register-button">¿No tienes cuenta? <a href="#" class="register-button"> Regístrate</a></p>
            </div>
        </form>

    </section>
    <!-- FIN DEL CONTENIDO -->
    <section name="footer">
        <?php include_once 'footer.php'; ?>
    </section>
</body>

</html