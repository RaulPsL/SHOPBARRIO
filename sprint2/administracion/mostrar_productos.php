<?php 
include_once 'back/datos_productos_todos.php';
$productos=$_SESSION['productos'];

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
                <?php include_once 'header.php'; myheader("Todos los productos");?>
                <?php include_once 'barra_herramientas.php';?>
                <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
                <!-- INICIO DEL CONTENIDO -->
                <section name="contenido-pagina">
                    
                    <?php
                    if (is_null($productos)) { ?>
                        <div class="tabla-vacio">
                            <img src="src/img-hacia-arriba.png" class="imagen2">
                            <div class="detalle-gif">
                                <img src="src/gif-store.gif"  class="gif">
                            </div>
                            <p style="font-size: 20px; text-align: center;">¿Qué tal adicionar tu primer producto? </p>
                        </div>
                    <?php }
                    else{   
                    ?>
			<div class="tabla1">  
                        <table>
				<div class="titulos">
                            <thead class="table-warning">
                                <tr>  
                                    <th scope="col">Productos</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Editar Producto</th>
                                </tr>
                            </thead>
				</div>
                            <tbody class="table-group-divider">
                                <?php                             
                                    foreach ($productos as $producto) { ?>
                                        <tr>
                                            <th scope="row">   
                                                <a <?php $id_prod = $producto['ID_PRODUCTO']?> href="modificar_producto?id_producto=<?php echo $id_prod?>"><img class="tarjeta-imagen" src="<?php echo $producto['IMAGEN_PRODUCTO']; ?>" alt="imagen no encontrada" onerror="this.onerror=null;this.src='src/sinimagen.jpg';" style="width: 125px;height: 100px; border-radius: 5px;"></a>
                                            </th>
                                            <td><p><?php echo $producto['NOMBRE_PRODUCTO']; ?></p></td>
                                            <td><p><span>Bs.</span><?php echo $producto['PRECIOV_PRODUCTO'];?></p></td>
                                            <td><p><span>#</span><?php echo $producto['STOCK_PRODUCTO'];?></td>
                                            <td><a <?php $id_prod = $producto['ID_PRODUCTO']?> href="modificar_producto?id_producto=<?php echo $id_prod?>"><div class="lp"><img src="src/img-lapiz.jpg"></div></a></td>
                                        </tr> 
                                    <?php }    
                                }
                            ?> 
                            </tbody>
                        </table>
                    </div>
                        
                </section>
                <!-- FIN DEL CONTENIDO -->
            </section>
        </div>            
        <section name="footer">
            <?php include_once 'footer.php'; ?>
        </section>
    </body>
</html>