<?php include_once 'credenciales.php'; ?>
<?php include_once 'back/datos_mostrar_datos_modificar_proveedores.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'head.php'; ?>
    </head>
    <body>
        <div class="izquierda-derecha">
            <section class="lado-izquierdo" name="lado-izquierdo">
                <?php include_once 'menu_izq.php'; ?>
            </section>
            <section class="lado-derecho" name="lado-derecho">
                <?php include_once 'header.php'; myheader("Modificar proveedor");?>
                <?php include_once 'barra_herramientas.php';?>
                <!-- AQUI SE DEBE COLOCAR EL CONTENIDO DE LA PAGINA -->
                <!-- INICIO DEL CONTENIDO -->
                <section name="contenido-pagina">
                  <div class="pantalla-dividida">
                    <div class="izq">
                      <form method="POST" action="back/datos_modificar_proveedor.php" id="formulario"  novalidate>
                      <input type="hidden" name="id" value="<?php echo $valor['ID_PROVEEDOR']; ?>">
                        <div class="container-input">
                          <label for="nombreproveedor">Nombre del proveedor</label>
                          <input type="text" name="nombre_proveedor" id="nombreproveedor" maxlength="20" value="<?php echo $valor['NOMBRE_PROVEEDOR']; ?>">
                          <div class="error"></div>
                        </div>
                        <div class="container-input">
                          <label for="telefono">Teléfono del proveedor</label>
                          <input type="text" name="telefono" id="telefono" value="<?php echo $valor['CELULAR_PROVEEDOR']; ?>">
                          <div class="error"></div>
                        </div>
                        <div class="container-input">
                          <label for="email" class="correoelectronico">Email del proveedor</label>
                          <input type="email" id="email" name="email" value="<?php echo $valor['EMAIL_PROVEEDOR']; ?>">
                          <div class="error"></div>
                        </div>
                        <div class="container-input">
                          <label for="nombreempresa">Nombre de la empresa</label>
                          <input type="text" name="empresa" id="nombreempresa" maxlength="20" value="<?php echo $valor['EMPRESA_PROVEEDOR']; ?>">
                          <div class="error"></div>
                        </div>
                        <div class="container-input">
                          <label for="descripcion">Descripción</label>
                          <textarea class="descripcion" name="descripcion" id="descripcion" cols="50" rows="2" maxlength="60"  ><?php echo $valor['DESCRIPCION_PROVEEDOR']; ?> </textarea>
                           <div class="error"></div>
                        </div>
                        <div class="seccion-botones">
                          <a href="mostrar_proveedores">Cancelar Cambios</a>
                          <button class="registrarbutton" type="submit" name="enviar">Guardar Cambios</button>
                        </div>
                    </div>
                    <div class="der">
                    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_eop7ymay.json"  background="transparent"  speed="1"  style="width: 500px; height: ;"  loop  autoplay></lottie-player>
                    </div>
                  </div>
                </section>
                <!-- FIN DEL CONTENIDO -->
            </section>
        </div>            
        <section name="footer">
            <?php include_once 'footer.php'; ?>
        </section>
    </body>
</html>