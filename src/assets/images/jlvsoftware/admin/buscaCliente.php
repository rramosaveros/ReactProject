<?php
require_once('../connexion.php');
//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) 
{
    	$sql = "SELECT * FROM t_clientes WHERE cliente_cedula COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%' OR cliente_nombre COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%'";
    	$result = $conn->query($sql);
    	
	$filas = mysqli_num_rows($result);
	$mensaje = "";
	
	
	if ($filas === 0) 
	{
		$mensaje = "<p>No hay ningún usuario con ese número de cédula</p>";
	} 
	else 
	{
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';
		while($resultados = mysqli_fetch_array($result))
		{
			$id = $resultados['cliente_id'];
            		$nombre = $resultados['cliente_nombre'];
            		$direccion = $resultados['cliente_direccion'];
			$cedula = $resultados['cliente_cedula'];
			
			if($filas === 1)
            		{
                		$mensaje .= "<p><input type='hidden' name='id' id='id' value=" . $id . ">
		                <strong>Nombre:</strong><input type='hidden' class='input' id='nombre' value= " . $nombre . ">".$nombre."<br>
		                <strong>Cédula:</strong><input type='hidden'class='input' id='cedula' value= " . $cedula . " >".$cedula."<br>
		                <strong>Dirección:</strong><input type='hidden' class='input' id='direccion' value= " . $direccion. " >".$direccion."<br>
		                <input type='image' class='btn_submint' name='agregar' src='../img/Add.png' width=36px height=36px onClick='agregaCliente();'</form>
		                </p>";   
            		}
            		else
            		{
		                $mensaje .= "
		                <p>
		                <strong>Id:</strong><input type='hidden' name='id' id='id' value=" . $id . ">". $id ."<br>
		                <strong>Nombre:</strong> " . $nombre. "<br>
		                <strong>Cédula:</strong> " . $cedula . "<br>
		                <strong>Dirección:</strong> " . $direccion . "<br>
		                </p>";   
            		}
            
		};

	};

};
echo $mensaje;
?>