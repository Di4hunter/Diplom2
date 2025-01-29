<?php
require_once 'config/connect.php';

// Запрос к таблице Orders
$sqlOrders = "SELECT id_Orders, Date, id_Customers, Status FROM Orders";
$resultOrders = mysqli_query($connect, $sqlOrders);
$orders = mysqli_fetch_all($resultOrders, MYSQLI_ASSOC);

// Запрос к таблице Sale
$sqlSale = "SELECT id_Sale, id_Orders, id_Product, Quantity, Price FROM Sale";
$resultSale = mysqli_query($connect, $sqlSale);
$sales = mysqli_fetch_all($resultSale, MYSQLI_ASSOC);

// Код удаления строки таблицы
if (isset($_GET['id_Categories'])) {
    $id_Categories = $_GET['id_Categories'];
    mysqli_query($connect, "DELETE FROM Categories WHERE id_Categories = '$id_Categories'");
    header('Location: Categories.php'); // Перенаправляем обратно на ту же страницу после удаления
    exit(); // Для предотвращения дальнейшего выполнения кода после перенаправления
}
?>

<style>
    .table-container {
        display: flex;
        justify-content: space-between;
    }

    .table-container table {
        width: 48%;
    }

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

    <title>Заказы и Продажи</title>
</head>

<body>

    <!-- NAV -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ff4949;">
        <div class="container-fluid">
            <a class="navbar-brand active" aria-current="page" href="index.php">М.Видео</a>
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
                        <a class="nav-link" href="Proizvod.php">Производитель</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Klienti.php">Клиенты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Ordersale.php">Заказы и продажи</a>
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

    <div class="bd-main-margin">
        <h2>Заказы</h2>
        <table class="table table-bordered" style="background-color: #ededed;">
            <thead>
                <tr>
                    <th scope="col">ID Заказа</th>
                    <th scope="col">Дата</th>
                    <th scope="col">ID Покупателя</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Изменить статус</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>
                            <?= $order['id_Orders'] ?>
                        </td>
                        <td>
                            <?= $order['Date'] ?>
                        </td>
                        <td>
                            <?= $order['id_Customers'] ?>
                        </td>
                        <td>
                            <?= $order['Status'] ?>
                        </td>
                        <td>
                            <?php if ($order['Status'] != 'Готов'): ?>
                                <form action="change_status.php" method="post">
                                    <input type="hidden" name="id_Orders" value="<?= $order['id_Orders'] ?>">
                                    <input type="hidden" name="new_status" value="Собирается">
                                    <button type="submit" class="btn btn-primary">Собирается</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Вывод данных из таблицы Sale -->
    <div class="bd-main-margin">
        <h2>Продажи</h2>
        <table class="table table-bordered" style="background-color: #ededed;">
            <thead>
                <tr>
                    <th scope="col">ID Продажи</th>
                    <th scope="col">ID Заказа</th>
                    <th scope="col">ID Товара</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Изменить статус</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $sale): ?>
                    <tr>
                        <td>
                            <?= $sale['id_Sale'] ?>
                        </td>
                        <td>
                            <?= $sale['id_Orders'] ?>
                        </td>
                        <td>
                            <?= $sale['id_Product'] ?>
                        </td>
                        <td>
                            <?= $sale['Quantity'] ?>
                        </td>
                        <td>
                            <?= $sale['Price'] ?>
                        </td>
                        <td>
                            <form action="change_status.php" method="post">
                                <input type="hidden" name="id_Orders" value="<?= $sale['id_Orders'] ?>">
                                <input type="hidden" name="new_status" value="Готов">
                                <button type="submit" class="btn btn-primary">Готов</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>

</html>