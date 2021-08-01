<?php
    require_once('../connexion.php');
    
    
    $idproducto = $_POST['idRegistro'];
    $cantidad = $_POST['cantidad'];
	$idventa = $_POST['idVenta'];
	
    
 $sql = "UPDATE t_productos SET productos_cantidad = (productos_cantidad-$cantidad) WHERE productos_id=$idproducto";

    	$result = $conn->query($sql);
    	
    	$mensaje = "";
$sql1 = "INSERT INTO t_detalleventa VALUES (default,$idventa,$idproducto,$cantidad)";
    $result1 = $conn->query($sql1);
    
    $mensaje1 = ""; 
		
	
?>