<?php
include_once dirname(__DIR__) . '/conection.php';
session_start();
$id_tienda = $_SESSION["usuario"]["id_tienda"];

// Ejecutar una consulta SELECT
$sql = "SELECT NOMBRE_PRODUCTO FROM PRODUCTO P JOIN TIENDA T ON P.ID_TIENDA = T.ID_TIENDA WHERE T.ID_TIENDA = $id_tienda";
$resultado = mysqli_query($conn, $sql);


// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Recorrer los resultados y guardarlos en un array asociativo
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $productos[] = $fila["NOMBRE_PRODUCTO"];
    }
    // Convertir el array en un objeto JSON y escapar las comillas
    $productos_minuscula = array_map('strtolower', $productos);
    $productos_json = json_encode($productos_minuscula, JSON_HEX_QUOT);
}
?>
<script>
var productos = <?php echo $productos_json ?? 'null'; ?>;
</script>


