<?php include_once 'back/datos_un_producto.php'; ?>
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
                <?php include_once 'header.php'; myheader("Modificar Producto");?>
                <?php include_once 'barra_herramientas.php';?>
                <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
                <!-- INICIO DEL CONTENIDO -->
                <section name="contenido-pagina">
                    <form method = "POST" action="back/datos_actualizar_producto.php" enctype = "multipart/form-data" id="formulario">
                        <div class="contenedor_general">
                        <!-- contenedor izquierdo-->
                            <div class="cont_iz" id="cont_iz">
                                <p>Nombre del producto</p>
                                    <input type="text" name="Nombre_prod" class="input Nombre_prod" onclick="restrictions_mod()" onkeyup="lettersOnly(this)" id="Nombre_prod" value="<?php echo $valor ['NOMBRE_PRODUCTO'];?>" minlength=2 maxlength=25 required/>
                                        <p class="ocultar" id="nombre_alerta"> *Espacio obligatorio </p>
                                <p>Precio venta</p>
                                    <input type="number" name="Precio_v" class="input Precio_v" id="Precio_v" value= "<?php echo $valor ['PRECIOV_PRODUCTO'];?>" min=0.5 max=999.9 step=0.1 required/>
                                        <p class="ocultar" id="venta_alerta"> *Espacio obligatorio </p>
                                <p>Precio compra</p>
                                    <input type="number" name="Precio_c" class="input Precio_c" id="Precio_c" value= "<?php echo $valor ['PRECIOC_PRODUCTO'];?>" min=0.5 max=999.9 step=0.1 required/>
                                        <p class="ocultar" id="compra_alerta"> *Espacio obligatorio </p>
                                <p>Fecha vencimiento</p>
                                    <input type="date" name="Nac" class="input Nac" id="Nac" value= "<?php echo $valor ['VENCIMIENTO_PRODUCTO'];?>" required/>
                                        <p class="ocultar" id="vencimiento_alerta"> *Espacio obligatorio </p>
                                <p>Categoria</p>
                                    <select name="Categoria" class="Categoria" id="Categoria">
                                    <option value="<?php echo $assoc_cat['ID_CATEGORIA'];?>" diabled><?php echo $assoc_cat['NOMBRE_CATEGORIA']?></option>
                                    <?php while($gcat = mysqli_fetch_array($cat)){?>
                                        <option value="<?php echo $gcat['ID_CATEGORIA'];?>"><?php echo $gcat['NOMBRE_CATEGORIA'];?></option>
                                    <?php } ?>
                                    </select>
                                <p>Cantidad</p>
                                    <input type="number" name="Cant" class="input Cant" id="Cant" value= "<?php echo $valor ['STOCK_PRODUCTO'];?>" min=1 max=200 required/>
                                        <p class="ocultar" id="cantidad_alerta"> *Espacio obligatorio </p>
                            </div>
                            <!-- contenedor derecho-->
                            <div class="cont_der" id="cont_der">
                                <p>Descripcion</p>
                                <textarea name="Descripcion" class="Descripcion" cols="120" rows="6" id="Descripcion" minlength=10 maxlength=500 ><?php echo $valor ['DESCRIPCION_PRODUCTO'];?></textarea>
                                <p>Imagen del producto</p>
                                <!-- eso es para la imagenla imagenque esta esta por defecto se tiene que  cambiar  segun a la bdd-->
                                <div class="cambiarimagen" id="cambiarimagen">
                                <img class="Modific_imagen" id="Modific_image" name="Modific_image" src= "<?php echo $valor ['IMAGEN_PRODUCTO'];?>">
                                <p class="ocultar" id="imagen_alerta"> *Espacio obligatorio </p>
                                <input type="hidden" value="<?php echo $valor['IMAGEN_PRODUCTO']?>" name="imagen_src">
                                <div class="botonimagen">
                                    <p>Cambiar Imagen</p>
                                    <input  class="input foto" id="fot" name="fot" type="file" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>      
                            <?php //}?>
                            <div class="optiones_button">
                                <div>
                                    <a class="Cancelar" id="cancelar" onclick="location.href='mostrar_productos'">Cancelar</a>
                                </div>
                                <div>
                                    <button type="submit" class="Guardar" id="Guardar">Guardar</button>
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