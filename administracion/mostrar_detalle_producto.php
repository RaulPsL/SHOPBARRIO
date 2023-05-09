<?php 
include_once 'credenciales.php';
include_once 'back/datos_un_producto1.php';
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
            <?php include_once 'header.php'; myheader("Detalle de Producto");?>
            <?php include_once 'barra_herramientas.php';?>
            <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
            <!-- INICIO DEL CONTENIDO -->
            <section name="contenido-pagina">

                <body>
                    <div class="container">
                        <div class="left-container" div id="mi">

                            <!-- Contenido de la sección izquierda -->
                            <tr>

                                <div id="mi22" style="position: relative;">
                                    <img class="tarjeta22" src="<?php echo $producto['IMAGEN_PRODUCTO']; ?>"
                                        alt="imagen no encontrada"
                                        onerror="this.onerror=null;this.src='src/sinimagen.jpg';"
                                        style="border-radius: 5px; border: 20px solid #3A5864; margin: 10px">
                                </div>
                            </tr>
                            <div onclick="location.href='modificar_producto.php?id_producto=<?php echo $producto['ID_PRODUCTO'];?>&direccion=<?php echo $direccion;?>'"
                                class="boton_editar">
                                <img src="src/editar.svg" class="editar">
                                <h3>Editar</h3>
                            </div>

                            <div onclick="mostrarModal()" class="boton_eliminar">
                                <img src="src/eliminar.svg" class="eliminar">
                                <h2>Eliminar</h2>
                            </div>
                        </div>


                        <div class="right-container">
                            <!-- Contenido de la sección derecha -->
                            <div class="nombrep">
                                <th>
                                    <p style="font-size: 30px; padding: 5px 5px; margin: 0; ">
                                        <?php echo $producto["NOMBRE_PRODUCTO"];?></p>
                                </th>
                            </div>

                            <div>
                                <div class="tabla51">

                                    <tbody id="mi-tabla">
                                        <div id="te">
                                            <td>
                                                <p style="padding: 0px 0px; overflow: auto; ">
                                                <div></div> <span>Descripción:</span>
                                                <?php echo $producto["DESCRIPCION_PRODUCTO"];?> </p>
                                            </td>
                                            <td>
                                                <p style="padding: 5px 5px; ">
                                                <div></div><span>Precio Venta:</span>
                                                <?php echo $producto["PRECIOV_PRODUCTO"];?></p>
                                            </td>
                                            <td>
                                                <p style="padding: 5px 5px; ">
                                                <div></div><span>Precio Compra:</span>
                                                <?php echo $producto["PRECIOC_PRODUCTO"];?> </p>
                                            </td>
                                            <td>
                                                <p style="padding: 5px 5px; ">
                                                <div></div><span>Fecha Vencimiento:</span>
                                                <?php echo $producto["VENCIMIENTO_PRODUCTO"];?></p>
                                            </td>
                                            <td>
                                                <p style="padding: 5px 5px; ">
                                                <div></div><span>Categoría:</span>
                                                <?php echo $producto["NOMBRE_CATEGORIA"];?> </p>
                                            </td>
                                            <td>
                                                <p style="padding: 5px 5px; ">
                                                <div></div><span>Stock:</span><?php echo $producto["STOCK_PRODUCTO"];?>
                                                </p>
                                            </td>
                                        </div>
                                    </tbody>


                                </div>
                            </div>
                        </div>
                    </div>




            </section>
            <div class="container-modal">
                <div class="modal" id="jha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <h6>¿Está seguro que desea</h6>
                    <h6>eliminar el producto?</h6>
                    <div class="botones">
                        <button class="elimin"
                            onclick="location.href ='eliminar_producto.php?id_producto=<?php echo $producto['ID_PRODUCTO'];?>&direccion=<?php echo $direccion;?>'">Eliminar</button>
                        <button class="cancelar"
                            onclick='document.getElementsByClassName("container-modal")[0].style.display = "none"'>Cancelar</button>
                    </div>
                </div>
            </div>
            <!-- FIN DEL CONTENIDO -->
        </section>
    </div>
    <section name="footer">
        <?php include_once 'footer.php'; ?>
    </section>

    </div>


    <script>
    function mostrarModal() {
        document.getElementsByClassName("container-modal")[0].style.display = "flex"


    }
    </script>

    <script>
    var mi22 = document.getElementById("mi22");
    var img = mi22.getElementsByTagName("img")[0];

    img.onclick = function() {
        var modal = document.createElement("div");
        modal.style.backgroundColor = "rgba(0,0,0,0.7)";
        modal.style.position = "fixed";
        modal.style.top = "0";
        modal.style.left = "0";
        modal.style.width = "100%";
        modal.style.height = "100%";
        modal.style.zIndex = "9998";
        modal.onclick = function() {
            document.body.removeChild(modal);
        }

        var imgZoom = document.createElement("img");
        imgZoom.src = this.src;
        imgZoom.classList.add("imagen-grande");
        imgZoom.onclick = function() {
            document.body.removeChild(modal);
        }

        modal.appendChild(imgZoom);
        document.body.appendChild(modal);
    }
    </script>

</body>

</html>