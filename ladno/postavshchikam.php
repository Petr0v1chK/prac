<?php
$page_title = "Поставщикам";
require_once __DIR__ . '/includes/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <!-- Заголовок страницы -->
            <h1 class="display-5 fw-bold text-primary mb-4">Поставщикам</h1>
            <hr class="mb-5" style="border-top: 4px solid #0033a0; width: 90px;">

            <div class="text-center mb-5">
                <p class="lead">АО «Каменск-Уральский металлургический завод» приглашает к сотрудничеству надежных поставщиков.</p>
            </div>

            <!-- Блок "Поставщикам лома" -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start">
                        <div class="me-4">
                            <div style="font-size: 3rem; color: #0033a0;">♻️</div>
                        </div>
                        <div class="flex-grow-1">
                            <h4 class="fw-bold">Поставщикам лома</h4>
                            <p class="mb-0">Мы регулярно закупаем алюминиевый и магниевый лом, отходы производства и вторичные ресурсы.</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Подробнее о условиях закупки лома →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Три карточки как на скриншоте -->
            <div class="row g-4 mb-5">

                <!-- Карточка 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body p-4 text-center">
                            <div class="mb-4" style="font-size: 3.5rem; color: #0033a0;">
                                📦
                            </div>
                            <h5 class="fw-bold mb-3">Приобретение вспомогательных материалов и комплектующих</h5>
                            <a href="#" class="btn btn-outline-primary w-100">
                                Перейти <span class="ms-2">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Карточка 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body p-4 text-center">
                            <div class="mb-4" style="font-size: 3.5rem; color: #0033a0;">
                                📄
                            </div>
                            <h5 class="fw-bold mb-3">Типовые формы договоры</h5>
                            <a href="#" class="btn btn-outline-primary w-100">
                                Скачать <span class="ms-2">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Карточка 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body p-4 text-center">
                            <div class="mb-4" style="font-size: 3.5rem; color: #0033a0;">
                                📋
                            </div>
                            <h5 class="fw-bold mb-3">Регламенты, положения компании в области закупок</h5>
                            <a href="#" class="btn btn-outline-primary w-100">
                                Перейти <span class="ms-2">→</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- FAQ -->
            <div class="row g-4 mb-5">
                <div class="col-lg-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div style="font-size: 2.8rem; color: #0033a0;">❓</div>
                                <h4 class="fw-bold ms-3 mb-0">FAQ</h4>
                            </div>
                            <p class="text-muted">Часто задаваемые вопросы по сотрудничеству с нами</p>
                            <a href="#" class="btn btn-outline-primary w-100">Перейти в раздел FAQ →</a>
                        </div>
                    </div>
                </div>

                <!-- Контакты службы снабжения -->
                <div class="col-lg-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div style="font-size: 2.8rem; color: #0033a0;">📞</div>
                                <h4 class="fw-bold ms-3 mb-0">Контакты службы снабжения</h4>
                            </div>
                            <ul class="list-unstyled">
                                <li class="mb-2"><strong>Телефон:</strong> +7 (3439) 39-51-16</li>
                                <li class="mb-2"><strong>Email:</strong> zakupki@kumz.ru</li>
                                <li><strong>Режим работы:</strong> Пн–Пт с 08:00 до 17:00</li>
                            </ul>
                            <a href="/obratnaya-svyaz.php" class="btn btn-primary w-100 mt-3">
                                Написать в службу снабжения
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
require_once __DIR__ . '/includes/footer.php'; 
?>