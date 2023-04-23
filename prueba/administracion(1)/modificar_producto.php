<?php include_once 'back/datos_un_producto.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'head.php'; ?>
        <script src="script_modificar_producto(1).js"></script>
    </head>
    <body>
        <div class="izquierda-derecha">
            <section class="lado-izquierdo" name="lado-izquierdo">
                <?php include_once 'menu_izq.php'; ?>
            </section>
            <section class="lado-derecho" name="lado-derecho">
                <?php include_once 'header.php'; myheader("Modificar Producto");?>
                <?php include_once 'barra_herramientas.php';?>
                <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
                <!-- INICIO DEL CONTENIDO -->
                <section name="contenido-pagina">
                    <form method = "POST" action="back/datos_actualizar_producto.php" enctype = "multipart/form-data" id="formulario">
                        <div class="contenedor_general">
                        <!-- contenedor izquierdo-->
                            <div class="cont_iz" id="cont_iz">
                                <div>
                                    <label for="Nombre_prod">Nombre del producto</label>
                                    <div>
                                        <input type="text" name="Nombre_prod" class="input Nombre_prod" id="Nombre_prod" value="<?php echo $valor ['NOMBRE_PRODUCTO'];?>">
                                    </div>
                                    <p class="ocultar" name="nombre_alerta" id="nombre_alerta"></p>
                                    <br>
                                </div>
                                <div>
                                    <label for="Precio_v">Precio venta</label>
                                    <div>
                                        <input type="number" name="Precio_v" class="input Precio_v" id="Precio_v" value= "<?php echo $valor ['PRECIOV_PRODUCTO'];?>">
                                    </div>
                                    <p class="ocultar" name="venta_alerta" id="venta_alerta"></p>
                                    <br>
                                </div>        
                                <div>
                                    <label for="Precio_c">Precio compra</label>
                                    <div>
                                        <input type="number" name="Precio_c" class="input Precio_c" id="Precio_c" value= "<?php echo $valor ['PRECIOC_PRODUCTO'];?>">
                                    </div>
                                    <p class="ocultar" name="compra_alerta" id="compra_alerta"></p>
                                    <br>
                                </div>
                                <div>
                                    <label for="Nac">Fecha vencimiento</label>
                                    <div>
                                        <input type="date" name="Nac" class="input Nac" id="Nac" value= "<?php echo $valor ['VENCIMIENTO_PRODUCTO'];?>">
                                    </div>
                                    <p class="ocultar" name="vencimiento_alerta" id="vencimiento_alerta"></p>
                                    <br>
                                </div>
                                <div>
                                    <label for="Categoria">Categoría</label>
                                    <select name="Categoria" class="Categoria" id="Categoria">
                                    <option value="<?php echo $assoc_cat['ID_CATEGORIA'];?>" diabled><?php echo $assoc_cat['NOMBRE_CATEGORIA']?></option>
                                    <?php while($gcat = mysqli_fetch_array($cat)){?>
                                        <option value="<?php echo $gcat['ID_CATEGORIA'];?>"><?php echo $gcat['NOMBRE_CATEGORIA'];?></option>
                                    <?php } ?>
                                    </select>
                                    <br>
                                </dilabel>
                                <div>
                                    <label for="Cant">Cantidad</label>
                                    <div>
                                        <input type="number" name="Cant" class="input Cant" id="Cant" value= "<?php echo $valor ['STOCK_PRODUCTO'];?>">
                                    </div>
                                    <p class="ocultar" name="cantidad_alerta" id="cantidad_alerta"></p>
                                </div>
                            </div>
                            <!-- contenedor derecho-->
                            <div class="cont_der" id="cont_der">
                                <div>
                                    <label for="Descripcion">Descripción</label>
                                    <textarea name="Descripcion" class="Descripcion" cols="120" rows="6" id="Descripcion"><?php echo $valor ['DESCRIPCION_PRODUCTO'];?></textarea>
                                    <p class="ocultar" name="descripcion_alerta" id="descripcion_alerta"></p>
                                    <br>
                                    <br>
                                </div>
                                <div class="cambiarimagen" id="cambiarimagen">
                                    <label for="Modific_image">Imagen del producto</label>
                                    <!-- eso es para la imagenla imagenque esta esta por defecto se tiene que  cambiar  segun a la bdd-->
                                    <img class="Modific_imagen" id="Modific_image" name="Modific_image" src= "<?php echo $valor ['IMAGEN_PRODUCTO'];?>">
                                    <p class="ocultar" name="imagen_alerta" id="imagen_alerta"></p>
                                    <input type="hidden" value="<?php echo $valor['IMAGEN_PRODUCTO']?>" name="imagen_src">
                                    <div>
                                        <input  class="input foto " id="fot" name="fot" type="file" accept=".jpg, .png, .jpeg" >
                                        <label for="foto" class="butimg"><p>Cambiar imagen</p></label>
                                    </div>                
                                </div> 
                            <div class="optiones_button">
                                <div>
                                    <a class="Cancelar" id="cancelar" onclick="location.href='/administracion(1)/mostrar_productos'">Cancelar</a>
                                </div>
                                <div>
                                    <button type="submit" class="Guardar" id="Guardar" >Guardar</button>
                                </div>
                            </div>

                        </div>
                    </form>
       
                </section>
                <!-- FIN DEL CONTENIDO -->
            </section>
        </div>            
        <section name="footer">
            <?php include_once 'footer.php'; ?>
        </section>
    </body>
</html>