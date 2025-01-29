<?php
    require_once 'config/connect.php';
    $man_id = $_GET ['id_Manufacturers'];
    $Manufacturers = mysqli_query($connect, "SELECT * FROM `Manufacturers` WHERE `id_Manufacturers` = '$man_id' ");
    $Manufacturers = mysqli_fetch_assoc($Manufacturers);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Обновить данные производства</title>

</head>
<body>

<h2>Обновить информацию </h2>
    <form action = "Manufact/update.php" method="post">
        <input type= "hidden" name="id_Manufacturers" value="<?= $man_id ?>">
        <p>Имя </p>
        <input type= "text" name="Name" value="<?= $Manufacturers['Name'] ?>">
        <p>Адресс</p>
        <textarea name= "Description" ><?= $Manufacturers['Description'] ?></textarea>
        <button type ="submit"> Обновить</button>
    </form>   

</body>
</html>