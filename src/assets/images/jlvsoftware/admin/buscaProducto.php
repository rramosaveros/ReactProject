<?php
require_once('../connexion.php');
$consultaBusqueda = $_POST['valorBusqueda'];

$caracteres_malos = array("<", ">", "'", "<", ">", "'");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);


$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) 
{
    	$sql = "SELECT * FROM t_productos WHERE productos_descripcion COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%' OR productos_codigo COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%'";
    	$result = $conn->query($sql);
    	
	$filas = mysqli_num_rows($result);


	if ($filas === 0) 
	{
		$mensaje = "<p>No hay ningún producto que coincida con ese parámetro</p>";
	} 
	else 
	{
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		while($resultados = mysqli_fetch_array($result)) 
		{
			$id = $resultados['productos_id'];
            		$nombre = $resultados['productos_descripcion'];
            		$stock = $resultados['productos_cantidad'];
			$precio = $resultados['productos_ppvp'];

			//Output
			if($filas === 1)
            		{
		                $mensaje .= "
		                <p><input type='hidden' name='id' id='idProducto' value=" . $id . ">
		                <strong>Nombre:</strong><input type='hidden' id='detalle' value= '" . utf8_encode($nombre) . "'>". utf8_encode($nombre)."<br>
		                <strong>Stock:</strong> <input type='hidden' id='stock' value=" . $stock . ">".$stock."<br>
		                <strong>PVP:</strong><input type='hidden' id='precio' value=" . $precio . ">".$precio."<br>";
		                if($stock > 0)
		                {
		                	$mensaje .="<strong>Cantidad: </strong><input type='number' id='cantidad' max='".$stock."' step=1><br>		  
		                	<input type='image' name='agregar' src='../img/Add.png' width=26px height=26px onClick='agregaProducto();'</form></p>";
		                }
		               
            		}
            		else
            		{
		                $mensaje .= "
		                <p><strong>Id:</strong><input type='hidden' name='id' id='id' value=" . $id . ">". $id ."<br>
		                <strong>Nombre:</strong> " . utf8_encode($nombre) . "<br>
		                <strong>Stock:</strong> " . $stock . "<br>
		                <strong>Precio:</strong> " . $precio . "<br>
		                </p>";  
            		}
           
		};

	}; 

};
echo $mensaje;
?>