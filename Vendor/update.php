<?php
    require_once '../config/connect.php'; 
    $id_Product = $_POST['id_Product'];
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    $Amount = $_POST['Amount'];
    $id_Categories = $_POST['id_Categories'];
    $id_Manufacturers = $_POST['id_Manufacturers'];
    $Warranty = $_POST['Warranty'];

    mysqli_query($connect, "UPDATE `Products` SET `id_Product` = '$id_Product', `Name` = '$Name', `Description` = '$Description', `Price` = '$Price', `Amount` = '$Amount', `id_Categories` = '$id_Categories', `id_Manufacturers` = '$id_Manufacturers', `Warranty` = '$Warranty' WHERE `Products`.`id_Product` = '$id_Product'");

    header('Location: ../Producti.php');
