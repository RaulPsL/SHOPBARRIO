<?php include_once 'back/datos_productos.php'; ?>
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
                <?php include_once 'header.php'; myheader("Registra tus ventas");?>
                <?php include_once 'barra_herramientas.php';?>
                <!-- INICIO DEL CONTENIDO -->
                <section name="contenido-pagina">
                    <div class="vender-contenido">
                        <div class="vender-productos">
                            <h1>Productos disponibles</h1>
                            <div class="lista-productos">

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
                        </div>
                        <!--
                        <div class="vender-detalle-vacio">
                            <h3>Detalle de venta</h3>
                            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_wd1udlcz.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                            <p>Presiona sobre cualquier producto para añadirlo a tu detalle de venta</p>
                        </div>
                        -->
                        <?php include_once 'detalle_lleno.php'; ?>
                        
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