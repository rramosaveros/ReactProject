<?php
    session_start();
    $admin=isset($_SESSION['registrada']) ? $_SESSION['registrada']: NULL;
    if($admin == "administrador")
    {
        header('Location:admin/admin.php');
    } 
    if($admin == "socio")
    {
        header('Location:socio/socio.php');
    } 
    if($admin == "vendedor")
    {
        header('Location:vendedor/vendedor.php');
    } 
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="surtimax"/>
        <meta name="keywords" content="HTML, CSS3, Javascript"/>
        <title>SURTIMAX</title>
        <link rel="icon" href="img/icono_aris.ico"/>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/styles.css"/>
    </head>
    <body>
        <div id="pre-header">
            <div id="telefono">
                <span>+593 984573207</span>
            </div>        
            <div id="email">
                <span>xxxxxx@xxxxxx.xxxxx</span>
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
        </header>
        <section>
            <article>
                <div class="contenido">
                    <img src="img/adm.png">
                    <?php
                        if(isset($_GET["error"]) == TRUE)
                        {
                            echo "<h3>LOS DATOS INGRESADOS SON INCORRECTOS</h3>";
                        }
                    ?>
                    <form method="post" action="autentificar.php">
                        <div class="form-inpu">
                            <i class="fa fa-user cust" aria-hidden="true" width="10px" heigth="10px"></i>
                            <input type="text" name="username" placeholder="Id Usuario" required autofocus>
                        </div>
                        <div class="form-inpu">
                            <i class="fa fa-lock cust" aria-hidden="true"></i>
                            <input type="password" name="password" placeholder="Contraseña" required>
                        </div>
                        <div class="texto">
                             Tipo de Usuario:
                        </div>
                        <div class="tipousu">
                            <select name="tipo" type="tipo" required>
                                <option selected></option>
                                <option>Administrador</option>
                                <option>Socio</option>
                                <option>Vendedor</option>
                            </select>                                
                        </div>
                        <input type="submit" name="submit" value="INICIAR SESIÓN" class="btn-login">
                    </form>
                </div>
            </article>
        </section>
        <footer>
            <hr align="center" width="100%" size="1">
            <p>&COPY; SURTIMAX. Todos los derechos reservados - 2018<br>Riobamba - Ecuador</p>
        </footer>
    </body>
</html>
