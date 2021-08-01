<?php
    require_once('../connexion.php');
    
    
    $venta = $_POST['idventa'];
    $producto = $_POST['idproducto'];
    $detalle = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    
    $iva = $_POST['IVA'];
    $descuento = $_POST['descuento'];
    
    $sql = "INSERT INTO t_detalleventa VALUES (default,$venta,$producto,$cantidad)";
    $result = $conn->query($sql);
    
    $mensaje = "";
    
    if($result)
    {
        $sql = "SELECT productos_cantidad FROM t_productos WHERE productos_id=$producto";
	$result = $conn->query($sql);
	$stock;
	while($resultados = mysqli_fetch_array($result))
	{
	   $stock= $resultados['productos_cantidad'];
	}
        
        $sql = "UPDATE t_productos SET productos_cantidad = ($stock-$cantidad) WHERE productos_id=$producto";
    	$result = $conn->query($sql);
    	
    	$mensaje = "";
        
        if($result)
        {
        	$sql = "SELECT t_detalleventa.detalle_id AS Id, t_productos.productos_descripcion AS Detalle, t_productos.productos_ppvp AS Precio 	,t_detalleventa.detalle_cantidad AS Cantidad FROM t_detalleventa INNER JOIN t_productos ON t_detalleventa.detalle_productoid = t_productos.productos_id WHERE t_detalleventa.detalle_ventaid = $venta";
        	$result = $conn->query($sql);
        	$mensaje = $mensaje."<table class='tabla' border='2px' width='90%'>";
        	$mensaje = $mensaje."<tr align='center'>";
        	$mensaje = $mensaje."<td><b>Cantidad</b></td>";
        	$mensaje = $mensaje."<td colspan=3><b>Detalle</b></td>";
        	$mensaje = $mensaje."<td><b>Precio Unitario</b></td>";
        	$mensaje = $mensaje."<td><b>Precio Total</b></td>";
        	$mensaje = $mensaje."<td><b>Eliminar</b></td>";
        	$mensaje = $mensaje."</tr>";
        	$subtotal = 0;
        	$total = 0;
        	$ivaproducto = 0;
        	while($detalle = mysqli_fetch_array($result))
            	{
	                $mensaje = $mensaje."<tr><input type='hidden' name='id' value=".$detalle['Id'].">";
	                $mensaje = $mensaje."<td> ".$detalle['Cantidad']."</td>";
	                $mensaje = $mensaje."<td colspan=3>".utf8_encode($detalle['Detalle'])."</td>";
	                $mensaje = $mensaje."<td>".$detalle['Precio']."</td>";
	                $mensaje = $mensaje."<td>".($detalle['Precio']*$detalle['Cantidad'])."</td>";
	                $mensaje = $mensaje."<td align='center'>Acci&oacute;n</td>";
	                $mensaje = $mensaje."</tr>";
	                $subtotal = $subtotal + ($detalle['Precio']*$detalle['Cantidad']);
	               
            	}
          
               $calculaIva = $subtotal*($iva/100);
               $subtotal = $subtotal - $calculaIva;
               $calculaDescuento = $subtotal * ($descuento/100);
               $calculaTotal = $subtotal-$calculaDescuento+$calculaIva;
               
                $sql = "UPDATE t_ventas SET ventas_subtotal = $subtotal, ventas_iva=$calculaIva, ventas_total=$calculaTotal WHERE ventas_id=$venta";
    		$result = $conn->query($sql);
               $mensaje = $mensaje."<tr align='center'><td colspan=5><b>SUBTOTAL</b></td><td colspan=2>$".round($subtotal,2)."</td></tr>";
               $mensaje = $mensaje."<tr align='center'><td colspan=5><b>DESCUENTO ".$descuento."%</b></td><td colspan=2>$".round($calculaDescuento,2)."</td></tr>";
               $mensaje = $mensaje."<tr align='center'><td colspan=5><b>IVA ".$iva."%</b></td><td colspan=2>$".round($calculaIva,2)."</td></tr>";
               $mensaje = $mensaje."<tr align='center'><td colspan=5><b>TOTAL</b></td><td colspan=2>$".round($calculaTotal,2)."</td></tr></table>";
               $mensaje = $mensaje."<br><label>Estado de la venta:</label>&nbsp;&nbsp;<select id='estado'><option value='1'>Pagada</option><option value='2'>Por cobrar</option></select>";
               $mensaje = $mensaje."<br>><label>Fecha de la pr&oacute;xima visita:</label>&nbsp;&nbsp;<input type='date' id='fechap'>";
               
        }
        
    }
    else
    {
        $mensaje = "<br>Error, no se pudo registrar los datos del detalle";
    }
echo $mensaje;        
?>