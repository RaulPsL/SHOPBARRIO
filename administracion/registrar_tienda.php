<?php include_once 'back/datos_nombres_tienda.php'; ?>
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
        <section class="pantalla-dividida">
                <div class="izq ">
                    <img src="src/img_usuario.jfif" alt="">
                </div>
                <div class="der">
                    <div class="der_titulo_admin ">
                        <div class="icono_tienda ">
                            <img src="src/icon-usuario.png" alt="">
                        </div>
                        <h1>DATOS DEL ADMINISTRADOR</h1>
                    </div>

                    <div class="der_titulo_tienda ocultar">
                        <div class="icono_tienda">
                            <img src="src/becky.svg" alt="">
                        </div>
                        <h1>DATOS DE LA TIENDA</h1>
                    </div>

                    <form action="back/datos_registrar_admin_tienda.php" class="formulario" id="formulario" method="post" onsubmit="return validate_tienda()" novalidate>
                        
                        <div class="formulario_admin ">
                            <div class="seccion_inputs">
                            <div class="contenedor_general error">
                                    <label for="nombre" class="nombreusuario">Nombre Usuario</label>
                                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
                                    <div class="error-admin"></div>
                                </div>
                                <div class="contenedor_general error">
                                    <label for="password" class="contraseña">Contraseña</label>
                                    <input type="password" id="password" name="password" placeholder="XXXXXXXX">
                                    <div class="error-admin"></div>
                                </div>
                                <div class="contenedor_general error">
                                    <label for="password2" class="contraseña">Confirmar Contraseña</label>
                                    <input type="password" id="password2" name="password2" placeholder="XXXXXXXX">
                                    <div class="error-admin"></div>
                                </div>
                                <div class="contenedor_general error">
                                    <label for="email" class="correoelectronico">Correo Electronico</label>
                                    <input type="email" id="email" name="email" placeholder="XXX@gmail.com">
                                    <div class="error-admin"></div>
                                </div>
                                <div class="contenedor_general error">
                                    <label for="telefono" class="telefono">Telefono</label>
                                    <input type="number" id="telefono" name="telefono" placeholder="XXXX-XXXX">
                                    <div class="error-admin"></div>
                                </div>
                                <div class="Redireccionlogin"> 
                                    <p class="cuenta">¿Ya tienes una cuenta?</p>
                                    <a href="https://shopbarrio.online/sprint2/acceso/login" class="Inicia_sesion">Inicia sesión</a>
                                </div>
                            </div>
                            <div class="btn_field">
                                <a class="cancelar" href="..">Cancelar</a>
                                <!--
                                <button type="submit" class="botonsiguiente" href="https://shopbarrio.online/sprint2/administracion/registrar_tienda">Siguiente</button>
                                -->
                                <a class="botonsiguiente">Siguiente</a>
                            </div>  
                        </div>    

                        <div class="formulario_tienda ocultar   ">
                            <div class="seccion_inputs">
                                    <div class="contenedor_general">
                                        <label for="">Nombre de la tienda</label>
                                        <input type="text" name="nombretienda" id="nombretienda" placeholder="Ingrese nombre de su tienda" maxlength="20">
                                        <div class="error-tienda"></div>
                                    </div>
                                    <div class="contenedor_general">
                                        <label for="">Dirección</label>
                                        <input type="text" name="direccion" id="direccion" placeholder="Av imnominada, Calle Houston " maxlength="40">
                                        <div class="error-tienda"></div>
                                    </div>
                                    <div class="contenedor_general">
                                        <label for="">Referencia</label>
                                        <input type="text" name="referencia" id="referencia" placeholder="Tienda roja, con techo roto" maxlength="80">
                                        <div class="error-tienda"></div>
                                    </div>
                                    <div class="contenedor_general">
                                        <label for="">Teléfono de referencia</label>
                                        <input type="text" name="telefonoCelular" id="telefonoCelular" placeholder="XXXX-XXXX">
                                        <div class="error-tienda"></div>
                                    </div>
                            </div>
                            
                            <div class="boton_anterior_registrar">
                                    <!--<button onclick="cambiarPantalla()" class="botonR" >Anterior</button>-->
                                    <a class="botonR" >Anterior</a>
                                    <button type="submit" class="botonAR" >Registrar</button>
                            </div>   
                        </div>
                    </form>

                <!-- FIN LADO DERECHO TIENDA-->   
                </div>
            </section>         
        </section>
        <!-- FIN DEL CONTENIDO -->    
        <section name="footer">
            <?php include_once 'footer.php'; ?>
        </section>
    </body>
</html>
