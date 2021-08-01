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
    $id=$_POST[idp];
    $cantidadanterior=$_POST[cantidadanterior];
    $nuevacantidad=$_POST[nuevacantidad];
    $cantidadnueva=$cantidadanterior + $nuevacantidad; 
    try
    {
        require_once('../connexion.php');
        $sql="UPDATE t_productos SET productos_cantidad='$cantidadnueva' 
 WHERE productos_id='$id'";
        $result = $conn->query($sql);
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }
    header("Location:stock.php");
?>