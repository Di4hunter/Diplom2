<?php
    require_once '../config/connect.php';  
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];


    mysqli_query($connect, "INSERT INTO `Manufacturers` (`id_Manufacturers`, `Name`, `Description`) 
    VALUES (NULL, '$Name', '$Description')");
    
    header('Location: ../Proizvod.php');


