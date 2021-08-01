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
<?php
    $ci=$_POST[ci];
    $nombres=$_POST[nombres];
    $apellidos=$_POST[apellidos];
    $tipo=$_POST[tipousu];
    $contrasenia=$_POST[contrasenia]; 
    $telefono=$_POST[telefono];
    try
    {
        require_once('../connexion.php');
        $sql = "INSERT INTO t_usuarios VALUES('".$ci."','".$telefono."','".$contrasenia."','".$tipo."',default,'".$nombres."','".$apellidos."')";
        $result = $conn->query($sql);
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }
    header("Location: registrartrabajador.php");
?>