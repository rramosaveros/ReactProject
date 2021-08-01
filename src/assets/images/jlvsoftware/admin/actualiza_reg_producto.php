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
<head><meta charset="UTF-8"/>
        
        <meta name="description" content="surtimax"/>
        <meta name="keywords" content="HTML, CSS3, Javascript"/>
        <title>ACTUALIZAR PRODUCTO</title>
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
                <p>"Ofrece Gran Variedad de Víveres y Bazar de Primera Necesidad"</p>
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
                                <li><a href="reporte1.php"><img src="../img/userr1.png" width="50" height="50"><br>REPORTE 1</a></li>
                                <li><a href="reporte2.php"><img src="../img/userr1.png" width="50" height="50"><br>REPORTE 2</a></li>
                                <li><a href="reporte3.php"><img src="../img/userr1.png" width="50" height="50"><br>REPORTE 3</a></li>
                                <li><a href="reporte4.php"><img src="../img/userr1.png" width="50" height="50"><br>REPORTE 4</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="">VENTAS</a></li>
                    <li><a href="">FACTURA</a></li>
                    <li><a href="../cerrar_sesion.php">CERRAR SESIÓN</a></li>
		</ul>
            </nav>
            </div>
        </header>
       
                <div class="contenido">
	        <img src="../img/modifica.png">
	        <h2>MODIFICAR PRODUCTO</h2>
	        <?php
	        $id = $_GET['ci'];
	        try
	        {
	            require_once('../connexion.php');
	            $sql = "select * from t_productos where productos_id=$id";
	            $result = $conn->query($sql);
	            $datos = $result->fetch_array();
	        } catch (Exception $ex) {
	            $error = $e->getMessage();
	        }
	        ?>
       		 <form action="modificaprod.php" method="POST">
                            <table>
                                <tr>
                                    <td>
                                        <input name="codigo" class="input" type="text" placeholder="Código Producto" required autofocus maxlength="10"  value="<?= $datos['productos_codigo'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input name="descripcion" class="input" type="text" placeholder="Descripción" required maxlength="30"  value="<?= $datos['productos_descripcion'];?>">  
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input name="preciofabrica" class="input" type="text" placeholder="Precio de Fábrica" required maxlength="30"  value="<?= $datos['productos_pfabrica'];?>">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <input name="porcentajeiva" class="input" type="text" placeholder="Porcentaje IVA" required maxlength="30"  value="<?= $datos['productos_porcentiva'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input name="porcentajeganancia" class="input" type="text" placeholder="Porcentaje Ganancia" required maxlength="30"  value="<?= $datos['productos_porcentganan'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input name="cantidad" class="input" type="text" placeholder="Cantidad Producto" required maxlength="30" value="<?= $datos['productos_cantidad'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input name="stocksugerido" class="input" type="text" placeholder="Stock Sugerido" required maxlength="30" value="<?= $datos['productos_stocksug'];?>">
                                    </td>
                                </tr>
                            </table>       
                	<input class="btn_submint" name="guardar" type="submit" value="GUARDAR">
                	<input class="btn_submint" type="hidden" name="idp" value="<?= $datos['productos_id'];?>">
	        </form>
	    </div>
	    
        <footer>
            <hr align="center" width="100%" size="1">
            <p>&COPY; SURTIMAX. Todos los derechos reservados - 2018<br>Riobamba - Ecuador</p>
        </footer>
    </body>
</html>