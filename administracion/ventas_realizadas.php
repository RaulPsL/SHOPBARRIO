<?php
session_start(); 
include_once 'credenciales.php';
include_once 'back/datos._vent_real.php';
$ventasreal1=$_SESSION['ventas1'];


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
            <?php include_once 'header.php'; myheader("Ventas realizadas");?>
            <?php include_once 'barra_herramientas.php';?>
            <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
            <!-- INICIO DEL CONTENIDO -->
            <section name="contenido-pagina">

                <?php
                if (is_null($ventasreal1)) { ?>
                <div class="lista_vacia">
                    <img src="src/img-hacia-arriba.png" class="imagen_flecha">
                    <div class="detalle-ventasgif">
                        <img src="src/ventas.gif" class="gif2">
                    </div>
                    <p style="font-size: 22px; text-align: center;">¿Qué tal registrar tu primera venta? </p>
                </div>

                <div>

                </div>
                <?php } else {
                    ?>

                <body>
                    <div class="container">
                     <section class="btones">
                        <label class="total_venta">
                            <h4>Total Ventas: Bs.
                                <?php echo $suma_realizados; ?>
                            </h4>
                        </label>
                        <div class="boton_todo_venta">
                            <div class="boton_tven"  onclick="location.href='mostrar_detalle_todas_ventas.php'">
                                <img src="src/list.svg" class="list">
                                <h1>Detalle ventas</h1>
                            </div>
                        </div>
                     </section>
                        <div class="left-container" div id="mi">

                            <!-- Contenido de la sección izquierda -->
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width:280px;">Número de Venta</th>
                                        <th style="width:350px;">Fecha</th>
                                        <th style="width:350px;">Monto Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                   
                    foreach ($ventasreal1 as $ventita) { 
                    ?>
                                    <tr
                                        onclick="location.href='mostrar_detalle_venta.php?id_venta=<?php echo $ventita['ID_VENTA']; ?>'">
                                        <td><?php echo $ventita['ID_VENTA']; ?></td>
                                        <td><?php echo $ventita['FECHA_VENTA']; ?></td>
                                        <td><?php echo $ventita['TOTAL_VENTA']; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php }
                                    
                                    ?>
                                </tbody>
                            </table>
                            <!-- FIN DEL CONTENIDO -->
            </section>
    </div>
    <section name="footer">
        <?php include_once 'footer.php'; ?>
    </section>

    </div>





</body>

</html>