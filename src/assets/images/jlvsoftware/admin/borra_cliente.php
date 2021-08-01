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
    $id= $_GET['id'];
    try
    {
        require_once('../connexion.php');
        $sql = "delete from t_clientes where cliente_id=$id";
        $result = $conn->query($sql);
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }
    header("Location: elimina_cliente.php"); 
?>

