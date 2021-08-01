<?php
    session_start();
    if(!isset($_SESSION['registrada']))
    {
        session_unset();
        session_destroy();
        header('Location:../index.php');
    }
?>
<?php
    $codigo=$_POST[codigo];
    $descripcion=$_POST[descripcion];
    $pfabrica=$_POST[pfabrica];
    $piva=$_POST[piva];
    $ppvp=$_POST[pganancia];
    $productomiva=((($pfabrica*$piva)/100)+$pfabrica); 
    $productoganancia=((($productomiva*$ppvp)/100)+$productomiva); 
    $gananciapro=($productoganancia-$productomiva);
    $cantidad=$_POST[cantidad];
    $stocksugerido=$_POST[stocksugerido];
    
    try
    {
        require_once('../connexion.php');
        $sql = "INSERT INTO t_productos VALUES (default,'".$codigo."','".$descripcion."','".$pfabrica."','".$productomiva."','".$productoganancia."','".$gananciapro."','".$piva."','".$ppvp."','".$cantidad."','".$stocksugerido."')";
        $result = $conn->query($sql);
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }
    header("Location: registrarproducto.php");
?>