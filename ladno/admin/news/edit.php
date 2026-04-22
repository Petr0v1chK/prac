<?php
include "../../includes/header.php";
include "../../function/function.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: /login.php");
    exit;
}

$id = (int)($_GET['id'] ?? 0);
if (!$id) {
    header("Location: /admin/news/");
    exit;
}

$res = $connect->query("SELECT * FROM news WHERE id_news = $id");
$news = $res->fetch_assoc();

if (!$news) {
    header("Location: /admin/news/");
    exit;
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <h1 class="display-5 fw-bold text-primary mb-4">Редактировать новость</h1>
            <hr class="mb-5" style="border-top: 4px solid #0033a0; width: 100px;">

            <div class="card">
                <div class="card-body p-5">

                    <form action="/admin/controllers/news_edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $news['id_news'] ?>">

                        <div class="mb-4">
                            <label class="form-label fw-bold">Заголовок новости</label>
                            <input type="text" name="title" class="form-control" 
                                   value="<?= htmlspecialchars($news['title']) ?>" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Дата публикации</label>
                            <input type="date" name="date" class="form-control" 
                                   value="<?= $news['date'] ?>" required>
                        </div>

                        <!-- Блок с фотографией -->
                        <?php if (!empty($news['image'])): ?>
                            <div class="mb-4">
                                <label class="form-label fw-bold">Текущее фото:</label><br>
                                <img src="/assets/images/news/<?= htmlspecialchars($news['image']) ?>" 
                                     class="img-fluid rounded shadow-sm mb-3" 
                                     style="max-height: 350px; object-fit: cover;" 
                                     alt="<?= htmlspecialchars($news['title']) ?>">
                            </div>
                        <?php endif; ?>

                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <?= !empty($news['image']) ? 'Новое фото (заменит текущее)' : 'Фотография к новости' ?>
                            </label>
                            <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                            <small class="text-muted">
                                Рекомендуемый размер: 1200×800 px. Форматы: JPG, PNG, WebP<br>
                                Оставьте поле пустым, если не хотите менять фото
                            </small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Текст новости</label>
                            <textarea name="text" class="form-control" rows="12" required>
<?= htmlspecialchars($news['text']) ?>
                            </textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg py-3">
                                Сохранить изменения
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="text-center mt-4">
                <a href="/admin/news/" class="btn btn-secondary">← Вернуться к списку новостей</a>
            </div>

        </div>
    </div>
</div>

<?php include "../../includes/footer.php"; ?>