<?php
$page_title = "Обратная связь";
require_once __DIR__ . '/includes/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <h1 class="display-5 fw-bold text-primary mb-4">Обратная связь</h1>
            <hr class="mb-5" style="border-top: 4px solid #0033a0; width: 90px;">

            <div class="card shadow-sm">
                <div class="card-body p-5">

                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success text-center">
                            <?= htmlspecialchars($_GET['success']) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($_GET['error']) ?>
                        </div>
                    <?php endif; ?>

                    <form action="/admin/controllers/feedback.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Фамилия</label>
                                <input type="text" name="surname" class="form-control" placeholder="Введите фамилию" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Имя</label>
                                <input type="text" name="name" class="form-control" placeholder="Введите имя" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Сообщение</label>
                            <textarea name="message" class="form-control" rows="6" 
                                      placeholder="Напишите ваше сообщение, вопрос или предложение..." required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Телефон</label>
                                <input type="tel" name="phone" class="form-control" 
                                       placeholder="+7 (___) ___-__-__">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="email" class="form-control" 
                                       placeholder="example@mail.ru">
                            </div>
                        </div>

                        <div class="mb-4">
                            <input type="checkbox" id="consent" name="consent" required>
                            <label for="consent" class="form-label ms-2">
                                Я даю согласие на обработку персональных данных
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 py-3 fw-bold">
                            Отправить сообщение
                        </button>
                    </form>

                </div>
            </div>

            <p class="text-center text-muted mt-4 small">
                Ваше сообщение будет сохранено и рассмотрено администратором в ближайшее время.
            </p>

        </div>
    </div>
</div>

<?php 
require_once __DIR__ . '/includes/footer.php'; 
?>