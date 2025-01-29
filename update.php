<?php
    require_once 'config/connect.php';
    $products_id = $_GET ['id_Product'];
    $Product = mysqli_query($connect, "SELECT * FROM `Products` WHERE `id_Product` = '$products_id' ");
    $Product = mysqli_fetch_assoc($Product);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Обновить товар</title>

</head>
<body>

<h2>Обновить товар </h2>
    <form action = "Vendor/update.php" method="post">
        <input type= "hidden" name="id_Product" value="<?= $products_id ?>">
        <p>название </p>
        <input type= "text" name="Name" value="<?= $Product['Name'] ?>">
        <p>описание</p>
        <textarea name= "Description" ><?= $Product['Description'] ?></textarea>
        <p>цена</p>
        <input type= "number" name="Price" value="<?= $Product['Price'] ?>">
        <p>количество</p>
        <input type= "number" name="Amount" value="<?= $Product['Amount'] ?>">
        <p>id_категория</p>
        <input type= "number" name="id_Categories" value="<?= $Product['id_Categories'] ?>">
        <p>id_производитель</p>
        <input type= "number" name="id_Manufacturers" value="<?= $Product['id_Manufacturers'] ?>">
        <p>изображение</p>
        <input type= "file" name="Picture" value="<?= $Product['Picture'] ?>">
        <p>гарантия</p>
        <input type= "number" name="Warranty" value="<?= $Product['Warranty'] ?>">
        <button type ="submit"> Обновить</button>
    </form>   

</body>
</html>