<?php
    require_once '../config/connect.php';  
    $Name = $_POST['Name'];
    $Surname = $_POST['Surname'];
    $Email = $_POST['Email'];
    $Phone_number = $_POST['Phone_number'];
    $Address = $_POST['Address'];


    mysqli_query($connect, "INSERT INTO `Customers` (`id_Customers`, `Name`, `Surname`, `Email`, `Phone_number`, `Address`) 
    VALUES (NULL, '$Name', '$Surname', '$Email', '$Phone_number', '$Address')");
    
    header('Location: ../Klienti.php');


