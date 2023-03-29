<?php
$servername = "185.211.7.52:3306";
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
?>