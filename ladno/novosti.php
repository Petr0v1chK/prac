<?php
$page_title = "Новости";
require_once __DIR__ . '/includes/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <!-- Заголовок страницы -->
            <h1 class="display-5 fw-bold text-primary mb-4">Новости</h1>
            <hr class="mb-5" style="border-top: 3px solid #0033a0; width: 80px;">

            <!-- Первая новость -->
            <div class="news-card mb-4 p-4 bg-white shadow-sm rounded">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="fw-bold">Металл-Экспо 2024</h5>
                    </div>
                    <div class="text-primary fw-bold">01.11.2024</div>
                </div>
                <p class="mt-3 mb-0">
                    Решением оргкомитета международного промышленного форума КУМЗ награждён медалями 
                    за инновационную технологию и за книгу о заводе.
                </p>
            </div>

            <!-- Вторая новость -->
            <div class="news-card p-4 bg-white shadow-sm rounded">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="fw-bold">Договор</h5>
                    </div>
                    <div class="text-primary fw-bold">30.10.2024</div>
                </div>
                <p class="mt-3 mb-0">
                    Для производства судов на подводных крыльях. 30 октября на полях международного 
                    промышленного форума «Металл-Экспо 2024» состоялось подписание Договора о долгосрочном партнёрстве.
                </p>
            </div>

        </div>
    </div>
</div>

<?php 
require_once __DIR__ . '/includes/footer.php'; 
?>