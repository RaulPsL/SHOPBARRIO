<?php  
session_start();
include_once dirname(__DIR__) . '/conection.php';
$firstname = $_POST['nombre'];
$password = $_POST['password'];
$email = $_POST['email'];
$telephone = $_POST['telefono'];

$passcifrado1 = sha1($password);

$answer = mysqli_query($conn, "SELECT NOMBRE_ADMIN FROM ADMINISTRADOR WHERE NOMBRE_ADMIN = '$firstname'");
$nombreveri = $answer->num_rows;

if($nombreveri == 0){
    $answer = mysqli_query($conn,"INSERT INTO ADMINISTRADOR (NOMBRE_ADMIN, CONTRASENIA, CORREO_ADMIN, TELEFONO) VALUES('$firstname', '$passcifrado1', '$email', $telephone)");
    header("Location: registrar_tienda.php");
}else{
    header("Location: registrar_administrador.php");
}
?>