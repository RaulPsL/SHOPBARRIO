<?php
include_once 'credenciales.php';
include_once 'back/datos_productos_todos.php';
//$productos=$_SESSION['productos'];

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
            <?php include_once 'header.php';
            myheader("Todos los productos"); ?>
            <?php include_once 'barra_herramientas.php'; ?>
            <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
            <!-- INICIO DEL CONTENIDO -->
            <section name="contenido-pagina">

                <?php
                if (is_null($productos)) { ?>
                    <div class="tabla-vacio">
                        <img src="src/img-hacia-arriba.png" class="imagen2">
                        <div class="detalle-gif">
                            <img src="src/gif-store.gif" class="gif">
                        </div>
                        <p style="font-size: 22px; text-align: center;">¿Qué tal adicionar tu primer producto? </p>
                    </div>

                    <div>

                    </div>
                 <?php } else {
                    ?>
                    <div class="contenido">
                        <div class="tabla1">
                            <table class="tablaa" id="tablaa">
                                <div class="titulos">
                                    <thead class="table-warning">
                                        <tr>
                                            <th scope="col">Productos</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col">Categoría</th>
                                        </tr>
                                    </thead>
                                </div>
                                <tbody class="table-group-divider">
                                    <?php
                                    foreach ($productos as $producto) { ?>
                                    <tr>
                                        <th scope="row">
                                            <a <?php $id_prod = $producto['ID_PRODUCTO'] ?>
                                                href="mostrar_detalle_producto.php?id_producto=<?php echo $id_prod ?>"><img
                                                    class="tarjeta-imagen2" src="<?php echo $producto['IMAGEN_PRODUCTO']; ?>"
                                                    alt="imagen no encontrada"
                                                    onerror="this.onerror=null;this.src='src/sinimagen.jpg';"
                                                    style=" border-radius: 5px;padding: 0px 0px;"></a>
                                        </th>
                                        <td>
                                            <?php echo $producto['NOMBRE_PRODUCTO']; ?>
                                            </p>
                                        </td>
                                        <td><span>Bs. </span>
                                            <?php echo $producto['PRECIOV_PRODUCTO']; ?>
                                            </p>
                                        </td>
                                        <td><span>#</span>
                                            <?php echo $producto['STOCK_PRODUCTO']; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <?php echo $producto['NOMBRE_CATEGORIA']; ?>
                                            </p>
                                        </td>

                                    </tr>
                                    <?php }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="filtros">
                                    <select class="selectcategoria" id="categoria" onclick="mandarDatos()">
                                    
                                    <?php if(strcmp($categoria, "") != 0) {?>
                                        <option value=""><?php echo $categoria?></option>
                                        <?php }?>
                                    <option value="Todos">Todos</option>
                                    <?php while ($row1 = $answer2->fetch_assoc()) {?>
                                                <option value="<?php echo $row1['NOMBRE_CATEGORIA']?>"><?php echo $row1['NOMBRE_CATEGORIA']?></option>
                                    <?php }?>
                                    </select>
                                    
                        </div>
                    </div>
                    <script>
                        
                    </script>
            </section>
            <!-- FIN DEL CONTENIDO -->
        </section>
    </div>
    <section name="footer">
        <?php include_once 'footer.php'; ?>
    </section>
</body>

</html>