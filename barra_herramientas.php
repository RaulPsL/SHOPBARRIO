<?php include_once 'back/venta-historico.php'; ?>
<?php 
$pagina=basename($_SERVER['PHP_SELF']);
switch ($pagina) {
    case "vender.php":
        ?>
        <div class="barra-herramientas">
            <label class="venta-historico">Total vendido: Bs. <?php echo $venta_historico; ?></label>
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
        <div class="barra-herramientas">
            <label>no hay nada</label>
        </div>
        <?php
        break;
}
?>
