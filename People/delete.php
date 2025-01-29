<?php
    require_once '../config/connect.php';
    $id_Customers = $_GET ['id_Customers'];

    mysqli_query($connect, "DELETE FROM Customers WHERE `Customers`.`id_Customers` = '$id_Customers'");
    header('Location: ../Klienti.php');
?>