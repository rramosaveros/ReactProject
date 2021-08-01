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
        <title>REGISTRAR VENDEDOR</title>
        <link rel="icon" href="../img/icono_aris.ico"/>
        <link rel="stylesheet" href="../css/estilo_reg.css"/>
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
        <section>
            <article class="articlenew">
                <div class="contenido">
                    <img src="../img/userr1.png">
                    <h2>INGRESAR DATOS DEL PRODUCTO</h2>
                    <?php
                    if(!isset($_POST["verificar"]))
                    {
                        ?>
                        <form action="agregar_registro_producto.php" method="post">
                            <table>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#128100; Código del Producto" required autofocus maxlength="10" name="codigo">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#128100; Descripcion del Producto" required maxlength="30" name="descripcion">  
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#128100; Precio Fábrica" required maxlength="30" name="pfabrica">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#128100; Porcentaje IVA" required maxlength="500" name="piva">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#128100; Porcentaje Ganancia" required maxlength="30" name="pganancia">  
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#128100; Cantidad Producto" required maxlength="30" name="cantidad">  
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="input" type="text" placeholder="&#128100; Stock Sugerido" required maxlength="30" name="stocksugerido">  
                                    </td>
                                </tr>
                            </table>
                            <input class="btn_submint" name="verificar" type="submit" value="VERIFICAR">
                        </form>
                        <?php
                    }
                    else
                    {
                    }
                    ?>
                </div>
            </article>
        </section>
        <footer>
            <hr align="center" width="100%" size="1">
            <p>&COPY; SURTIMAX. Todos los derechos reservados - 2018<br>Riobamba - Ecuador</p>
        </footer>	
    </body>
</html>