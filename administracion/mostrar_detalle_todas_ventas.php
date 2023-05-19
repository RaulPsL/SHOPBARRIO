<?php 
include_once 'credenciales.php';
include_once 'back/datos_det_tod_venta.php';
$dettodventas4=$_SESSION['dettodventa2'];
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
        <?php include_once 'header.php'; myheader('<div class="volver-atras"><button class="boton-volver" onclick="goBack()">  <img src="src/action-undo.svg" class="action-undo"> </button></div><div class="titulo">Detalle de todas las ventas</div>'); ?>
            <?php include_once 'barra_herramientas.php';?>
            <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
            <!-- INICIO DEL CONTENIDO -->
            <section name="contenido-pagina">

            
            <div class="labels-container">
                <label class="total">
                    <h4>Total Ventas: Bs.
                        <?php echo $suma_subtotal; ?>
                    </h4>
                    </label>
                    <label class="cantidad cantidad-label">
                        <h4>Cantidad: #
                            <?php echo $cantidad_det_tod_ventas ; ?>
                        </h4>
                        </label>
                        </div> 
                        <body>
                            <div class="container">
                                <div class="left-container" div id="mi">

                                    <!-- Contenido de la sección izquierda -->
                                    <div class="table-container">
                                    <div class="tabla2">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th style="width:200px;"> Número</th>
                                                <th style="width:200px;">Producto</th>
                                                <th style="width:200px;">Precio</th>
                                                <th style="width:200px;">Cantidad</th>
                                                <th style="width:200px;">Monto Parcial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                   
                    foreach ($dettodventas4 as $detallev) { 
                    ?>
                                            <tr >

                                                <td><?php echo $detallev['ID_DETALLEV']; ?></td>
                                                <td><?php echo $detallev['NOMBRE_PRODUCTO_DETALLEV']; ?></td>
                                                <td><?php echo $detallev['PRECIOV_PRODUCTO']; ?></td>
                                                <td><?php echo $detallev['CANTIDAD_DETALLEV']; ?></td>
                                                <td><?php echo $detallev['SUBTOTAL_DETALLEV']; ?></td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    </div>
                                    <!-- FIN DEL CONTENIDO -->
            </section>
    </div>
    <section name="footer">
        <?php include_once 'footer.php'; ?>
    </section>
    </div>
</body>
<script>
function goBack() {
   window.history.back();
};
 </script>

</html>