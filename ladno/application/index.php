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
        <div class="col-lg-8">

            <h1 class="display-5 fw-bold text-primary mb-4">Подать заявку</h1>
            <hr class="mb-5" style="border-top: 4px solid #0033a0; width: 90px;">

            <?php if(isset($_GET['error'])): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
            <?php endif; ?>

            <?php if(isset($_GET['success'])): ?>
                <div class="alert alert-success"><?= htmlspecialchars($_GET['success']) ?></div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body p-5">
                    <form action="/admin/controllers/add_application.php" method="POST">

                        <div class="mb-4">
                            <label class="form-label fw-bold">Адрес доставки / объекта</label>
                            <input type="text" name="address" class="form-control" required placeholder="Введите адрес">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Телефон для связи</label>
                            <input type="tel" name="phone" class="form-control" required placeholder="+7 (___) ___-__-__">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Желаемая дата</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Желаемое время</label>
                                <input type="time" name="time" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Вид продукции</label>
                            <select name="category" class="form-select" required>
                                <?= fnOutService() ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Дополнительная информация / комментарий</label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Укажите объём, марку сплава, особые требования и т.д."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            Отправить заявку
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>