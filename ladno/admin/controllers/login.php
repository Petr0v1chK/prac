<?php
session_start();
include "../../includes/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login    = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (empty($login) || empty($password)) {
        header("Location: /login.php?error=Заполните все поля");
        exit;
    }

    $login = $connect->real_escape_string($login);
    $password = $connect->real_escape_string($password);

    $sql = "SELECT u.login, u.password, r.name AS role 
            FROM user u 
            JOIN role r ON u.id_role = r.id_role 
            WHERE u.login = '$login' AND u.password = '$password'";

    $result = $connect->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $_SESSION['login'] = $user['login'];
        $_SESSION['role']  = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: /admin/");
        } else {
            header("Location: /profile/");
        }
        exit;
    }

    header("Location: /login.php?error=Неверный логин или пароль");
    exit;
} else {
    header("Location: /login.php");
    exit;
}
?>