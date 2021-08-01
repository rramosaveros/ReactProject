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
        <title>Reporte de Ganancias Entre 2 Fechas</title>
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
                <a class="link" href="../Downloads/admin.php"><span><< &#128100; Administrador: <?php echo ($id)." ".($id2) ?></span></a>
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
        <div id="imprimir">
        <div class="tablatrabajador">
           <div class="tablatrabajador2">
		        <h3>Salida de Bodega</h3>
        <form action="reporteB.php" method="post">
           <label>Numero de Factura Inicial</label>
            <input type="text" name="inicio">
            <br><br>
            <label>Numero de Factura  Final </label>
            <input type="text" name="fin">
            <br><br>
            <input type="submit" name="listar" value="Listar">
        </form>
        <?php
            if(isset($_POST["listar"]))
            {
                $inicio = $_POST["inicio"];
                $fin = $_POST["fin"];
                $sql = "SELECT t_productos.productos_descripcion,t_productos.productos_ppvp,SUM(t_detalleventa.detalle_cantidad)AS Total
                FROM t_ventas INNER JOIN (t_detalleventa INNER JOIN t_productos 
                ON t_detalleventa.detalle_productoid = t_productos.productos_id)
                ON t_ventas.ventas_id = t_detalleventa.detalle_ventaid 
                WHERE t_ventas.ventas_id BETWEEN '$inicio' AND '$fin' GROUP BY t_productos.productos_id";
                $result = $conn->query($sql);
                $mensaje = "";
                if($result)
                {
                    $mensaje .= "<table border=1 width=90%>";
                    $mensaje .= "<tr>";
                    $mensaje .= "<th>N&deg;</th>";
                    $mensaje .= "<th>Producto</th>";
                    $mensaje .= "<th>Unidades de salida</th>";
                    $mensaje .= "<th>Valor x Unidad</th>";
                    $mensaje .= "</tr>";
                    $i=1;
                
                    while($resultados = mysqli_fetch_array($result))
                    {
                        
                        $mensaje .= "<tr>";
                        $mensaje .= "<td>".$i."</td>";
                        $mensaje .= "<td>".utf8_decode($resultados['productos_descripcion'])."</td>";
                        $mensaje .= "<td>".$resultados['Total']."</td>";
                        $mensaje .= "<td>".$resultados['productos_ppvp']."</td>";
                        
                       
                        $mensaje .= "</tr>";
                        $i = $i+1;
                        
                    }
                    $mensaje .= "<tr><td colspan=4><b>SURTIMAX REPORTE DE  BODEGA</b></td></tr>";
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
            </div>
</div>
		<br><br><br><br>
        	<center><button class="btn_submint" type="button" onClick="javascript:imprSelec('imprimir')">Imprimir Reporte</button></center>	
              </form>
          </div>
           </center>
        <footer>
            <hr align="center" width="100%" size="1">
            <p>&COPY; SURTIMAX. Todos los derechos reservados - 2018<br>Riobamba - Ecuador</p>
        </footer>
<script>
	  function imprSelec(nombre)
	  {
	          var ficha = document.getElementById(nombre);
		  var ventimp = window.open(' ', 'popimpr');
		  ventimp.document.write( ficha.innerHTML );
		  ventimp.document.close();
		  ventimp.print( );
		  ventimp.close();
	    
	  } 
	</script>

    </body>
</html>