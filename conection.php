<?php
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
echo "Connected successfully";
?>
