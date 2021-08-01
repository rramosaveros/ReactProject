<?php
    require_once('../connexion.php');
    
    
    $idventa = $_POST['idVenta'];
    $fventa = $_POST['fechaVenta'];
	$idcliente = $_POST['clienteCedula'];
	$subtotal = $_POST['subTotal'];
	$ventaiva = $_POST['ventaIva'];
	$ventaestado = $_POST['ventaEstado'];
	$ventatotal = $_POST['ventaTotal'];
	$fechap = $_POST['fechaProxima'];
    
 $sql = "UPDATE t_ventas SET ventas_subtotal=$subtotal,ventas_iva=$ventaiva,ventas_total=$ventatotal,ventas_estado=$ventaestado WHERE ventas_id=$idventa";
    	$result = $conn->query($sql);
    	
    	$mensaje = "";    
?>

