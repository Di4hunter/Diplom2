<?php
require_once 'config/connect.php';
$Manufacturers = mysqli_query($connect, "SELECT * FROM `Manufacturers`");
$Manufacturers = mysqli_fetch_all($Manufacturers);

// Код удаления строки таблицы
if (isset($_GET['id_Manufacturers'])) {
    $id_Manufacturers = $_GET['id_Manufacturers'];
    mysqli_query($connect, "DELETE FROM Manufacturers WHERE id_Manufacturers = '$id_Manufacturers'");
    header('Location: Proizvod.php'); // Перенаправляем обратно на ту же страницу после удаления
    exit(); // Для предотвращения дальнейшего выполнения кода после перенаправления
}
?>

<style>
    .bd-main-margin {
        padding: 1.5rem;
        margin-right: 0;
        margin-left: 0;
        border-width: 1px;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
            integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

        <title>Производитель</title>
    </head>

<body>

    <!-- NAV -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ff4949;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">М.Видео</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                        <a class="nav-link" href="Categories.php">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Producti.php">Товары</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Proizvod.php">Производитель</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Klienti.php">Клиенты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Ordersale.php">Заказы и продажи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Deliveries.php">Прием товара</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Sitep.php">Оформление заказа</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--  -->
    <div class="bd-main-margin">
        <table class="table table-bordered" style="background-color: #ededed;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>

                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <?php
            foreach ($Manufacturers as $item) {
                ?>
                <tr>
                    <th scope="row">
                        <?= $item[0] ?>
                    </th>
                    <td>
                        <?= $item[1] ?>
                    </td>
                    <td>
                        <?= $item[2] ?>
                    </td>

                    <td> <a class="list-group-item list-group-item-action list-group-item-warning"
                            href="updateM.php?id_Manufacturers=<?= $item[0] ?>">&#9998;</a> </td>
                    <td> <a class="list-group-item list-group-item-action list-group-item-danger"
                            href="?id_Manufacturers=<?= $item[0] ?>">&#10006;</a> </td>
                </tr>
                <?php
            }
            ?>

        </table>
    </div>


    <!--  -->
    <div class="bd-main-margin">
        <div class="bd-main-margin" style="background-color: #ededed;">
            <form action="Manufact/create.php" method="post">
                <div class="mb-3">
                    <label for="exampleInput1" class="form-label">Название</label>
                    <input type="text" class="form-control" id="exampleInput1" name="Name">
                </div>
                <div class="mb-3">
                    <label for="exampleInput2" class="form-label">Описание</label>
                    <textarea type="text" class="form-control" id="exampleInput2" name="Description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>

    <!-- BOOTSTRAP SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

</body>

</html>