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
    $id=$_POST[id];
    $ci=$_POST[ci];
    $nombres=$_POST[nombres];
    $apellidos=$_POST[apellidos];
    $telefono=$_POST[telefono];
    $contrasenia=$_POST[contrasenia];
    $tipo=$_POST[tipo];
    try
    {
        require_once('../connexion.php');
        $sql="UPDATE t_usuarios SET usuario_user='$ci',usuario_telef='$telefono',usuario_pass='$contrasenia',usuario_tipo='$tipo',usuario_nombre='$nombres',usuari_apellido='$apellidos' WHERE usuario_id='$id'";
        $result = $conn->query($sql);
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }
    header("Location:modifica_trabajador.php");
?>