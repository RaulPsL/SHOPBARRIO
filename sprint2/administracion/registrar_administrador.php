<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'head.php'; ?>
    </head>
    <body>
        
                <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
                <!-- INICIO DEL CONTENIDO -->
        <section name="barra_inicial">
            <div name="contenedor_barra">
                <div>
                    <img class="icon_home" src="src/icon_usuario.png" alt="">
                </div>
                <div>
                    <p>SHOPBARRIO</p>
                </div>
            </div>
        </section>
        <section name="contenido-pagina">
            <div id class="pantalla-dividida">
                <div class="izquierda">
                    <div class="parte_superior"> 
                        <div class="icono_usuario">
                        <img src="src/icon-usuario.png" alt="">
                        </div>
                        <div class="titulo">
                        <h1>Datos del Administrador</h1>
                        </div>
                    </div>
                   

                    <form action="datos_registrar_admin.php" method="POST" name="formulario" id="formulario">
                        <div class="txt_field">
                            <label for="nombre" class="nombreusuario">Nombre Usuario</label>
                            <input type="text" id="nombre" name="nombre">
                            <div class="error"></div>
                        </div>
                        <div class="txt_field">
                            <label for="password" class="contraseña">Contraseña</label>
                            <input type="password" id="password" name="password">
                            <div class="error"></div>
                        </div>
                        <div class="txt_field">
                            <label for="password" class="confirmarcontraseña">Confirmar Contraseña</label>
                            <input type="password" id="password" name="password">
                            <div class="error"></div>
                        </div>
                        <div class="txt_field">
                            <label for="email" class="correoelectronico">Correo Electronico</label>
                            <input type="email" id="email" name="email">
                            <div class="error"></div>
                        </div>
                        <div class="txt_field">
                            <label for="telefono" class="telefono">Telefono</label>
                            <input type="number" id="telefono" name="telefono">
                            <div class="error"></div>
                        </div>

                        <div class="btn_field">
                            <a href="">Cancelar</a>
                            <button type="submit" class="botonsiguiente" href="https://shopbarrio.online/sprint2/administracion/registrar_tienda">Siguiente</button>
                        </div>
                    </form>
                    
                </div>
                <div class="derecha">
                        <img class="imagenusuario"  src="src/img_usuario.jfif" alt="">
                </div>
            </div>         
        </section>
        <section name="footer">
            <?php include_once 'footer.php'; ?>
        </section>
        
    </body>
</html>