<?php include_once 'back/datos_tienda.php'; ?>
<div class="menu">
    <div class="menu-title">           
        <lottie-player class="menu-gif" src="https://assets1.lottiefiles.com/packages/lf20_xavpbl2r.json"  background="transparent"  speed="1" loop  autoplay></lottie-player>        
        
        <h1><?php echo $tienda; ?></h1>
    </div>
    <div class="menu-content">
        <div class="menu-content-area areas-subareas">
            <img src="src/icon-product.svg">
            <h2>Productos</h2>
            <img class="icon-area-0 " src="src/icon-down.svg">
            <img class="icon-area-0 ocultar" src="src/icon-up.svg">
        </div>
        <div class="menu-content-subarea area-0 ocultar-flex">
            <img src="src/icon-arrow.svg">
            <a href="https://shopbarrio.online/administracion/mostrar_productos"><h3>Todos los productos</h3></a>
        </div>
        <div class="menu-content-subarea area-0 ocultar-flex"   >
            <img src="src/icon-arrow.svg">
            <a href="https://shopbarrio.online/administracion/registrar_producto"><h3>Nuevo producto</h3></a>
        </div>
        <div onclick="abrirPagina('/#')" class="menu-content-area">
            <img src="src/icon-vender.svg">
            <h2>Vender</h2>
            <img src="src/icon-down.svg" style="opacity:0;">
        </div>
    </div>
</div>
    