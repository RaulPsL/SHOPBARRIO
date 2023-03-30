
<!DOCTYPE html>
<html>

<head>
        <?php include_once 'head.php'; ?>
        <link rel="stylesheet" href="css/style_modificar_productos.css"  type="text/css">
    </head>
    <body>
        <div class="izquierda-derecha">
            <section class="lado-izquierdo" name="lado-izquierdo">
                <?php include_once 'menu_izq.php'; ?>
            </section>
            <section class="lado-derecho" name="lado-derecho">
                <?php include_once 'header.php'; myheader("Modificar Productos");?>
                <?php include_once 'barra_herramientas.php';?>
                <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
                <!-- INICIO DEL CONTENIDO -->
                <div class="contenedor_general">
                    <div class="cont_iz">
                     <p>Nombre del producto</p>
                     <input type="text" name="Nombre_prod" class="Nombre_prod">
                     <p>Precio venta</p>
                     <input type="number" name="Precio_v" class="Precio_v">
                     <p>Precio compra</p>
                     <input type="number" name="Precio_c" class="Precio_c">
                     <p>Fecha nac</p>
                     <input type="date" name="Nac" class="Nac">
                     <p>Categoria</p>
                     <input type="" name="Categoria" class="Categoria">
                     <p>Cantidad</p>
                     <input type="number" name="Cant" class="Cant">

                    </div>
                    <div class="cont_der">
                     <p>Descripcion</p>
                     <textarea name="Descripcion" class="Descripcion" cols="120" rows="6"></textarea>
                     <p>Imagen del producto</p>
                     
                    <div class="cambiarimagen">
                     <img src="src/pan.jpg"  class="Modific_imagen">
                     <div class="botonimagen">
                        Cambiar Imagen
                     <input type="file" class="foto">
                    </div>
                     
                </div>      
    
                    <div class="optiones_button">
                        <div>
                        <button class="Cancelar">Cancelar</button>
                        </div>
                        <div>
                            <button class="Guardar">Guardar</button>
                        </div>
                    </div>

             </div>
</div>
                <section name="contenido-pagina">
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