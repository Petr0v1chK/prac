<?php
$connect = new mysqli("localhost", "root", "", "db_demo_2025");
if ($connect->connect_error) {
    die("Ошибка подключения: " . $connect->connect_error);
}
$connect->set_charset("utf8mb4");
?>