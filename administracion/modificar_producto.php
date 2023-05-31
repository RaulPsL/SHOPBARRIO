<?php 
include_once 'credenciales.php';
include_once 'back/datos_un_producto.php'; 
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
                <?php include_once 'header.php'; myheader("Modificar Producto");?>
                <?php include_once 'barra_herramientas.php';?>
                <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
                <!-- INICIO DEL CONTENIDO -->
                <section name="contenido-pagina">
                    <form method = "POST" action="back/datos_actualizar_producto.php" enctype = "multipart/form-data" id="formulario" >
                        <div class="contenedor_general">
                            <!-- contenedor izquierdo-->
                            <div class="cont_iz" id="cont_iz">
                                <div class="divinput nombre_prod">
                                    <label for="Nombre_prod">Nombre del producto</label>
                                    <input type="text" name="Nombre_prod" id="Nombre_prod" class="Nombre_prod" value="<?php echo $valor ['NOMBRE_PRODUCTO'];?>">
                                    <div id="alerta" name="alerta" class="alerta"></div>
                                </div>
                                <div class="divinput precio_v">
                                    <label for="Precio_v">Precio venta</label>
                                    <input type="number" name="Precio_v" id="Precio_v" class="Precio_v" value= "<?php echo $valor ['PRECIOV_PRODUCTO'];?>" step="any">
                                    <div id="alerta" name="alerta" class="alerta"></div>
                                </div>
                                <div class="divinput precio_c">
                                    <label for="Precio_c">Precio compra</label>
                                    <input type="number" name="Precio_c" id="Precio_c" class="Precio_c" value= "<?php echo $valor ['PRECIOC_PRODUCTO'];?>" step="any">
                                    <div id="alerta" name="alerta" class="alerta"></div>
                                </div>
                                <div class="divinput fecha_ven">
                                    <label for="Nac">Fecha vencimiento</label>
                                    <input type="date" name="Nac" id="Nac" class="Nac" value= "<?php echo $valor ['VENCIMIENTO_PRODUCTO'];?>" min=<?php echo date('Y-m-d');?>>
                                    <div id="alerta" name="alerta" class="alerta"></div>
                                </div>
                                <div class="divinput categoria">
                                    <label for="Categoria">Categoría</label>
                                        <select name="Categoria" class="Categoria" id="Categoria">
                                        <option value="<?php echo $assoc_cat['ID_CATEGORIA'];?>" diabled><?php echo $assoc_cat['NOMBRE_CATEGORIA']?></option>
                                        <?php while($gcat = mysqli_fetch_array($cat)){?>
                                            <option value="<?php echo $gcat['ID_CATEGORIA'];?>"><?php echo $gcat['NOMBRE_CATEGORIA'];?></option>
                                        <?php } ?>
                                        </select>
                                </div>
                                <div class="divinput cantidad">
                                    <label for="Cant">Cantidad</label>
                                    <input type="number" name="Cant" id="Cant" class="Cant" value= "<?php echo $valor ['STOCK_PRODUCTO'];?>">
                                    <div id="alerta" name="alerta" class="alerta"></div>
                                </div>
                            </div>
                            <!-- contenedor derecho-->
                            <div class="cont_der" id="cont_der">
                                <div class="divinput descripcion">
                                    <label for="Descripcion">Descripción</label>
                                    <textarea name="Descripcion" class="Descripcion" cols="120" rows="6" id="Descripcion" minlength=10 maxlength=500 ><?php echo $valor ['DESCRIPCION_PRODUCTO'];?></textarea>
                                </div>
                                <label>Imagen del producto</label>
                                <!-- eso es para la imagenla imagenque esta esta por defecto se tiene que  cambiar  segun a la bdd-->
                                <div class="cambiarimagen" id="cambiarimagen">
                                    <img id="Modific_image" name="Modific_image" class="Modific_imagen" src= "<?php echo $valor ['IMAGEN_PRODUCTO'];?>">
                                    <div id="alerta" name="alerta" class="alerta"></div>
                                    <input type="hidden" value="<?php echo $valor['IMAGEN_PRODUCTO']?>" name="imagen_src" id="imagen_src">
                                    
                                    
                                    <input  class="input foto " id="fot" name="fot" type="file" accept=".jpg, .png, .jpeg" >
                                    <label for="fot" class="butimg"><p>Cambiar imagen</p></label>
                                 
                                   
                                </div>      
                            <?php //}?>
                                <div class="optiones_button">
                                    <div>
                                        <a class="Cancelar" id="cancelar" onclick="location.href='mostrar_productos'">Cancelar</a>
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