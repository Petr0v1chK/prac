<?php
include "../includes/header.php";
include "../function/function.php";

if (!isset($_SESSION['login'])) {
    header("Location: /login.php");
    exit;
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <h1 class="display-5 fw-bold text-primary mb-4">Личный кабинет</h1>
            <hr class="mb-5" style="border-top: 4px solid #0033a0; width: 90px;">

            <div class="alert alert-info">
                Добро пожаловать, <strong><?= htmlspecialchars($_SESSION['login']) ?></strong>!
            </div>

            <h4 class="mt-5 mb-3">Ваши заявки</h4>
            <?= fnOutCardProfile($_SESSION['login']) ?>

            <div class="mt-4">
                <a href="/application/" class="btn btn-primary btn-lg">
                    Подать новую заявку
                </a>
            </div>

        </div>
    </div>
</div>

<?php 
include "../includes/footer.php"; 
?>