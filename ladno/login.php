<?php
$page_title = "Вход";
require_once __DIR__ . '/includes/header.php';

if (isset($_SESSION['login'])) {
    header("Location: /profile/");
    exit;
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8">

            <div class="card">
                <div class="card-header text-center py-4">
                    <h4 class="mb-0">Вход в личный кабинет</h4>
                </div>
                <div class="card-body p-5">

                    <?php if(isset($_GET['error'])): ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($_GET['error']) ?>
                        </div>
                    <?php endif; ?>

                    <form action="/admin/controllers/login.php" method="POST">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Логин</label>
                            <input type="text" name="login" class="form-control form-control-lg" 
                                   placeholder="Введите логин" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Пароль</label>
                            <input type="password" name="password" class="form-control form-control-lg" 
                                   placeholder="Введите пароль" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 py-3">
                            Войти
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="/register/" class="text-decoration-none">Нет аккаунта? Зарегистрироваться</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>