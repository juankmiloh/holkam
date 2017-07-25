<?php
      ob_start(); //Linea para permitir enviar flujo de datos por url al redireccionar la pagina
      header("access-control-allow-origin: *");
      // include ("conexion_BD.php");
      require_once("./dompdf/dompdf_config.inc.php");

      if(!session_id()){
          session_start();
      }

      require_once "classDB.php";
      $dbh = "";

      if(obtenerSesion("username", 3) == ""){
            header("Location: autenticacion_users/login.php?ini=se");
      }else{
            // echo (obtenerSesion("username",3)->cli_id);
      }
      

      /*========================================================================
      * Vamos a crear el PDF de la inspeccion para previamente enviarlo por correo
      *========================================================================*/
?>
<html lang="es">
      <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <meta name="viewport" content="widtd=device-widtd, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <style>
                  html{font-family:sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}
                  body{margin:0;}
                  table{border-spacing:0;border-collapse:collapse;font-size:11px;widtd: 100%;}td,td{padding:0}
                  .centrar_texto{text-align: center;}
                  .text-justify{text-align:justify}
                  .borde{border: 1px solid #000000; color: black;}
                  .border-left{border-left: 1px solid #000000; color: black;}
                  .border-right{border-right: 1px solid #000000; color: black;}
                  .border-top{border-top: 1px solid #000000; color: black;}
                  .border-bottom{border-bottom: 1px solid #000000; color: black;}
            </style>
      </head>

      <body>
            <div>
                  <img src="../images/header_cotizacion_1.png" style="width: 100%; height: auto;">
                  <br><br>
                  <div>
                        <table class="border-bottom" style="width: 100%;">
                              <tr style="text-align: center;">
                                    <td class="border-bottom" style="font-size: 20px; width: 30%;">Producto</td>
                                    <td class="border-bottom" style="font-size: 20px; width: 17.5%;">Envío</td>
                                    <td class="border-bottom" style="font-size: 20px; width: 17.5%;">Precio</td>
                                    <td class="border-bottom" style="font-size: 20px; width: 17.5%;">Cantidad</td>
                                    <td class="border-bottom" style="font-size: 20px; width: 17.5%;">Total</td>
                              </tr>
                              <?php
                                    if(obtenerSesion("username", 3) != ""){
                                          $sqlPedido = "SELECT p.*, l.*, lf.* 
                                          FROM 
                                          libro_fotografia lf,
                                          libro l,
                                          pedido_actual p 
                                          WHERE p.pedAct_codLib = l.k_codlibro 
                                          AND p.pedAct_codLib = lf.k_codlibro
                                          AND p.ped_usuario_id =".obtenerSesion("username",3)->cli_id;
                                          $queryPedido = prepararQuery($sqlPedido);
                                          $resultPedido = ejecutarQuery($queryPedido);
                                          if($resultPedido){
                                                while ($object = $queryPedido->fetchObject()) {
                                                      ?>
                                                      <tr>
                                                            <td align="left" style="font-size: 15px;">
                                                            <!-- <img src="../imagenes_libro/<?php echo $object->n_fotografia; ?>"> -->
                                                            <?php echo utf8_encode($object->n_titulo); ?>
                                                            </td>
                                                            <td align="center" style="font-size: 15px;">Por calcular</td>
                                                            <td align="center" style="font-size: 15px;"><label><?php echo $object->v_precio." $"; ?></label></td>
                                                            <td align="center" style="font-size: 15px;"><label><?php echo $object->pedAct_cantLib; ?></label></td>
                                                            <td align="center" style="font-size: 15px;"><label><?php echo $object->ped_total." $"; ?></label></td>
                                                      </tr>
                                                      <?php
                                                }
                                          }    
                                    }
                              ?> 
                              <!-- SE AGREGAN A LA TABLA LAS TARJETAS DE IMPRESIONES -->
                              <?php
                              $sqlPedido2 = "SELECT 
                                                ise.*, 
                                                pais.* 
                                          FROM 
                                                imprime_seccion ise, 
                                                pedido_actual_imprime_seccion pais 
                                          WHERE 
                                                pais.is_id = ise.is_id
                                          AND cli_id = ".obtenerSesion("username",3)->cli_id."
                                          AND pais.pais_activo = 1";
                              $queryPedido2 = prepararQuery($sqlPedido2);
                              $resultPedido2 = ejecutarQuery($queryPedido2);
                              if($resultPedido2){
                                    while($pedido2 = $queryPedido2->fetchObject()){
                                          ?>
                                          <tr>
                                                <td align="left" style="font-size: 15px;">
                                                      <!-- <img class="img-imprime" src="../images/<?php echo $pedido2->is_imagen ?>"></td> -->
                                                      <?php echo utf8_encode($pedido2->is_nombre); ?>
                                                <td align="center" style="font-size: 15px;">Por calcular</td>
                                                <td align="center" style="font-size: 15px;"><label>n/a</label></td>
                                                <td align="center" style="font-size: 15px;"><?php echo $pedido2->pais_cantidad ?></td>
                                                <td align="center" style="font-size: 15px;"><?php echo $pedido2->pais_valor_total ?> $</td>
                                          </tr>
                                          <?php
                                    }
                              }
                              ?>
                        </table>
                        <!-- TABLA DONDE SE MUESTRA EL TOTAL GENERAL DE LA COMPRA -->
                        <br>
                        <table style="width: 100%;" border="0">
                        <?php
                              if(obtenerSesion("username", 3) != ""){
                                    $sql1 = "SELECT SUM(pais_valor_total) AS suma1 FROM pedido_actual_imprime_seccion WHERE cli_id =".obtenerSesion("username",3)->cli_id." AND pais_activo = 1";
                                    $query1 = prepararQuery($sql1);
                                    $result1 = ejecutarQuery($query1);
                                    if($result1){
                                          $suma1 = $query1->fetchObject();
                                          ?>
                                          <input type="hidden" id="total2" value="<?php echo $suma1->suma1; ?>">
                                          <?php
                                    }
                              ?>
                              <tr>
                                    <td colspan="4"><br></td>
                                    <td align="right" style="font-size: 15px;">
                                          <span style="font-size: 25px;">Total:</span>
                                          <span style="font-size: 25px;"><?php
                                          $sql = "SELECT SUM(ped_total) AS suma FROM pedido_actual WHERE ped_usuario_id =".obtenerSesion("username",3)->cli_id;
                                          $query = prepararQuery($sql);
                                          $result = ejecutarQuery($query);
                                          $result2 = ejecutarQuery($query1);
                                          if($result){
                                                if($result2){
                                                      $suma2 = $query1->fetchObject();
                                                      $sumaTotal = $query->fetchObject();
                                                      if($suma2->suma1 != ""){
                                                            echo $sumaTotal->suma+$suma2->suma1." $";
                                                      }else{
                                                            echo $sumaTotal->suma." $";
                                                      }     
                                                }
                                          }
                                          ?></span>
                                    </td>
                              </tr>
                        <?php } ?>
                        </table>
                        <br>
                        <div style="width: 100%; text-align: center;">
                              <img src="../images/barra_footer_cotizacion_1.png" style="width: 100%; height: auto;">
                              <span style="font-size: 16px;">Holkam - Impresión por demanda</span>
                        </div>
                  </div>
            </div>
      </body>
</html>
<?php
      /*========================================================================
      * Vamos a exportar el PDF de la inspeccion para previamente enviarlo por correo
      * El PDF se crea capturando todo el html generado
      *========================================================================*/
      $dompdf = new DOMPDF();
      $dompdf -> set_paper("A4", "portrait");
      $dompdf -> load_html(ob_get_clean());
      $dompdf -> render();
      $dompdf->stream("cotizacion_".obtenerSesion("username",3)->cli_nombre.".pdf");

      ob_end_flush();   


      function obtenerSesion($nombre, $tipo){
          //Verificamos que exista la variable
          if(!isset($_SESSION["$nombre"]) || $_SESSION["$nombre"] == ""){
              return "";
          }
          $variable = $_SESSION["$nombre"];
          switch($tipo){
              //El tipo de dato es entero
              case 1:
                  if(!is_numeric($variable)){
                      return false;
                  }
                  else{
                      return $variable;
                  }
                  break;
              case 2:
                  if(!is_string($variable)){
                      return false;
                  }
                  else{
                      return $variable;
                  }
                  break;
              case 3:
                  if(!is_object($variable)){
                      return false;
                  }
                  else{
                      return $variable;
                  }
                  break;
              case 4:
                  if (filter_var($variable, FILTER_VALIDATE_EMAIL)) {
                      return $variable;
                  }
                  else{
                      return false;
                  }
                  break;
              default:
                  return $variable;
                  break;
          }
      }   
?>