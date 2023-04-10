<?php
include_once dirname(__DIR__) . '/conection.php';

// Declarar la variable global $usuario fuera del bucle while
global $usuario;

// Ejecutar una consulta SELECT
$sql = "SELECT NOMBRE_ADMIN, APELLIDO_ADMIN FROM ADMINISTRADOR WHERE ID_ADMIN  = 1";
$resultado = mysqli_query($conn, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Recorrer los resultados y mostrarlos
    $usuario = array(); // Inicializar el arreglo
    while($fila = mysqli_fetch_assoc($resultado)) {
        echo "<script>console.log('Nombre: " . $fila['NOMBRE_ADMIN'] . "')</script>";
        echo "<script>console.log('Apellido: " . $fila['APELLIDO_ADMIN'] . "')</script>";
        $usuario[] = $fila['NOMBRE_ADMIN'];
        $usuario[] = $fila['APELLIDO_ADMIN'];
    }
} else {
    echo "<script>console.log('No se encontraron resultados')</script>";
}