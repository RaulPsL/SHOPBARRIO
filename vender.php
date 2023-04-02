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
            <?php include_once 'header.php';
            myheader("Registrar Venta"); ?>
            <?php include_once 'barra_herramientas.php'; ?>
            <!-- INICIO DEL CONTENIDO -->
            <section name="contenido-pagina">
                <div class="vender-contenido">
                    <div class="vender-productos">
                        <h1>Productos</h1>
                    </div>
                    <div class="vender-detalle">
                        <?php include_once 'detalle_lleno.php'; ?>
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