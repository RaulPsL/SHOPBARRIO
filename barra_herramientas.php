<?php include_once 'back/venta-historico.php'; ?>
<?php 
$pagina=basename($_SERVER['PHP_SELF']);
switch ($pagina) {
    case "vender.php":
        ?>
        <div class="barra-herramientas">
            <label class="venta-historico"><h3>Historico de ventas: Bs. <?php echo $venta_historico; ?></h3></label>
        </div>
        <?php
        break;

    case "productos.php":
        ?>
        <div class="barra-herramientas">
            <label class="venta-historico">Otra cosa</label>
        </div>
        <?php
        break;

    // Agregar más casos según sea necesario

    default:
        // Código a ejecutar si no se cumple ningún caso anterior
        ?>
        <div>
            
        </div>
        <?php
        break;
}
?>
