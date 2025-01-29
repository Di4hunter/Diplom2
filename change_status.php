<?php
require_once 'config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_Orders = $_POST['id_Orders'];
    $new_status = $_POST['new_status'];

    // Обновляем статус заказа
    $update_query = "UPDATE Orders SET Status = '$new_status' WHERE id_Orders = $id_Orders";
    mysqli_query($connect, $update_query);

    if ($new_status == 'Готов') {
        // Получаем данные о продажах для этого заказа
        $sales_query = "SELECT id_Product, Quantity FROM Sale WHERE id_Orders = $id_Orders";
        $sales_result = mysqli_query($connect, $sales_query);
        $sales = mysqli_fetch_all($sales_result, MYSQLI_ASSOC);

        // Обновляем остатки товаров
        foreach ($sales as $sale) {
            $id_Product = $sale['id_Product'];
            $quantity = $sale['Quantity'];

            // Вычитаем количество проданного товара из остатков
            $update_product_query = "UPDATE Products SET Amount = Amount - $quantity WHERE id_Product = $id_Product";
            mysqli_query($connect, $update_product_query);
        }
    }
}

header('Location: Ordersale.php'); // Перенаправляем обратно на ту же страницу после обновления статуса
exit();
?>