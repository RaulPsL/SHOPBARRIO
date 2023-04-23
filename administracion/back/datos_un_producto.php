<?php
session_start();
include_once dirname(__DIR__) . '/conection.php';
 $idProducto = $_GET["id_producto"]; /////// aqui cambian eilen y jhul
 $_SESSION['idProducto'] = $idProducto;
 // Ejecutar la consulta SQL para obtener los datos
 $sql="SELECT * FROM PRODUCTO WHERE ID_PRODUCTO =  $idProducto";
 $resultado = mysqli_query($conn,$sql);
 $cat = mysqli_query($conn,"SELECT * FROM CATEGORIA");
 //$gcat2 = mysqli_fetch_array($cat);
 $valor = mysqli_fetch_array($resultado);
 $valor2 = $resultado->fetch_assoc();
 $id_cat = $valor['ID_CATEGORIA'];
 $sqlcat = "SELECT * FROM CATEGORIA WHERE ID_CATEGORIA = $id_cat";
 $rescat = $conn->query($sqlcat);
 $assoc_cat = $rescat->fetch_assoc();
 ?>
