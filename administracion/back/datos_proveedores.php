<?php
 
include_once dirname(__DIR__) . '/conection.php';

$sql = "SELECT  P.ID_PROVEEDOR, P.NOMBRE_PROVEEDOR, P.CELULAR_PROVEEDOR, P.EMAIL_PROVEEDOR, P.DESCRIPCION_PROVEEDOR
        FROM ADMINISTRADOR A JOIN TIENDA T ON A.ID_ADMIN = T.ID_ADMIN JOIN PROVEEDOR P ON P.ID_TIENDA = T.ID_TIENDA 
        WHERE A.ID_ADMIN = $id_admin  
        ";

$resultado = mysqli_query($conn, $sql);
$proveedores=NULL;

$row = mysqli_num_rows($resultado);

if (mysqli_num_rows($resultado) > 0) {
    $proveedores = array();
    $numero = 1;
    while($fila = mysqli_fetch_assoc($resultado)) {    
        $proveedores[$fila['ID_PROVEEDOR']] = array(
            'ID_PROVEEDOR' => $numero,
            'NOMBRE_PROVEEDOR' => $fila['NOMBRE_PROVEEDOR'],
            'CELULAR_PROVEEDOR' => $fila['CELULAR_PROVEEDOR'],
            'EMAIL_PROVEEDOR' => $fila['EMAIL_PROVEEDOR'],
            'DESCRIPCION_PROVEEDOR' => $fila['DESCRIPCION_PROVEEDOR'],
        );
        $numero++;
    }
} else {
    $proveedores=NULL;
}

