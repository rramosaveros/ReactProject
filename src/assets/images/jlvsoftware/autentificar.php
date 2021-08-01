<?php
session_start();
$login=$_POST["username"];
$clave=$_POST["password"];
$tip=$_POST["tipo"];
if(isset($login)&&isset($clave)&&isset($tip))
{
    try
    {
        require_once 'connexion.php';
        $sql = "select * from t_usuarios where(usuario_user='$login' and usuario_pass='$clave' and usuario_tipo='$tip')";
        $result=$conn->query($sql);
    } catch (Exception $e)
    {
        $error= $e->getMessage();
    }
    $row=$result->fetch_array();
    if(($row['usuario_user']==$login) && ($row['usuario_pass']==$clave) && ($row['usuario_tipo']==$tip))
    {
        $_SESSION["registrada"]="administrador";
        $_SESSION["id"]=$row['usuario_nombre']; 
        $_SESSION["id2"]=$row['usuari_apellido']; 
        $_SESSION["idVendedor"]=$row['usuario_user'];
        header("Location:admin/admin.php");
    }
    else
    {
        if(($row['usuario_user']==$login) && ($row['usuario_pass']==$clave) && ($row['usuario_tipo']==$tip))
        {
            $_SESSION["registrada"]="socio";
            $_SESSION["id"]=$row['usuario_nombre']; 
            $_SESSION["id2"]=$row['usuari_apellido']; 
            $_SESSION["idVendedor"]=$row['usuario_user'];
            header("Location:socio/socio.php");
        }
        else
        {
            if(($row['usuario_user']==$login) && ($row['usuario_pass']==$clave) && ($row['usuario_tipo']==$tip))
            {
                $_SESSION["registrada"]="vendedor";
                $_SESSION["id"]=$row['usuario_nombre']; 
                $_SESSION["id2"]=$row['usuari_apellido'];
                $_SESSION["idVendedor"]=$row['usuario_user']; 
                header("Location:vendedor/vendedor.php");
            }
            else
            {
                header("Location:index.php?error=TRUE");
            }
        }
    }
}
else
{
    session_unset();
    session_destroy();
}
?>