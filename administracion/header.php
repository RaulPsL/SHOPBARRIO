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
            <div class="usuario-sesion">
                <p><?php echo $usuario[0]; ?></p>
                <a href="logout">Cerrar Sesión</a>
            </div>
        </div>
    </div>
<?php
}