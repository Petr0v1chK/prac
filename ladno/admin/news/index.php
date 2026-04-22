<?php
include "../../includes/header.php";
include "../../function/function.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: /login.php");
    exit;
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="display-5 fw-bold text-primary mb-0">Управление новостями</h1>
                <a href="/admin/news/add.php" class="btn btn-success btn-lg">+ Добавить новость</a>
            </div>

            <hr class="mb-5" style="border-top: 4px solid #0033a0; width: 100px;">

            <?= fnOutNewsAdmin() ?>

            <div class="mt-4">
                <a href="/admin/" class="btn btn-secondary">← Вернуться в админ-панель</a>
            </div>

        </div>
    </div>
</div>

<?php include "../../includes/footer.php"; ?>