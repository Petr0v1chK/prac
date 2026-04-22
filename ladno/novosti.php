<?php
$page_title = "Новости";
require_once __DIR__ . '/includes/header.php';
include __DIR__ . '/function/function.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <div class="text-end mt-4">
        <a href="/admin/news/" class="btn btn-warning">
            ✏️ Редактировать новости (админ)
        </a>
    </div>
<?php endif; ?>

            <!-- Заголовок страницы -->
            <h1 class="display-5 fw-bold text-primary mb-4">Новости</h1>
            <hr class="mb-5" style="border-top: 3px solid #0033a0; width: 80px;">

            <?= fnOutNews() ?>

        </div>
    </div>
</div>

<?php 
require_once __DIR__ . '/includes/footer.php'; 
?>