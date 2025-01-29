<?php
    require_once '../config/connect.php';
    $id_Product = $_GET ['id_Product'];

    mysqli_query($connect, "DELETE FROM Products WHERE `Products`.`id_Product` = '$id_Product'");
    header('Location: ../Producti.php');
