<?php
    require_once 'config/connect.php';
    $cat_id = $_GET ['id_Categories'];
    $Categories = mysqli_query($connect, "SELECT * FROM `Categories` WHERE `id_Categories` = '$cat_id' ");
    $Categories = mysqli_fetch_assoc($Categories);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Обновить данные категории</title>

</head>
<body>

<h2>Обновить информацию </h2>
    <form action = "Categor/update.php" method="post">
        <input type= "hidden" name="id_Categories" value="<?= $cat_id ?>">
        <p>Имя </p>
        <input type= "text" name="Name" value="<?= $Categories['Name'] ?>">
        <p>Адресс</p>
        <textarea name= "Description" ><?= $Categories['Description'] ?></textarea>
        <button type ="submit"> Обновить</button>
    </form>   

</body>
</html>