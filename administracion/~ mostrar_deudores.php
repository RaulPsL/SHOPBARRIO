<?php include_once 'credenciales.php'; ?>
<?php include_once 'back/datos_select_deudores.php';
include_once 'include/tabla.php'; 
$deudores=$_SESSION['deudores']; 
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
            <?php include_once 'header.php'; myheader("Deudores registrados"); ?>
            <?php include_once 'barra_herramientas.php'; ?>
            <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
            <!-- INICIO DEL CONTENIDO -->
            <section name="contenido-pagina">
                <?php                 
                    generarTabla(array(
                        "clase" => "tabla-vender",
                        "thead" => array(
                            "Numero", "Nombre", "Telefono", "Direccion", "Deuda Bs."
                        ),
                        "tbody" => $deudores,
                        "columnas"=>arraY(
                            "numberRow","NOMBRE_DEUDOR", "TELEFONO_DEUDOR", "DIRECCION_DEUDOR", "TOTAL_DEUDA"
                        )
                    ));
                ?>
            </section>
            <!-- FIN DEL CONTENIDO -->
        </section>
    </div>
    <section name="footer">
        <?php include_once 'footer.php'; ?>
    </section>
</body>

</html>