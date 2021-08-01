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
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030"><
        <meta name="description" content="surtimax"/>
        <meta name="keywords" content="HTML, CSS3, Javascript"/>
        <title>REGISTRAR TRABAJADOR</title>
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
                <h3 id="barra">EN CONSTANTE RENOVACI�0�7N</h3>
                <p>"Ofrece Gran Variedad de V��veres y Bazar de Primera Necesidad"</p>
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
                    <li><a href="../cerrar_sesion.php">CERRAR SESI�0�7N</a></li>
		</ul>
            </nav>
            </div>
        </header>
       
                <div class="contenido">
	        <img src="../img/modifica.png">
	        <h2>MODIFICAR REGISTRO</h2>
	        <?php
	        $ci = $_GET['ci'];
	        try
	        {
	            require_once('../connexion.php');
	            $sql = "select * from t_usuarios where usuario_id=$ci";
	            $result = $conn->query($sql);
	            $datos = $result->fetch_array();
	        } catch (Exception $ex) {
	            $error = $e->getMessage();
	        }
	        ?>
       		 <form action="modificausu.php" method="post">
                            <table>
                                <tr>
                                    <td>
                                        <input name="ci" class="input" type="text" placeholder="&#128100; C��dula de Identidad (Sin gui��n)" required autofocus maxlength="10"  value="<?= $datos['usuario_user'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input name="nombres" class="input" type="text" placeholder="&#128100; Nombres" required maxlength="30"  value="<?= $datos['usuario_nombre'];?>">  
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input name="apellidos" class="input" type="text" placeholder="&#128100; Apellidos" required maxlength="30"  value="<?= $datos['usuari_apellido'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="texto">
		                             Tipo de Usuario:
		                        </div>
		                        <div class="tipousu">
		                            <select name="tipo" type="tipo" required>
		                                <option selected><?= $datos['usuario_tipo'];?></option>
		                                <option>Administrador</option>
		                                <option>Socio</option>
		                                <option>Vendedor</option>
		                            </select>                                
		                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#1664; Contrase�0�9a" required maxlength="30" name="contrasenia" value="<?= $datos['usuario_pass'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#9742; Tel��fono" required maxlength="30" name="telefono" value="<?= $datos['usuario_telef'];?>">
                                    </td>
                                </tr>
                            </table>       
                	<input class="btn_submint" name="guardar" type="submit" value="GUARDAR">
                	<input class="btn_submint" type="hidden" name="id" value="<?= $datos['usuario_id'];?>">
	        </form>
	    </div>
	    
        <footer>
            <hr align="center" width="100%" size="1">
            <p>&COPY; SURTIMAX. Todos los derechos reservados - 2018<br>Riobamba - Ecuador</p>
        </footer>
    </body>
</html>