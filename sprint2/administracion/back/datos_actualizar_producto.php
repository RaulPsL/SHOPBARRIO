<?php
session_start();
include_once dirname(__DIR__) . '/conection.php';

$idProducto=$_SESSION['idProducto'];
$newprod = $_POST['Nombre_prod'];
$newprev = $_POST['Precio_v'];
$newprec = $_POST['Precio_c'];
$newnac = $_POST['Nac'];
$newcat = $_POST['Categoria'];
$newcant = $_POST['Cant'];
$newdesc = $_POST['Descripcion'];
$imagen_src = $_POST['imagen_src'];
//$imagen2 = addslashes(file_get_contents($_FILES['fot']['tmp_name']));
    $imagen = $_FILES['fot']['name'];
    $tipo =  $_FILES['fot']['type'];
    $temp =  $_FILES['fot']['tmp_name'];
//ruta

  $carpeta='uploads/user_1';
  $ruta = $carpeta."/".$imagen;
  $carpeta1='../uploads/user_1';
  
  move_uploaded_file($temp,$carpeta1.'/'.$imagen);
GLOBAL $x;
if (!empty($_FILES['fot']['name'])) {
    $x = mysqli_query($conn,"UPDATE PRODUCTO SET NOMBRE_PRODUCTO = '$newprod', PRECIOV_PRODUCTO = $newprev, PRECIOC_PRODUCTO = $newprec, VENCIMIENTO_PRODUCTO = '$newnac', STOCK_PRODUCTO = $newcant, DESCRIPCION_PRODUCTO = '$newdesc', ID_CATEGORIA = $newcat, IMAGEN_PRODUCTO = '$ruta' WHERE ID_PRODUCTO = $idProducto");
}else{
    $x = mysqli_query($conn,"UPDATE PRODUCTO SET NOMBRE_PRODUCTO = '$newprod', PRECIOV_PRODUCTO = $newprev, PRECIOC_PRODUCTO = $newprec, VENCIMIENTO_PRODUCTO = '$newnac', STOCK_PRODUCTO = $newcant, DESCRIPCION_PRODUCTO = '$newdesc', ID_CATEGORIA = $newcat, IMAGEN_PRODUCTO = '$imagen_src' WHERE ID_PRODUCTO = $idProducto");
}
  
if ($x) {
    ?>
    <script>window.location.href = "mostrar_productos";</script>
    <?php
}   