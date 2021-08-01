<?php
    require_once('dbDetalle.php');
    $conn = new mysqli($hostname,$username,$password,$database); 
    mysqli_set_charset($conn,'utf8');
    if($conn->connect_error)
    {
        echo $error=$conn->connect_error;
    }
?>