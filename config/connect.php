<?php
    $connect = mysqli_connect('localhost', 'root', '', 'Test');
    if(!$connect) {
        die('ошибка подключения к БД');
    }
?>