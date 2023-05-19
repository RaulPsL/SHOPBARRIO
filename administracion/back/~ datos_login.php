<?php
include_once dirname(__DIR__) . '/conection.php';

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

// Ejecutar una consulta SELECT
$sql = "SELECT * FROM ADMINISTRADOR WHERE NOMBRE_ADMIN = '$username' AND CONTRASENIA = '$password'";
$resultado = mysqli_query($conn, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $id_admin = $row["ID_ADMIN"];

    // Iniciar sesión y guardar información del usuario
    session_start();
    $_SESSION["usuario"] = array(
        "nombre_admin" => $username,
        "id_admin" => $id_admin
    );
    $mensaje = array('mensaje' => '');
    echo json_encode($mensaje);
} else {
    // El usuario y/o la contraseña son incorrectos
    $mensaje = array('mensaje' => 'El usuario y/o la contraseña son incorrectos');
    echo json_encode($mensaje);
}
?>