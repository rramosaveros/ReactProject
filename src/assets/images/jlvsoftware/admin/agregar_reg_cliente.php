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
        $sql = "INSERT INTO t_clientes VALUES(default,'".$ci."','".$nombres."','".$nombrecomercial."','".$direccion."','".$ruta."','".$provincia."','".$ciudad."','".$canton."','".$email."','".$telefono."','".$celular."')";
        $result = $conn->query($sql);
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }
    header("Location:registrar_cliente.php");
?>