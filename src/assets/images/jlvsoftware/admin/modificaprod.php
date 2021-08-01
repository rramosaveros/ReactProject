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
    $codigo=$_POST[codigo];
    $descripcion=$_POST[descripcion];
    $pfabrica=$_POST[preciofabrica];
    $piva=$_POST[porcentajeiva];
    $ppvp=$_POST[porcentajeganancia];
    $cantidad=$_POST[cantidad];
    $productomiva=((($pfabrica*$piva)/100)+$pfabrica); 
    $productoganancia=((($productomiva*$ppvp)/100)+$productomiva); 
    $gananciapro=($productoganancia-$productomiva);
    $stocksugerido=$_POST[stocksugerido]; 
    try
    {
        require_once('../connexion.php');
        $sql="UPDATE t_productos SET productos_codigo='$codigo',productos_descripcion='$descripcion',productos_pfabrica='$pfabrica',productos_piva='$productomiva',productos_ppvp='$productoganancia',productos_ganacia='$gananciapro',productos_porcentiva='$piva',productos_porcentganan='$ppvp',productos_cantidad='$cantidad',productos_stocksug='$stocksugerido' WHERE productos_id='$id'";
        $result = $conn->query($sql);
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }
    header("Location:modifica_producto.php");
?>