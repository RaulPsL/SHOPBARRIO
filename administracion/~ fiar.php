<?php 
include_once 'credenciales.php';
include_once 'back/datos_productos.php';
$productos=$_SESSION['productos'];
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'head.php'; ?>
    </head>
    <body>
        <div class="izquierda-derecha">
            <section class="lado-izquierdo" name="lado-izquierdo">
                <?php include_once 'menu_izq.php'; ?>
            </section>
            <section class="lado-derecho" name="lado-derecho">
                <?php include_once 'header.php'; myheader("Registra tus fiados");?>
                <?php include_once 'barra_herramientas.php';?>
                <!-- INICIO DEL CONTENIDO -->
                <section name="contenido-pagina">
  
                    <dialog class="contenido-pagina-dialog" id="modal" opne="true">
                        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_atippmse.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                        <p>Registro exitoso</p>
                    </dialog> 

                    <div class="vender-contenido">

                        <div class="vender-productos">
                            <h2>Productos disponibles</h2>
                            <div class="lista-productos" id="lista-productos">
                                <?php 
                                foreach ($productos as $producto) { ?>
                                    <div class="tarjeta-producto">
                                        <div class="contenedor-imagen">
                                            <img class="tarjeta-imagen" id="producto-<?php echo $producto['ID_PRODUCTO']; ?>" src="<?php echo $producto['IMAGEN_PRODUCTO']; ?>" alt="imagen no encontrada" onerror="this.onerror=null;this.src='src/sinimagen.jpg';">
                                        </div>
                                        <div class="tarjeta-datos">
                                            <div class="tarjeta-precio">
                                                <p><span>Bs. </span><?php echo $producto['PRECIOV_PRODUCTO']; ?></p>
                                            </div>
                                            <div class="tarjeta-stock">
                                                <p><span>Cant. </span><?php echo $producto['STOCK_PRODUCTO']; ?></p>
                                            </div>
                                        </div>                                  
                                        <p><?php echo $producto['NOMBRE_PRODUCTO']; ?></p>
                                    </div> 
                                <?php } ?>
                            </div>

                            <div class="lista-productos" id="lista-productos-buscados">
                                <!-- con js se agregara codigo html aqui -->    
                            </div>
                        </div>
          
                        <div class="vender-detalle-lleno">
                                <div class="titulo-detalle" id="detalle">
                                    <h2>Detalle de deuda</h2>
                                </div>
                                <div class="titulo-detalle ocultar" id="deudor">
                                    <h2>Registrar deudor</h2>
                                </div>

                                <div class="contenedor-items" id="contenedor-items">
                                    <!-- con js se agregara acodigo html aqui -->
                                </div>
                                <div class="datos-deudor ocultar" id="datos-deudor">
                                    
                                    <div class="campo-deudor">
                                        <label >Nombre:</label>
                                        <input type="text" id="nombre-deudor">
                                        <p class="error error-nombre ocultar"></p>
                                    </div>
                                    <div class="campo-deudor">
                                        <label >Telefono:</label>
                                        <input type="number" id="telefono-deudor">
                                        <p class="error error-telefono ocultar"></p>
                                    </div>
                                    <div class="campo-deudor">
                                        <label >Direccion:</label>
                                        <input type="text" id="direccion-deudor">
                                        <p class="error error-direccion ocultar"></p>
                                    </div>

                                </div>

                                <div class="detalle-gif" id="detalle-gif-vacio">
                                    <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_wd1udlcz.json"  background="transparent"  speed="1"  loop  autoplay class="detalle-gif-movil"></lottie-player>
                                    <p>Presiona sobre cualquier producto para añadirlo a tu detalle de deuda</p>
                                </div>

                                <div class="detalle-total ocultar" id="detalle-total">
                                    <div class="fila">
                                        <strong>Total: </strong>
                                        <strong>Bs. <span class="detalle-precio-total">0</span></strong>
                                    </div>
                                    <a onclick="continuar()"class="boton-registrar-venta" id="continuar">Continuar</a>
                                    <a onclick="vaciar()" class="boton-cancelar-registro-venta" id="vaciar">Vaciar</a>

                                    <a onclick="enviar()"class="boton-registrar-venta ocultar" id="enviar" name="enviar">Registrar</a>
                                    <a onclick="irAtras()" class="boton-cancelar-registro-venta ocultar" id="atras">Atras</a>
                                </div>
                            
                                <div class="detalle-gestor">
                                    <img src="src/icon-carrito.svg">   
                                </div>
                        </div>
                    </div>
                </section>
                <!-- FIN DEL CONTENIDO -->
            </section>
        </div>    
        
        <section name="footer">
            <?php include_once 'footer.php'; ?>
        </section>
    </body>
</html>