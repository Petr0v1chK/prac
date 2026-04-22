<?php
session_start();
include "../../includes/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $surname    = trim($_POST['surname']);
    $name       = trim($_POST['name']);
    $patronymic = trim($_POST['patronymic']);
    $login      = trim($_POST['login']);
    $phone      = trim($_POST['phone']);
    $email      = trim($_POST['email']);
    $password   = trim($_POST['password']);

    if (empty($surname) || empty($name) || empty($login) || empty($password)) {
        header("Location: /register/?error=Заполните обязательные поля");
        exit;
    }

    // Проверка существования логина
    $login_esc = $connect->real_escape_string($login);
    $check = $connect->query("SELECT id_user FROM user WHERE login = '$login_esc'");

    if ($check->num_rows > 0) {
        header("Location: /register/?error=Пользователь с таким логином уже существует");
        exit;
    }

    // Получаем ID роли пользователя
    $role_result = $connect->query("SELECT id_role FROM role WHERE name = 'user'");
    $role = $role_result->fetch_assoc();
    $id_role = $role['id_role'];

    // === ХЕШИРОВАНИЕ ПАРОЛЯ ===
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Экранирование данных
    $surname    = $connect->real_escape_string($surname);
    $name       = $connect->real_escape_string($name);
    $patronymic = $connect->real_escape_string($patronymic);
    $phone      = $connect->real_escape_string($phone);
    $email      = $connect->real_escape_string($email);

    $sql = "INSERT INTO user (surname, name, patronymic, login, phone, email, password, id_role) 
            VALUES ('$surname', '$name', '$patronymic', '$login_esc', '$phone', '$email', '$hashed_password', $id_role)";

    if ($connect->query($sql)) {
        $_SESSION['login'] = $login_esc;
        $_SESSION['role']  = 'user';
        header("Location: /profile/?success=Регистрация прошла успешно");
        exit;
    } else {
        header("Location: /register/?error=Ошибка при регистрации");
        exit;
    }

} else {
    header("Location: /register/");
    exit;
}
?>