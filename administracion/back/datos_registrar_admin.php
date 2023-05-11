<?php
include_once dirname(__DIR__) . '../../administracion/conection.php';

$consulta = mysqli_query($conn,"SELECT NOMBRE_ADMIN FROM ADMINISTRADOR");

if($consulta->num_rows > 0){
    while($nombre = $consulta->fetch_assoc()){
        $usuarios[] = strtolower($nombre['NOMBRE_ADMIN']);
    }
}
$response = json_encode($usuarios, JSON_HEX_QUOT);
?>
<script>
    var variable_nombre = <?php echo $response;?>;
</script>
