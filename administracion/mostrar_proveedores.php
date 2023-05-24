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
                            <h3>Total Proveedores: <?php echo $row; ?></h3>
                        </div>
                        <div class="boton-registrar">
                            <a href="registrar_proveedor">+Registrar Proveedor</a>
                        </div>
                    </section>
                    <section class="titulos-tabla">
                    <?php if (is_null($proveedores)) { ?>
                        <div class="pantalla-vacia">
                            <div class="imagen-cargeros">
                                <img src="src/carguerosuwu.png" alt="">
                                <p>¿Vamos a registrar el primer proveedor?</p>
                            </div>
                            <!-- -->  
                            <div class="contenedor-flecha">
                                <img class="flecha" src="src/flecha webona.png" alt="">
                            </div>                              
                        </div>
                        <?php } else { ?>
                        <div class="contenedor-tabla">
                            <table class="contenido-tabla">
                                    <thead>
                                        <tr>
                                            <th>Número</th>
                                            <th style="width:20%;">Nombre</th>
                                            <th>Teléfono</th>
                                            <th style="width:50%;">Descripción</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($proveedores as $proveedor) { ?>
                                        <tr>
                                            <td><?php echo $proveedor['ID_PROVEEDOR']; ?></td>
                                            <td style="width:20%;"><?php echo $proveedor['NOMBRE_PROVEEDOR']; ?></td>
                                            <td><?php echo $proveedor['CELULAR_PROVEEDOR']; ?></td>
                                            <td style="width:50%;"><?php echo $proveedor['DESCRIPCION_PROVEEDOR']; ?></td>
                                            <td><a class="icono-editar" href="modificar_proveedor.php?id=<?php echo $proveedor['ID_PROVEEDORES']; ?>"><img src="src/🦆 icon _edit two_.png" alt=""></a></td>
                                        </tr>
                                    <?php 
                                }
                            }
                                ?>
                                </tbody>                
                                </table>
                        </div>    
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