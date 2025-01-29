<?php
    require_once '../config/connect.php';  
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    $Amount = $_POST['Amount'];
    $id_Categories = $_POST['id_Categories'];
    $id_Manufacturers = $_POST['id_Manufacturers'];
    $Warranty = $_POST['Warranty'];

    mysqli_query($connect, "INSERT INTO `Products` (`id_Product`, `Name`, `Description`, `Price`, `Amount`, `id_Categories`, `id_Manufacturers`, `Warranty`) 
    VALUES (NULL, '$Name', '$Description', '$Price', '$Amount', '$id_Categories', '$id_Manufacturers', '$Warranty')");
    
    header('Location: ../Producti.php');
?>

