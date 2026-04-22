<?php
include "../../includes/header.php";
include "../../function/function.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: /login.php");
    exit;
}

if (isset($_GET['success'])) {
    echo '<div class="alert alert-success text-center">Новость успешно добавлена!</div>';
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="display-5 fw-bold text-primary mb-4">Добавить новость</h1>
            <hr class="mb-5" style="border-top: 4px solid #0033a0;">

            <div class="card">
                <div class="card-body p-5">
                    <<form action="/admin/controllers/news_add.php" method="POST" enctype="multipart/form-data">>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Заголовок новости</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Дата</label>
                            <input type="date" name="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Текст новости</label>
                            <textarea name="text" class="form-control" rows="10" required></textarea>
                        </div>

                        <div class="mb-4">
    <label class="form-label fw-bold">Фотография к новости</label>
    <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
    <small class="text-muted">Рекомендуемый размер: 1200×800 px. Форматы: JPG, PNG, WebP</small>
</div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">Опубликовать новость</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../../includes/footer.php"; ?>