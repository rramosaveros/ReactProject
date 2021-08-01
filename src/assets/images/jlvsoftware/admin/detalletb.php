<?php
    require_once('../connexion.php');
    
    $iddetalle = $_POST['iddetalle'];
    $idventa = $_POST['idVenta'];
    $fventa = $_POST['fechaVenta'];
	$idcliente = $_POST['clienteCedula'];
	
 $sql = "INSERT INTO t_detalleventa VALUES (default,$idventa,$idproducto,$cantidad)";
    	$result = $conn->query($sql);
    	
    	$mensaje = "";    
?>
