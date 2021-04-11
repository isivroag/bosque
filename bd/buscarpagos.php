<?php  
 //filter.php  

 include_once 'conexion.php';
 $objeto = new conn();
 $conexion = $objeto->connect();
 
 // Recepción de los datos enviados mediante POST desde el JS   
 

 $venta = (isset($_POST['venta'])) ? $_POST['venta'] : '';
 $proyecto = (isset($_POST['proyecto'])) ? $_POST['proyecto'] : '';

 
 
 $consulta = "SELECT * FROM wvinfopago WHERE folio_venta='$venta' and proyecto='$proyecto'";
 $resultado = $conexion->prepare($consulta);
 $resultado->execute();
 $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

 
 
 print json_encode($data, JSON_UNESCAPED_UNICODE);
 $conexion = NULL;  
 ?>