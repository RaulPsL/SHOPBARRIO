<?php include_once 'credenciales.php'; ?>
<?php include_once 'back/datos_proveedores.php'; ?>
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
                <?php include_once 'header.php'; myheader("Proveedores");?>
                <?php include_once 'barra_herramientas.php';?>
                <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
                <!-- INICIO DEL CONTENIDO -->
                <section name="contenido-pagina">
                <section class="parte-superior">
        <div class="buscador">
            <p>Total Proveedores:</p>
        </div>
        <div class="boton-registrar">
            <a href="">+Registrar Proveedor</a>
        </div>
    </section>
    <section class="titulos-tabla">
    <?php if (empty($datos)): ?>
        <div class="pantalla-vacia">
            <div class="imagen-cargeros">
                <img src="./carguerosuwu.png" alt="">
                <p>¿Vamos a registrar el primer proveedor?</p>
            </div>
            <img class="flecha" src="./flecha webona.png" alt="">  
        </div>
        <?php else: ?>
        <div class="tabla">
            <table>
                <tr class="fila-titulo">
                    <td class="tabla-titulo">#</td>
                    <td class="tabla-titulo">Nombre</td>
                    <td class="tabla-titulo">Celular</td>
                    <td class="tabla-titulo">Email</td>
                    <td class="tabla-titulo">Descripción</td>
                    <td class="tabla-titulo"></td>
                </tr>
                <tr class="tabla-esquizo">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php foreach ($datos as $fila): ?>
                <tr class="fila">
                    <td class="tabla-texto" data-cell ="#"><?php echo $fila['id']; ?></td>
                    <td class="tabla-texto" data-cell="Nombre"><?php echo $fila['nombre']; ?></td>
                    <td data-cell="Celular"><?php echo $fila['celular']; ?></td>
                    <td data-cell="Email"><?php echo $fila['email']; ?></td>
                    <td data-cell="Descripción"><?php echo $fila['descripcion']; ?></td>
                    <td><a class="icono-editar" href=""><img src="./🦆 icon _edit two_.png" alt=""></a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </section>
                </section>
                <!-- FIN DEL CONTENIDO -->
            </section>
        </div>            
        <section name="footer">
            <?php include_once 'footer.php'; ?>
        </section>
    </body>
</html>