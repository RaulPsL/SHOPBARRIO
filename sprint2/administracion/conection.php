<?php
/*
$servername = "127.0.0.1:3306";
$username = "u341591096_shopbarrio";
$password = "Contraseña1";
$db = "u341591096_shopbarrio"; 
*/
$servername = "127.0.0.1:3306";
$username = "u341591096_prueba";
$password = "Contraseña1";
$db = "u341591096_prueba"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  echo "fallo la coneccion";
}
echo "<script>console.log('Connected successfully')</script>";

// Obtener la dirección IP del visitante
//$ip_address = $_SERVER['REMOTE_ADDR'];
$ip_address = getIPAddress();

// Insertar los datos en la tabla de visitantes
$sql = "INSERT INTO visitantes (ip_address, fecha_hora) VALUES ('$ip_address', NOW())";

if (mysqli_query($conn, $sql)) {
} else {
  echo "Error al guardar los datos: " . mysqli_error($conn);
}


function getIPAddress() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP')) {
        $ipaddress = getenv('HTTP_CLIENT_IP');
    } else if(getenv('HTTP_X_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    } else if(getenv('HTTP_X_FORWARDED')) {
        $ipaddress = getenv('HTTP_X_FORWARDED');
    } else if(getenv('HTTP_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    } else if(getenv('HTTP_FORWARDED')) {
        $ipaddress = getenv('HTTP_FORWARDED');
    } else if(getenv('REMOTE_ADDR')) {
        $ipaddress = getenv('REMOTE_ADDR');
    } else {
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}
?>
