<?php
    require_once 'config/connect.php';
    $klient_id = $_GET ['id_Customers'];
    $Customers = mysqli_query($connect, "SELECT * FROM `Customers` WHERE `id_Customers` = '$klient_id' ");
    $Customers = mysqli_fetch_assoc($Customers);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Обновить данные клиента</title>

</head>
<body>

<h2>Обновить клиента </h2>
    <form action = "People/update.php" method="post">
        <input type= "hidden" name="id_Customers" value="<?= $klient_id ?>">
        <p>Имя </p>
        <input type= "text" name="Name" value="<?= $Customers['Name'] ?>">
        <p>Фамилия</p>
        <input type= "text" name="Surname" value="<?= $Customers['Surname'] ?>">
        <p>Email</p>
        <input type= "text" name="Email" value="<?= $Customers['Email'] ?>">
        <p>Номер телефона</p>
        <input type= "number" name="Phone_number" value="<?= $Customers['Phone_number'] ?>">
        <p>Адресс</p>
        <textarea name= "Address" ><?= $Customers['Address'] ?></textarea>
        <button type ="submit"> Обновить</button>
    </form>   

</body>
</html>