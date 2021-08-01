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
    $nombrecomercial=$_POST[nombrecomercial];
    $direccion=$_POST[direccion];
    $ruta=$_POST[ruta];
    $provincia=$_POST[provincia];
    $ciudad=$_POST[ciudad];
    $canton=$_POST[canton];
    $email=$_POST[email];
    $telefono=$_POST[telefono];
    $celular=$_POST[celular];
    try
    {
        require_once('../connexion.php');
        $sql="UPDATE t_clientes SET cliente_cedula='$ci',cliente_nombre='$nombres',cliente_nombrecomercial='$nombrecomercial',cliente_direccion='$direccion',cliente_ruta='$ruta',cliente_provincia='$provincia',cliente_ciudad='$ciudad',cliente_canton='$canton',cliente_correo='$email',cliente_telefono='$telefono',cliente_celular='$celular' WHERE cliente_id='$id'";
        $result = $conn->query($sql);
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }
    header("Location:modifica_cliente.php");
?>