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
                <section namse="contenido-pagina">

                </section>
                <!-- FIN DEL CONTENIDO -->
            </section>
        </div>    
        
        <section name="footer">
            <?php include_once 'footer.php'; ?>
        </section>
    </body>
</html>