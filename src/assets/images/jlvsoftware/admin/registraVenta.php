<?php
    require_once('../connexion.php');
    
    $cliente = $_POST['idcliente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $vendedor = $_SESSION["idVendedor"];
    $anio = date('Y');
    $mes  = date('m');
    $dia = date('d');
    $fecha = $anio."-".$mes."-".$dia;
    
    
    $sql = "INSERT INTO t_ventas VALUES (default,'$fecha',$cliente,0.0,0.0,0.0,1,'$fecha','$vendedor')";
    $result = $conn->query($sql);
    
    $mensaje;
    
    
    if($result)
    {
	$sql = "SELECT ventas_id FROM t_ventas ORDER BY ventas_id DESC LIMIT 1";
	$result = $conn->query($sql);
	$idVenta;
	while($resultados = mysqli_fetch_array($result))
	{
	   $idVenta = $resultados['ventas_id'];
	}
	
	$sql = "SELECT * FROM t_clientes WHERE cliente_id=$cliente";
	$result = $conn->query($sql); 
	
	while($resultados = mysqli_fetch_array($result))
	{
		$id = $resultados['cliente_id'];
            	$nombre = $resultados['cliente_nombre'];
		$cedula = $resultados['cliente_cedula'];
        
	        $mensaje = "<table class='tabla' border='2px' width='90%'>";
	        $mensaje = $mensaje."<tr rowspan=2>";
	        $mensaje = $mensaje."<td colspan='6' align='center'><b>DISTRIBUCIONES SURTIMAX</b></td></tr>";
	        $mensaje = $mensaje."<tr rowspan=2><td colspan='6' align='center'><i>Un Señor, una fe, un bautismo, un Dios y Padre de todos, el cual es sobre todos, y por todos, y en todos.</i><br>Sr. Jos&eacute; Luis Vega Ayala <br>Direcci&oacute;n: Amazonas y Atenas S/N <br>RUC: 0503042871001
</td>";
	        $mensaje = $mensaje."</tr>";
	        $mensaje = $mensaje."<tr>";
	        $mensaje = $mensaje."<input type='hidden' id='idventa' value=".$idVenta."><td colspan=4><center><b>NOTA DE VENTA</center></b></td><td>N° Venta</td><td id='idVenta'>".$idVenta."</td>";
	        $mensaje = $mensaje."</tr>";
	        $mensaje = $mensaje."<tr>";
	        $mensaje = $mensaje."<td><b>Nombre del cliente:</b></td>";
	        $mensaje = $mensaje."<td>".$nombre."</td>";
	        $mensaje = $mensaje."<td><b>Cédula:</b></td>";
	        $mensaje = $mensaje."<td id='cedulaCliente'>".$cedula."</td>";
	        $mensaje = $mensaje."<td><b>Fecha:</b></td>";
	        $mensaje = $mensaje."<td id='fechaVenta'>".$fecha."</td>";
	        $mensaje = $mensaje."</tr>";
	        $mensaje = $mensaje."<tr>";
	        $mensaje = $mensaje."<td><b>Ruta</b></td>";
	        $mensaje = $mensaje."<td>".$resultados['cliente_ruta']."</td>";
	        $mensaje = $mensaje."<td><b>Direcci&oacute;n</b></td>";
	        $mensaje = $mensaje."<td>".$resultados['cliente_direccion']."</td>";
	        $mensaje = $mensaje."<td><b>Tel&eacute;fono</b></td>";
	        $mensaje = $mensaje."<td>".$resultados['cliente_telefono']."</td>";
	        $mensaje = $mensaje."</tr>";
	}
    }
    else
    {
        $mensaje = "<br>Error, no se pudo registrar los datos del cliente";
    }
echo $mensaje;  
?>