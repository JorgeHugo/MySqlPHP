<?php
  require ("../CONN/classConnectionMySQL.php");
 
  $Conexion = new ConnectionMySQL();
  $Conexion->CreateConnection();

  $SQL = "SELECT * FROM vehiculos"; 
  
  $result = $Conexion->ExecuteQuery($SQL);
  
  $row = $Conexion->GetRows($result);

  $VehiculoId = $row['id'];  
  $VehiculoMarca = $row['marca'];
  $VehiculoModelo = $row['MODELO']; 

 /* echo $VehiculoId;
  echo "<br>";
  echo $VehiculoMarca;
*/
?>
  MARCA
  <input type="text" id="marca" name="marca" value="<?php echo $VehiculoMarca;?>">
  <br>
   MODELO
  <input type="text" id="modelo" name="modelo" value="<?php echo $VehiculoModelo;?>"> 
<?php

  $Conexion->SetFreeResult($result);
?>