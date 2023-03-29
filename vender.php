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
                <?php include_once 'header.php'; myheader("este es mi titulo");?>
                <?php include_once 'barra_herramientas.php';?>
                <!-- INICIO DEL CONTENIDO -->
                <section name="contenido-pagina">
                    <div class="vender-contenido">
                        <div class="vender-productos">
                            <h1>izquierdo</h1>
                        </div>
                        <div class="vender-detalle">
                            <h3>Detalle de venta</h3>
                            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_wd1udlcz.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                            <p>Presiona sobre cualquier producto para añadirlo a tu detalle de venta</p>
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