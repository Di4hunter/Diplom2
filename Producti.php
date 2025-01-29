<?php
require_once 'config/connect.php';
$Products = mysqli_query($connect, "SELECT Products.id_Product, Products.Name, Products.Description, Products.Price, Products.Amount, Categories.Name AS CategoryName, Manufacturers.Name AS ManufacturerName, Products.Warranty FROM Products
INNER JOIN Categories ON Products.id_Categories = Categories.id_Categories
INNER JOIN Manufacturers ON Products.id_Manufacturers = Manufacturers.id_Manufacturers");
$Products = mysqli_fetch_all($Products);

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <!--
        <link rel="stylesheet" href="main.css">
        -->
    <!--
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/left-nav-style.css">    
        -->

    <title>Товары</title>
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
                        <a class="nav-link active" href="Producti.php">Товары</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Proizvod.php">Производитель</a>
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
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Производитель</th>
                    <th scope="col">Гарантия</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <?php
            foreach ($Products as $item) {
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
                    <td>
                        <?= $item[3] ?>
                    </td>
                    <td>
                        <?= $item[4] ?>
                    </td>
                    <td>
                        <?= $item[5] ?>
                    </td>
                    <td>
                        <?= $item[6] ?>
                    </td>
                    <td>
                        <?= $item[7] ?>
                    </td>
                    <td> <a class="list-group-item list-group-item-action list-group-item-warning"
                            href="update.php?id_Product=<?= $item[0] ?>">&#9998;</a> </td>
                    <td> <a class="list-group-item list-group-item-action list-group-item-danger"
                            href="Vendor/delete.php?id_Product=<?= $item[0] ?>">&#10006;</a> </td>
                </tr>
                <?php
            }
            ?>

        </table>
    </div>

    <!--  -->
    <div class="bd-main-margin">
        <div class="bd-main-margin" style="background-color: #ededed;">
            <form action="vendor/create.php" method="post">
                <div class="mb-3">
                    <label for="exampleInput1" class="form-label">Название</label>
                    <input type="text" class="form-control" id="exampleInput1" name="Name">
                </div>
                <div class="mb-3">
                    <label for="exampleInput2" class="form-label">Описание</label>
                    <textarea type="text" class="form-control" id="exampleInput2" name="Description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInput3" class="form-label">Цена</label>
                    <input type="number" class="form-control" id="exampleInput3" name="Price">
                </div>
                <div class="mb-3">
                    <label for="exampleInput4" class="form-label">Количество</label>
                    <input type="number" class="form-control" id="exampleInput4" name="Amount">
                </div>
                <div class="mb-3">
                    <label for="exampleInput5" class="form-label">ID Категории</label>
                    <input type="number" class="form-control" id="exampleInput5" name="id_Categories">
                </div>
                <div class="mb-3">
                    <label for="exampleInput6" class="form-label">ID Производитель</label>
                    <input type="number" class="form-control" id="exampleInput6" name="id_Manufacturers">
                </div>
                <div class="mb-3">
                    <label for="exampleInput7" class="form-label">Гарантия</label>
                    <input type="number" class="form-control" id="exampleInput7" name="Warranty">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>

    <!-- 
        <div>
            <h2>Добавить новый товар </h2>
            <form action="vendor/create.php" method="post">
                <p>название </p>
                <input type="text" name="Name">

                <p>описание</p>
                <textarea name="Description"></textarea>

                <p>цена</p>
                <input type="number" name="Price">

                <p>количество</p>
                <input type="number" name="Amount">

                <p>id_категория</p>
                <input type="number" name="id_Categories">

                <p>id_производитель</p>
                <input type="number" name="id_Manufacturers">

                <p>гарантия</p>
                <input type="number" name="Warranty">

                <button type="submit"> Добавить</button>
            </form>
        </div>
        -->

    <!-- BOOTSTRAP SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

</body>

</html>