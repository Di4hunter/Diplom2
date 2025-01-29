<?php
    require_once '../config/connect.php'; 
    $id_Customers = $_POST['id_Customers'];
    $Name = $_POST['Name'];
    $Surname = $_POST['Surname'];
    $Email = $_POST['Email'];
    $Phone_number = $_POST['Phone_number'];
    $Address = $_POST['Address'];

    mysqli_query($connect, "UPDATE `Customers` SET `id_Customers` = '$id_Customers', `Name` = '$Name', `Surname` = '$Surname', `Email` = '$Email', `Phone_number` = '$Phone_number', `Address` = '$Address'  WHERE `Customers`.`id_Customers` = '$id_Customers'");

    header('Location: ../Klienti.php');
