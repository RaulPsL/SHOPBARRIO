<?php
include_once 'back/datos_usuario.php';
function myheader($titulo){
    global $usuario;
?>
    <div class="header">
        <div class="header-titulo">
            <h1> <?php echo $titulo; ?></h1>
        </div>
        <div class="header-usuario">
            <img src="src/icon-avatar.svg">
            <p><?php echo $usuario[0] . " " . $usuario[1]; ?></p>
        </div>
    </div>
<?php
}