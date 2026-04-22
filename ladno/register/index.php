<?php
$page_title = "Регистрация";
require_once __DIR__ . '/../includes/header.php';

if (isset($_SESSION['login'])) {
    header("Location: /profile/");
    exit;
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header text-center py-4">
                    <h4 class="mb-0">Регистрация нового пользователя</h4>
                </div>
                <div class="card-body p-5">

                    <?php if(isset($_GET['error'])): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($_GET['error']) ?>
                        </div>
                    <?php endif; ?>

                    <form action="/admin/controllers/registration.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Фамилия</label>
                                <input type="text" name="surname" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Имя</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Отчество</label>
                            <input type="text" name="patronymic" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Логин</label>
                            <input type="text" name="login" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Телефон</label>
                            <input type="tel" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Пароль</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">
                            Зарегистрироваться
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="/login.php" class="text-decoration-none">Уже есть аккаунт? Войти</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>