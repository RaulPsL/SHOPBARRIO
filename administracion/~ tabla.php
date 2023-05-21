<?php
function generarTabla($datos){
?>
    <div class="tabla <?php echo $datos["clase"]; ?>">
        <table>
            <thead>
                <tr>
                    <?php
                    foreach ($datos["thead"] as $titulo) { 
                        ?>
                        <th><?php echo $titulo; ?></th>
                        <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                $contador=0;
                foreach ($datos["tbody"] as $deudor) { 
                    $contador++;
                ?>  
                    <tr>
                    <?php 
                        foreach ($datos["columnas"] as $columna) { 
                            if($columna=="numberRow"){
                                ?>
                                    <td><?php echo $contador; ?></td>
                                <?php
                            }else{
                                ?>
                                    <td><?php echo $deudor[$columna]; ?></td>
                                <?php
                            }
                        } ?>
                    </tr>                
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php
}
?>