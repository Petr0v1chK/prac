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

            <h1 class="display-5 fw-bold text-primary mb-4">Сообщения из формы «Обратная связь»</h1>
            <hr class="mb-5" style="border-top: 4px solid #0033a0; width: 100px;">

            <div class="mb-4">
                <a href="/admin/" class="btn btn-secondary">
                    ← Вернуться к заявкам
                </a>
            </div>

            <?= fnOutFeedbackAdmin() ?>

        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>