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
            <section id class="pantalla-dividida"style="min-height: 88.6vh;">
                <div class="izq">
                    <img src="src/freen.svg" alt="">
                </div>
                <div class="der">
                    <div class="der_titulo">
                        <div class="icono_tienda">
                            <img src="src/becky.svg" alt="">
                        </div>
                        <h1>DATOS DE LA TIENDA</h1>
                    </div>
                    <form action="back/datos_registrar_tienda.php" class="formulario" id="formulario" method="post" onsubmit="return validate_tienda()" novalidate>
                    <div class="seccion_inputs">
                            <div class="contenedor_general">
                                <label for="">Nombre de la tienda</label>
                                <input type="text" name="nombretienda" id="nombretienda" placeholder="Ingrese nombre de su tienda">
                                <div class="error-tienda"></div>
                            </div>
                            <div class="contenedor_general">
                                <label for="">Dirección</label>
                                <input type="text" name="direccion" id="direccion" placeholder="Calle 1, Av imnominada">
                                <div class="error-tienda"></div>
                            </div>
                            <div class="contenedor_general">
                                <label for="">Referencia</label>
                                <input type="text" name="referencia" id="referencia" placeholder="Tienda roja, con techo roto">
                                <div class="error-tienda"></div>
                            </div>
                            <div class="contenedor_general">
                                <label for="">Teléfono celular</label>
                                <input type="text" name="telefono" id="telefono" placeholder="XXXX-XXXX">
                                <div class="error-tienda"></div>
                            </div>
                        
                    </div>
                    <div class="boton_anterior_registrar">
                            <a href="https://shopbarrio.online/sprint2/administracion/registrar_administrador" >Anterior</a>
                            <button type="submit" class="botonAR" >Registrar</button>
                    </div>                                               
                    </form>
                </div>
            </section>         
        </section>
        <!-- FIN DEL CONTENIDO -->    
        <section name="footer">
            <?php include_once 'footer.php'; ?>
        </section>
    </body>
</html>