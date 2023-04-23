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
                <?php include_once 'header.php'; myheader("Registrar producto");?>
                <?php include_once 'barra_herramientas.php';?>
                <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
                <!-- INICIO DEL CONTENIDO -->
                <section name="contenido-pagina">
                      <main class="principal">
                        <section class="contenido">
                            <section class="seccion">
                                <form action="back/datos_registrar.php"  id="formulario" method="post" enctype="multipart/form-data" onsubmit="return validate()">
                                    <div class="main-contenido">
                                        <div class="container">
                                            <div class="inputButton nombreproducto">
                                                <label for="nombreproducto">Nombre de producto</label>
                                                <input type="text" name="nombre" id="nombreproducto" placeholder="Nombre de producto" maxlength="20">                   
                                                <div class="error"></div>
                                            </div>
                                            <div class="inputButton venta">
                                                <label for="">Precio Venta</label>
                                                <input type="number" name="venta" id="venta" placeholder="Precio"  step="0.01"  maxlength="7" >                   
                                                <div class="error"></div>
                                            </div>
                                            <div class="inputButton compra">
                                                <label for="">Precio Compra</label>
                                                <input type="number" name="compra" id="compra" placeholder="Costo">
                                                <div class="error"></div>                   
                                            </div>
                                            <div class="inputButton">
                                                <label for="">Fecha Vencimiento</label>
                                                <input type="date" name="fecha" id="fecha">
                                                <div class="error"></div> 
                                            </div>
                                            <div class="inputButton categoria">
                                                <label for="">Categoría del Producto</label>
                                                <select name="categoria" id="categoria">
                                                <option value=""></option>
                                                <option value="1">Embotellados</option>
                                                <option value="2">Abarrotes</option>
                                                <option value="3">Golosinas</option>
                                                <option value="4">Cigarros</option>
                                                <option value="5">Productos de aseo</option>
                                                <option value="6">Licorería</option>
                                                <option value="7">Enlatados</option>
                                                <option value="8">Embutidos</option>
                                                <option value="9">Verduras</option>
                                                <option value="10">Carnes</option>
                                                <option value="11">Plásticos</option>
                                                <option value="12">Helados</option>
                                                <option value="13">Panadería</option>
                                                <option value="14">Aderezos</option>
                                                </select>
                                                <div class="error"></div>
                                            </div>
                                            <div class="inputButton cantidad">
                                                <label for="">Cantidad</label>
                                                <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad">
                                                <div class="error"></div>
                                            </div>   
                                        </div>                                
                                        <div class="container">
                                            <div class="inputButton">
                                                <label for="">Descripción</label>
                                                <textarea class="descripcion" name="descripcion" id="descripcion" cols="120" rows="6" maxlength="250"></textarea placeholder="Descripcion"> 
                                                <div class="error"></div>
                                            </div>
                                            <div class="inputButton">
                                                <label for="">Imagen del Producto</label>
                                                <img src="src/sinimagen.jpg" alt="" class="img" id="img">
                                                <div class="error"></div>                                          
                                            </div>
                                            <div class="botones">
                                                <div class="boton">                                                    
                                                    Subir imagen<input class="subir" id="subir" name="subir"  type="file">                             
                                                </div>
                                                <div class="botonCR">
                                                <button class="Botones">Cancelar</button>
                                                <button class="Botones" type="submit" id="btnRegistrar">Registrar</button>  
                                                </div>                             
                                            </div>                        
                                        </div>
                                    </div>                                       
                                </form>                  
                            </section>
                        </section>
    </main>  
                </section>
                <!-- FIN DEL CONTENIDO -->
            </section>
        </div>            
        <section name="footer">
            <?php include_once 'footer.php'; ?>
        </section>
    </body>
</html>