<meta charset="utf-8" />
<title>Shopbarrio</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="src/pan2.png"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity = "sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin = "anonymous" referrerpolicy = "no-referrer"/>
<link rel="stylesheet" href="css/style_general.css">
<link rel="stylesheet" href="css/style_menu.css">
<link rel="stylesheet" href="css/style_footer.css">
<link rel="stylesheet" href="css/style_header.css">
<link rel="stylesheet" href="css/style_barra_herramientas.css">
<link rel="stylesheet" href="css/style_vender.css">
<link rel="stylesheet" href="css/style_mostrar_productos.css">
<link rel="stylesheet" href="css/style_registrar_producto.css">
<link rel="stylesheet" href="css/style_modificar_producto.css">

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/script_menu.js"></script>

<?php 
$pagina=basename($_SERVER['PHP_SELF']);
switch ($pagina) {
    case "vender.php":
        ?>
        <script src="js/script_vender.js"></script>
        <?php
        break;
    case "mostrar_productos.php":
        ?>

        <?php
        break;
    case "registrar_producto.php":
        ?>
        <script src="js/script_registrar_producto.js"></script> 
        <?php
        break;
    case "modificar_producto.php":
        ?>
        <script src="js/script_modificar_producto2.js"></script>
        <?php
        break;
    default:
        ?>
        <?php
        break;
}
?>







