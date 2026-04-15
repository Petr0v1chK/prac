<?php 
session_start(); 
include __DIR__ . "/connect.php";

$menu = "";
if (isset($_SESSION['login'])) {
    if ($_SESSION['role'] == "admin") {
        $menu .= '<li class="nav-item"><a class="nav-link" href="/admin/">Админ-панель</a></li>';
    }
    $menu .= '
    <li class="nav-item"><a class="nav-link" href="/profile/">Личный кабинет</a></li>
    <li class="nav-item"><a class="nav-link" href="/admin/controllers/logout.php">Выйти</a></li>';
} else {
    $menu = '
    <li class="nav-item"><a class="nav-link" href="/login.php">Вход</a></li>
    <li class="nav-item"><a class="nav-link" href="/register/">Регистрация</a></li>';
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каменск-Уральский металлургический завод</title>
    
    <link rel="stylesheet" href="/assets/bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/style/style.css">
    
    <script src="/assets/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        .top-bar {
            background: #f8f9fa;
            padding: 8px 0;
            font-size: 0.9rem;
            color: #555;
        }
        .main-nav {
            background: #0033a0; /* фирменный синий КУМЗ */
        }
        .navbar-brand {
            font-weight: 700;
            color: white !important;
        }
        .hero {
            background: linear-gradient(rgba(0, 51, 160, 0.85), rgba(0, 51, 160, 0.85)),
                        url('https://source.unsplash.com/random/1600x650/?metal,industry,aluminum') center/cover;
            color: white;
            padding: 130px 0 110px;
            text-align: center;
        }
    </style>
</head>
<body>
<!-- Шапка с логотипом -->
<header class="bg-white shadow-sm py-3">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <!-- Логотип (замени на свой реальный файл) -->
            <img src="/assets/images/logo-kumz.png" alt="Логотип КУМЗ" height="68" class="me-3">
            <div>
                <strong style="color:#0033a0; font-size:1.25rem;">Каменск-Уральский</strong><br>
                <span style="color:#0033a0;">металлургический завод</span>
            </div>
        </div>
</header>

<!-- Основная навигация -->
<nav class="main-nav navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="/">Главная страница</a></li>
                <li class="nav-item"><a class="nav-link" href="/o-kompanii.php">О компании</a></li>
                <li class="nav-item"><a class="nav-link" href="/novosti.php">Новости</a></li>
                <li class="nav-item"><a class="nav-link" href="/obratnaya-svyaz.php">Обратная связь</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Поставщикам</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Заказчикам</a></li>
                <?= $menu ?>
            </ul>
        </div>
    </div>
</nav>