<?php
include_once dirname(__DIR__) . '../../administracion/conection.php';
    //datos admin
    $firstname = $_POST['nombre'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telephone = $_POST['telefono'];

    //insercion de administrador
    $passcifrado = sha1($password);
    
    $sql_admin = "INSERT INTO `ADMINISTRADOR`(`NOMBRE_ADMIN`, `CONTRASENIA`, `CORREO_ADMIN`, `TELEFONO`) VALUES ('$firstname','$passcifrado','$email', '$telephone')";
    $query_admin = mysqli_query($conn, $sql_admin);
    
    // se saca el valor de id de admin para insertar en tienda (voz de loquendo)
    $id_admin = mysqli_insert_id($conn);
    
    // datos tienda
    $nombretienda = $_POST["nombretienda"] ;
    $direccion = $_POST["direccion"] ;
    $referencia = $_POST["referencia"] ;
    $telefono = $_POST["telefonoCelular"] ;

    // insertamos en tienda 
    $sql = "INSERT INTO `TIENDA`(`ID_ADMIN`, `NOMBRE_TIENDA`, `DIRECCION_TIENDA`, `REFERENCIA_TIENDA`, `TELEFONO_TIENDA`) VALUES ('$id_admin' ,'$nombretienda','$direccion','$referencia', '$telefono')";

    $query = mysqli_query($conn, $sql);

    if($query){
        $carpeta = '../../administracion/uploads/user_'.$id_admin;
        // Verificar si la carpeta no existe
        if (!file_exists($carpeta)) {
            // Crear carpeta
            mkdir($carpeta, 0777, true);
        } else {
        }
        header('Location: ../login');
        
    }else{   
        //echo "incorrecto";
    }
