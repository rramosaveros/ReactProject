<?php
	require_once('../connexion.php');  
		
		$tipo = $_POST[tipo];
		
		
		//Si funciona
		//   INSERT INTO t_ventas(ventas_id, ventas_fecha, ventas_clienteid, ventas_subtotal, ventas_iva, ventas_total, ventas_estado, ventas_fechaproxima) VALUES ("342","2018-05-09",(SELECT cliente_id FROM t_clientes WHERE cliente_cedula="1721259586"),"5.1216","0.6984","1","5.82","2018-05-17");
		if(tipo=="insertar"){
			$idVenta = $_POST[idVenta];
	    	$fechaVenta = $_POST[fechaVenta];
	    	$clienteCedula= $_POST[clienteCedula];
  		  	$subTotal= $_POST[subTotal];
			$ventaIva= $_POST[ventaIva];
			$ventaEstado= $_POST[ventaEstado];
			$ventaTotal= $_POST[ventaTotal];
			$fechaProxima= $_POST[fechaProxima];
    		
			$sql ="INSERT INTO t_ventas(ventas_id, ventas_fecha, ventas_clienteid, ventas_subtotal, ventas_iva, ventas_total, ventas_estado, ventas_fechaproxima) VALUES (".$idVenta.",'".$fechaVenta."',(SELECT cliente_id FROM t_clientes WHERE cliente_cedula='".$clienteCedula."'),".$subTotal.",".$ventaIva.",".$ventaTotal.",'".$ventaEstado."','".$fechaProxima."');";
			echo "Sentencia: ".$sql;
		}/*else(tipo=="stock"){
			$idRegistro = intval($_POST[idRegistro]);
	    	$cantidad = intval($_POST[cantidad]);
			$sql ="UPDATE t_productos SET productos_cantidad=productos_cantidad-".$cantidad." WHERE productos_codigo=".$idRegistro.";";
			//$sql ="UPDATE t_productos SET productos_cantidad=productos_cantidad-6 WHERE productos_codigo=6082;";
		}*/
		
		
	$result = $conn->query($sql);
	    
	    //$mensaje = "";
	    
	    //if($result)
	    //{
	    //	$mensaje = "Ok";
	    //}
	    //else
	    //{
	    //	$mensaje = "Error";
	    //}
		//echo $mensaje;
?>