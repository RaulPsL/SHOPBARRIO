<?php
    include_once 'conection.php';
    global $sql;
    $cat = $_POST['Categoria'];
    $list = array($_POST['Nombre_prod'],$_POST['Precio_v'],$_POST['Precio_c'],$_POST['Venc'],$_POST['Cant'],$_POST['Select_image'],$_POST['Descripcion']);
    $label_data = array('ID_CATEGORIA','NOMBRE_PRODUCTO','PRECIOV_PRODUCTO','PRECIOC_PRODUCTO','VENCIMIENTO_PRODUCTO','STOCK_PRODUCTO','IMAGEN_PRODUCTO','DESCRIPCION_PRODUCTO');
    
    $sql = "SELECT * FROM PRODUCTO WHERE ID_PRODUCTO=5";
    $answer = $conn->query($sql) or die("Location: Error_consulta1.php");
    $sqlcat = "SELECT ID_CATEGORIA FROM CATEGORIA WHERE NOMBRE_CATEGORIA=$cat";
    $answercat = $conn->query($sqlcat);
    
    $num_rows = $answer->num_rows;
    $id = $num_rows['ID_PRODUCTO'];
    $nun_cat = $answercat->num_rows;
    $idcat = $num_cat['ID_CATEGORIA'];
    
    if($num_rows != 0){
        $sql = "UPDATE PRODUCTO SET ";
        for($i = 0; $i < $num_rows; $i++){
            if($i==0){
                $sql.="$label_data[$i]=$idcat, ";
            }else{
                $j= $i-1;
                $sql .= "$label_data[$i]=$list[$j], ";
            }
            if($i==($num_rows-1)){
                $sql .= "$label_data[$i]=$list[$j] ";
            }
        }
        $sql .= "WHERE ID_PRODUCTO=$id";
    }
    if($conn->query($sql)){
        header("Location: vender.php");
    }
?>
<!DOCTYPE html>
<html>

    <head>
        <?php include_once 'head.php'; ?>
        <link rel="stylesheet" href="css/style_modificar_productos.css">
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
                <div class="div-mod-reg">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="div-left">
                             <label for="Nombre_prod">Nombre del producto</label>
                             <input type="text" id="Nombre_prod" name="Nombre_prod" class="form-control" minlength=2 maxlength=25 require/>
                             <label for="Precio_v">Precio venta</label>
                             <input type="number" id="Precio_v" name="Precio_v" class="form-control" require/>
                             <label for="Precio_c">Precio compra</label>
                             <input type="number" di="Precio_c" name="Precio_c" class="form-control" require/>
                             <label for="Venc">Fecha vencimiento</label>
                             <input type="date" id="Venc" name="Venc" class="form-control" require/>
                             <label for="Categoria">Categoria</label>
                             <select id="Categoria" name="Categoria" class="form-control" required/>
            					<option>Embotellados</option>
            					<option>Abarrotes</option>
            					<option>Golosinas</option>
            					<option>Cigarros</option>
            					<option>Licoreria</option>
            				 </select>
                             <label for="Cant">Cantidad</label>
                             <input type="number" id="Cant" name="Cant" class="form-control" require/>
        
                        </div>
                        <div class="div-right">
                            <div>
                                <label for="Descripcion">Descripcion</label>
                                <textarea id="Descripcion" name="Descripcion" class="description" cols="120" rows="6" minlength=20 maxlength=1450></textarea>
                            </div>
                            <div>
                                <label for="Select_image">Imagen del producto</label>
                                <img src="src/pan.jpg"  class="image">
                                    Cambiar Imagen
                                <input type="file" id="Select_image" name="Select_image" class="select-image" require/>
                                <button class="cancel">Cancelar cambios</button>
                                <button class="storing" type="submit">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <section>
                <!-- FIN DEL CONTENIDO -->
        </section> 
        <section name="footer">
            <?php include_once 'footer.php'; ?>
        </section>
    </body>
</html>