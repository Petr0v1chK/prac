<?php
$page_title = "Главная";
require_once __DIR__ . '/includes/header.php';
?>

<div class="hero text-white text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">
            Каменск-Уральский металлургический завод
        </h1>
        <p class="lead fs-4 mb-0">
            Производство высокотехнологичной продукции из алюминиевых и магниевых сплавов
        </p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 text-center">
            <h2 class="mb-4">Добро пожаловать на официальный сайт АО «КУМЗ»</h2>
            <p class="lead">
                Мы являемся традиционным поставщиком изделий из алюминиевых, алюминиевых 
                и магниевых сплавов для ведущих предприятий России и зарубежья.
            </p>
            <a href="/o-kompanii.php" class="btn btn-primary btn-lg mt-4">
                Подробнее о компании
            </a>
        </div>
    </div>
</div>

<?php 
require_once __DIR__ . '/includes/footer.php'; 
?>