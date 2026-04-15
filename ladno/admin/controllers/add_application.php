<?php
session_start();
include "../../includes/connect.php";

if (!isset($_SESSION['login'])) {
    header("Location: /login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = $connect->query("SELECT id_user FROM user WHERE login = '{$_SESSION['login']}'")->fetch_assoc();
    $status = $connect->query("SELECT id_status FROM status WHERE code = 'new'")->fetch_assoc();

    $address     = $connect->real_escape_string(trim($_POST['address']));
    $phone       = $connect->real_escape_string(trim($_POST['phone']));
    $date        = $connect->real_escape_string($_POST['date']);
    $time        = $connect->real_escape_string($_POST['time']);
    $service_id  = (int)$_POST['category'];
    $description = $connect->real_escape_string(trim($_POST['description'] ?? ''));

    $sql = "INSERT INTO application 
            (id_user, id_service, id_status, description, date, time, phone, address) 
            VALUES 
            ({$user['id_user']}, $service_id, {$status['id_status']}, '$description', '$date', '$time', '$phone', '$address')";

    if ($connect->query($sql)) {
        header("Location: /profile/?success=Заявка успешно отправлена");
        exit;
    } else {
        header("Location: /application/?error=Ошибка при создании заявки");
        exit;
    }
} else {
    header("Location: /application/");
    exit;
}
?>