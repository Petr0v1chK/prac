<?php
include "../includes/header.php";
include "../function/function.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: /login.php");
    exit;
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <h1 class="display-5 fw-bold text-primary mb-4">Панель администратора КУМЗ</h1>
            <hr class="mb-5" style="border-top: 4px solid #0033a0; width: 100px;">

            <!-- Кнопка управления новостями -->
            <div class="mb-5">
                <a href="/admin/news/" class="btn btn-info btn-lg px-5 py-3">
                    <i class="bi bi-newspaper me-2"></i> Управление новостями
                </a>
            </div>

            <h4 class="mb-4">Все заявки клиентов</h4>

            <?= fnOutCardAdmin() ?>

        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>