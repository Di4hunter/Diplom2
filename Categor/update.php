<?php
    require_once '../config/connect.php'; 
    $id_Categories = $_POST['id_Categories'];
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];

    mysqli_query($connect, "UPDATE `Categories` SET `id_Categories` = '$id_Categories', `Name` = '$Name',  `Description` = '$Description'  WHERE `Categories`.`id_Categories` = '$id_Categories'");

    header('Location: ../Categories.php');
