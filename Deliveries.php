<?php

// Функция подключения к базе данных
function connectDB()
{
    $connect = mysqli_connect('localhost', 'root', '', 'Test');
    if (!$connect) {
        die('Ошибка подключения к БД');
    }
    return $connect;
}

// Функция начала приемки
function startDelivery($provider)
{
    $connect = connectDB();
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO Deliveries (Date, Provider) VALUES ('$date', '$provider')";
    mysqli_query($connect, $query);
    return mysqli_insert_id($connect);
}

// Функция добавления товара в поставку
function addProductToDelivery($id_delivery, $id_product, $amount)
{
    $connect = connectDB();
    $price = getProductPrice($id_product);
    $query = "INSERT INTO Deliveries (id_Delivery, id_Product, Amount, Price) 
                VALUES ($id_delivery, $id_product, $amount, $price)";
    mysqli_query($connect, $query);
    updateProductAmount($id_product, $amount);
}

// Функция получения цены товара
function getProductPrice($id_product)
{
    $connect = connectDB();
    $query = "SELECT Price FROM Products WHERE id_Product = $id_product";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['Price'];
}

// Функция обновления количества товара на складе
function updateProductAmount($id_product, $amount)
{
    $connect = connectDB();
    $query = "UPDATE Products SET Amount = Amount + $amount WHERE id_Product = $id_product";
    mysqli_query($connect, $query);
}


// Функция завершения приемки
function finishDelivery($id_delivery)
{
    // ... 
}

// ...

// Обработка действий пользователя
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'start_delivery':
            $provider = $_POST['provider'];
            $id_delivery = startDelivery($provider);
            // ...
            break;
        case 'add_product':
            $id_delivery = $_POST['id_delivery'];
            $id_product = $_POST['id_product'];
            $amount = $_POST['amount'];
            addProductToDelivery($id_delivery, $id_product, $amount);
            // ...
            break;
        case 'finish_delivery':
            $id_delivery = $_POST['id_delivery'];
            finishDelivery($id_delivery);
            // Перенаправление на страницу с 
            // списком поставок
            header('Location: deliveries.php');
            break;
    }
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
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <title>Приемка товара</title>
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
                        <a class="nav-link" href="Proizvod.php">Производитель</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="Klienti.php">Клиенты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Ordersale.php">Заказы и продажи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Deliveries.php">Прием товара</a>
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
        <div class="bd-main-margin" style="background-color: #ededed;">
            <h1>Приемка товара</h1>

            <form method="post">
                <input type="hidden" name="action" value="start_delivery">
                <label for="exampleInput1" class="form-label">Поставщик</label>
                <input type="text" class="form-control" name="provider">
                <br>
                <button type="submit" class="btn btn-primary">Начать приемку</button>
            </form>

            <?php if ($deliveries): ?>
                <table>
                    <tr>
                        <th>id_Delivery</th>
                        <th>Дата</th>
                        <th>Поставщик</th>
                        <th>Кол-во товаров</th>
                        <th>Сумма</th>
                    </tr>
                    <?php foreach ($deliveries as $delivery): ?>
                        <tr>
                            <td>
                                <?php echo $delivery['id_Delivery']; ?>
                            </td>
                            <td>
                                <?php echo $delivery['Date']; ?>
                            </td>
                            <td>
                                <?php echo $delivery['Provider']; ?>
                            </td>
                            <td>
                                <?php echo $delivery['total_amount']; ?>
                            </td>
                            <td>
                                <?php echo $delivery['total_price']; ?>
                            </td>
                            <td>
                                <a href="delivery_details.php?id_delivery=<?php echo $delivery['id_Delivery']; ?>">Подробнее</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>

            <?php if (isset($id_delivery)): ?>
                <br>
                <form method="post" class="row g-3">

                    <input type="hidden" name="action" value="add_product">
                    <input type="hidden" name="id_delivery" value="<?php echo $id_delivery; ?>">
                    <div class="col-md-4">
                        <label for="exampleInput1" class="form-label">ID Product</label>
                        <input type="text" class="form-control" name="id_product">
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInput1" class="form-label">Количество</label>
                        <input type="text" class="form-control" name="amount">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
                <br>
                <br>
                <form method="post">
                    <input type="hidden" name="action" value="finish_delivery">
                    <input type="hidden" name="id_delivery" value="<?php echo $id_delivery; ?>">
                    <button type="submit" class="btn btn-primary">Завершить приемку</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>