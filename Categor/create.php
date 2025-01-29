<?php
    require_once '../config/connect.php';  
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];


    mysqli_query($connect, "INSERT INTO `Categories` (`id_Categories`, `Name`, `Description`) 
    VALUES (NULL, '$Name', '$Description')");
    
    header('Location: ../Categories.php');


