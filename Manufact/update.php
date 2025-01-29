<?php
    require_once '../config/connect.php'; 
    $id_Manufacturers = $_POST['id_Manufacturers'];
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];

    mysqli_query($connect, "UPDATE `Manufacturers` SET `id_Manufacturers` = '$id_Manufacturers', `Name` = '$Name',  `Description` = '$Description'  WHERE `Manufacturers`.`id_Manufacturers` = '$id_Manufacturers'");

    header('Location: ../Proizvod.php');
