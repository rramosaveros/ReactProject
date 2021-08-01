<?php
    session_start();
    if(!isset($_SESSION["registrada"]))
    {
        session_unset();
        session_destroy();
        header('Location:../index.php');
    }
    $id=isset($_SESSION["id"]) ? $_SESSION["id"]: NULL;
    $id2=isset($_SESSION["id2"]) ? $_SESSION["id2"]: NULL;
    require_once('../connexion.php');
?>
<html>
<head>
        <meta charset="utf-8"/>
        <meta name="description" content="surtimax"/>
        <meta name="keywords" content="HTML, CSS3, Javascript"/>
        <title>Reporte Estado Ventas</title>
        <link rel="icon" href="../img/icono_aris.ico"/>
        <link rel="stylesheet" href="../css/estilo_registrar.css">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
</head>
<body> 
	<div id="pre-header">
            <div id="telefono">
                <span>+593 984573207</span>
            </div>        
            <div id="email">
                <span>xxxxxx@xxxxxx.xxxxx</span>
            </div>
            <div class="nombreusuario">
                <a class="link" href="admin.php"><span><< &#128100; Administrador: <?php echo ($id)." ".($id2) ?></span></a>
            </div>
        </div>
        <header>
            <div id="logo">
                <h1><b>MEGA COMERCIAL</b></h1>
                <h1><b>SURTIMAX</b></h1>
            </div>
            <div id="visitanos">
                <h3 id="barra">EN CONSTANTE RENOVACIÓN</h3>
                <p>"Ofrece Gran Varidad de Víveres y Bazar de Primera Necesidad"</p>
            </div>
            <div class="menu">
            <nav>
                <ul>
                    <li><a href="">TRABAJADOR</a>
                        <div class="doc">
                            <ul>
                                <li color="black"><a href="registrartrabajador.php"><img src="../img/userr1.png" width="50" height="50"><br>AGREGAR REGISTRO TRABAJADOR</a></li>
                                <li><a href="modifica_trabajador.php"><img src="../img/modifica.png" width="50" height="50"><br>MODIFICAR DATOS TRABAJADOR</a></li>
                                <li><a href="elimina_trabajador.php"><img src="../img/borra.png" width="50" height="50"><br>ELIMINAR TRABAJADOR</a></li>
                                <li><a href="buscar_trabajador.php"><img src="../img/busca.png" width="50" height="50"><br>BUSCAR TRABAJADOR</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="">CLIENTES</a>
                        <div class="doc">
                            <ul>
                                <li><a href="registrar_cliente.php"><img src="../img/userr1.png" width="50" height="50"><br>AGREGAR REGISTRO CLIENTE</a></li>
                                <li><a href="modifica_cliente.php"><img src="../img/modifica.png" width="50" height="50"><br>MODIFICAR DATOS CLIENTE</a></li>
                                <li><a href="elimina_cliente.php"><img src="../img/borra.png" width="50" height="50"><br>ELIMINAR CLIENTE</a></li>
                                <li><a href="busca_cliente.php"><img src="../img/busca.png" width="50" height="50"><br>BUSCAR CLIENTE</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="">PRODUCTOS</a>
                        <div class="doc">
                            <ul>
                                <li><a href="registrarproducto.php"><img src="../img/userr1.png" width="50" height="50"><br>AGREGAR REGISTRO PRODUCTOS</a></li>
                                <li><a href="modifica_producto.php"><img src="../img/modifica.png" width="50" height="50"><br>MODIFICAR DATOS PRODUCTO</a></li>
                                <li><a href="elimina_producto.php"><img src="../img/borra.png" width="50" height="50"><br>ELIMINAR PRODUCTO</a></li>
                                <li><a href="busca_producto.php"><img src="../img/busca.png" width="50" height="50"><br>BUSCAR PRODUCTO</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="stock.php">STOCK PRODUCTOS</a></li>
                    <li><a href="">REPORTES</a>
                        <div class="doc">
                            <ul>
                                <li><a href="ReporteRutas.php"><img src="../img/userr1.png" width="50" height="50"><br>REPORTE RUTAS</a></li>
                                <li><a href="ReporteGanancias.php"><img src="../img/userr1.png" width="50" height="50"><br>REPORTE GANANCIAS</a></li>
                                <li><a href="reporteF.php"><img src="../img/userr1.png" width="50" height="50"><br>VENTAS NETAS</a></li>
                                <li><a href="reporteB.php"><img src="../img/userr1.png" width="50" height="50"><br>SALIDA DE BODEGA</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="ReporteEstados.php">VENTAS</a></li>
                    <li><a href="factura.php">FACTURA</a></li>
                    <li><a href="../cerrar_sesion.php">CERRAR SESIÓN</a></li>
		</ul>
            </nav>
            </div>
        </header>
        <hr><br><br><br><br><br>
        <center>
        <div class="tablatrabajador">
           <div class="tablatrabajador2">
	        <h3>Listado de Clientes para Visitar</h3>
	        <form action="ReporteRutas.php" method="post">
	           <label> Fecha de Visita</label>
	            <input type="date" name="fecha">
	            <br><br>
	            <input type="submit" name="listar" value="Listar"><br><br><br>
	        </form>
	        <?php
	            if(isset($_POST["listar"]))
	            {
	                $fecha = $_POST["fecha"];
	                $sql = "SELECT t_ventas.ventas_fechaproxima, t_clientes.cliente_nombre, t_clientes.cliente_nombrecomercial, t_clientes.cliente_direccion, t_clientes.cliente_ruta FROM t_ventas INNER JOIN t_clientes ON t_ventas.ventas_clienteid = t_clientes.cliente_id WHERE t_ventas.ventas_fechaproxima='$fecha'";
	                $result = $conn->query($sql);
	                $mensaje = "";
	                if($result)
	                {
	                    $mensaje .= "<table border=1 width=90%>";
	                    $mensaje .= "<tr>";
	                    $mensaje .= "<th>N&deg;</th>";
	                    $mensaje .= "<th>Fecha de visita</th>";
	                    $mensaje .= "<th>Cliente</th>";
	                    $mensaje .= "<th>Comercial</th>";
	                    $mensaje .= "<th>Direcci&oacute;n</th>";
	                    $mensaje .= "<th>Ruta</th>";
	                    $mensaje .= "</tr>";
	                    $i=1;
	                    while($resultados = mysqli_fetch_array($result))
	                    {
	                        
	                        $mensaje .= "<tr>";
	                        $mensaje .= "<td>".$i."</td>";
	                        $mensaje .= "<td>".$resultados['ventas_fechaproxima']."</td>";
	                        $mensaje .= "<td>".utf8_decode($resultados['cliente_nombre'])."</td>";
	                        $mensaje .= "<td>".utf8_decode($resultados['cliente_nombrecomercial'])."</td>";
	                        $mensaje .= "<td>".utf8_decode($resultados['cliente_direccion'])."</td>";
	                        $mensaje .= "<td>".utf8_decode($resultados['cliente_ruta'])."</td>";
	                        $mensaje .= "</tr>";
	                        $i = $i+1;
	                        
	                    }
	                    $mensaje .= "</table>";
	                }
	                else
	                {
	                    $mensaje .= "<br>Error";
	                }
	                
	                echo $mensaje;
	            }
	        ?>
               </div>
            </div>
           </center>
        <footer>
            <hr align="center" width="100%" size="1">
            <p>&COPY; SURTIMAX. Todos los derechos reservados - 2018<br>Riobamba - Ecuador</p>
        </footer>
    </body>
</html>