<?php
// Подключение к базе данных
$connect = mysqli_connect('localhost', 'root', '', 'Test');
if (!$connect) {
    die('Ошибка подключения к БД');
}

// Получение списка товаров
$products = mysqli_query($connect, "SELECT * FROM Products");

// Получение списка покупателей
$customers = mysqli_query($connect, "SELECT * FROM Customers");

// Обработка формы заказа
if (isset($_POST['submit'])) {
    // Получение данных из формы
    $id_product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $id_customer = $_POST['customer'];

    // Проверка на пустые поля
    if (empty($id_product) || empty($quantity) || empty($id_customer)) {
        echo '<p style="color: red;">Все поля обязательны для заполнения!</p>';
        exit;
    }

    // Получение информации о товаре
    $product_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM Products WHERE id_Product = $id_product"));

    // Расчет суммы заказа
    $total_price = $product_info['Price'] * $quantity;

    // Формирование данных для заказа
    $order_data = [
        'Date' => date('Y-m-d H:i:s'),
        'id_Customers' => $id_customer,
        'Status' => 'В обработке',
    ];

    // Добавление заказа в базу данных
    mysqli_query($connect, "INSERT INTO Orders (Date, id_Customers, Status) VALUES ('" . implode("', '", $order_data) . "')");
    $id_order = mysqli_insert_id($connect);

    // Добавление товара в заказ
    mysqli_query($connect, "INSERT INTO Sale (id_Orders, id_Product, Quantity, Price) VALUES ($id_order, $id_product, $quantity, $total_price)");

    // Сообщение об успешном оформлении заказа
    echo '<p style="color: green;">Заказ успешно оформлен!</p>';
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

    <title>Оформление заказа</title>
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
                        <a class="nav-link" href="Klienti.php">Клиенты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Ordersale.php">Заказы и продажи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Deliveries.php">Прием товара</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Sitep.php">Оформление заказа</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!--  -->
    <div class="bd-main-margin">
        <div class="bd-main-margin" style="background-color: #ededed;">
            <h1>Оформление заказа</h1>
            <form method="post">
                <div class="mb-3">
                    <label for="product" class="form-label">Выберите товар:</label>
                    <select name="product" class="form-control" id="product">
                        <?php while ($product = mysqli_fetch_assoc($products)): ?>
                            <option value="<?php echo $product['id_Product']; ?>">
                                <?php echo $product['Name']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Введите количество:</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" min="1">
                </div>
                <div class="mb-3">
                    <label for="customer" class="form-label">Выберите покупателя:</label>
                    <select name="customer" class="form-control" id="customer">
                        <?php while ($customer = mysqli_fetch_assoc($customers)): ?>
                            <option value="<?php echo $customer['id_Customers']; ?>">
                                <?php echo $customer['Name'] . ' ' . $customer['Surname']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Оформить заказ">
            </form>
        </div>
    </div>



</body>

</html>