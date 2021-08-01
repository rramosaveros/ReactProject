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
        <meta name="description" content="surtimax"/>
        <meta name="keywords" content="HTML, CSS3, Javascript"/>
        <title>ACTUALIZAR CLIENTE</title>
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
       
                <div class="contenidoo">
	        <img src="../img/modifica.png">
	        <h2>MODIFICAR REGISTRO</h2>
	        <?php
	        $id = $_GET['id'];
	        try
	        {
	            require_once('../connexion.php');
	            $sql = "select * from t_clientes where cliente_id=$id";
	            $result = $conn->query($sql);
	            $datos = $result->fetch_array();
	        } catch (Exception $ex) {
	            $error = $e->getMessage();
	        }
	        ?>
       		 <form action="modificacli.php" method="post">
                            <table>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#128100; Cédula de Identidad (Sin guión)" required autofocus maxlength="10" name="ci" value="<?= $datos['cliente_cedula'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#128100; Nombres y Apellidos" required maxlength="80" name="nombres" value="<?= $datos['cliente_nombre'];?>">  
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#128100; Nombre Comercial" required maxlength="30" name="nombrecomercial" value="<?= $datos['cliente_nombrecomercial'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#128100; Dirección" required maxlength="30" name="direccion" value="<?= $datos['cliente_direccion'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#1920; Ruta" required maxlength="30" name="ruta" value="<?= $datos['cliente_ruta'];?>">
                                    </td>
                                </tr>
<tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#1792; Provincia" required maxlength="30" name="provincia" value="<?= $datos['cliente_provincia'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#1792; Ciudad" required maxlength="30" name="ciudad" value="<?= $datos['cliente_ciudad'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#1792; Cantón" required maxlength="30" name="canton" value="<?= $datos['cliente_canton'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#9993; Correo Electrónico" required maxlength="50" name="email" value="<?= $datos['cliente_correo'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#9742; Telefono" required maxlength="50" name="telefono" value="<?= $datos['cliente_telefono'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#1152; Celular" required maxlength="50" name="celular" value="<?= $datos['cliente_celular'];?>">
                                    </td>
                                </tr>
                            </table>       
                	<input class="btn_submint" name="guardar" type="submit" value="GUARDAR">
                	<input class="btn_submint" type="hidden" name="id" value="<?= $datos['cliente_id'];?>">
	        </form>
	    </div>
	    
        <footer>
            <hr align="center" width="100%" size="1">
            <p>&COPY; SURTIMAX. Todos los derechos reservados - 2018<br>Riobamba - Ecuador</p>
        </footer>
    </body>
</html>