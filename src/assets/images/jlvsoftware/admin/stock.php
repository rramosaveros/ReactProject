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
?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <title>STOCK PRODUCTO</title>
        
        <meta name="description" content="surtimax"/>
        <meta name="keywords" content="HTML, CSS3, Javascript"/>
        <link rel="stylesheet" href="../css/estilo_modif.css"/>
        <link rel="icon" href="../img/icono_aris.ico"/>
        <link rel="stylesheet" href="../css/estilo_registrar.css"/>
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
            <div class="contenido">                   
		    <form action="buscar_stock.php" method="post">		        
		            <img src="../img/busca.png">
		            <h2>PRODUCTO A BUSCAR</h2><BR>
		            <input name="codigo" class="input" type="text" placeholder="C锟絛igo Producto" autofocus maxlength="30">
                            <input name="nombreproducto" class="input" type="text" placeholder="Nombre Producto" autofocus maxlength="80">
		            <input class="btn_submint" name="buscar" type="submit" value="BUSCAR">		 
		    </form>
            </div>
<div class="tablatrabajador">
                 <div class="tablatrabajador2">  
		    <?php
		        try
		        {
		            require_once('../connexion.php');
		            $sql = "select * from t_productos";
		            $result = $conn->query($sql);
		        }
		        catch (Exception $e)
		        {
		            $error = $e->getMessage();
		        }
		    ?>
		    <br><H6>Modificar Stock Productos</H6>
		    <table class="tabla">
		    <tr>
		        <TD>Código</TD>
		        <TD>Descripción</TD>		        
                        <TD>Cantidad</TD>
                        <TD>Stock Sugerido</TD>
                        <TD>Modificar Stock</TD>
                        
		    </tr>
		    <?php
		        while($row = $result->fetch_array())
		        {
		            if(($row["productos_cantidad"])<($row["productos_stocksug"])){
                            printf("
		                <tr bgcolor='red'>
		                    <td>&nbsp;%s</td>
		                    <td>&nbsp;%s</td>
		                    <td>&nbsp;%s</td>
                                    <td>&nbsp;%s</td>
		                    <td><a href=\"actualiza_stock.php?id=%s\"><img src='../img/modifica.png' width='30' height='30'/></a></td>
		                </tr>",
		  $row["productos_codigo"],$row["productos_descripcion"],$row["productos_cantidad"],$row["productos_stocksug"],$row["productos_id"]);
                            }
                            else{
                                printf("
		                <tr>
		                    <td>&nbsp;%s</td>
		                    <td>&nbsp;%s</td>
		                    <td>&nbsp;%s</td>
                                    <td>&nbsp;%s</td>
		                    <td><a href=\"actualiza_stock.php?id=%s\"><img src='../img/modifica.png' width='30' height='30'/></a></td>
		                </tr>",
		  $row["productos_codigo"],$row["productos_descripcion"],$row["productos_cantidad"],$row["productos_stocksug"],$row["productos_id"]);
                            }
		        }
		        $result->free_result();
		        $conn->close();
		        ?>
		    </table>
             </div>
        </div>
    <footer>
            <hr align="center" width="100%" size="1">
            <p>&COPY; SURTIMAX. Todos los derechos reservados - 2018<br>Riobamba - Ecuador</p>
    </footer>
    </body>
</html>