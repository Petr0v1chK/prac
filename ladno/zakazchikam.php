<?php
$page_title = "Заказчикам";
require_once __DIR__ . '/includes/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <!-- Заголовок -->
            <h1 class="display-5 fw-bold text-primary mb-4 text-center">Заказчикам</h1>
            <hr class="mb-5 mx-auto" style="border-top: 4px solid #0033a0; width: 90px;">

            <p class="lead text-center mb-5">
                АО «Каменск-Уральский металлургический завод» предлагает широкий ассортимент высокотехнологичной продукции 
                из алюминиевых и магниевых сплавов.
            </p>

            <!-- Карточки продукции -->
            <div class="row g-4">

                <!-- Карточка 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 shadow-sm border-0 text-center">
                        <div class="card-body p-4">
                            <img src="https://via.placeholder.com/300x200/cccccc/666666?text=Листы+и+плиты" 
                                 class="img-fluid rounded mb-4" alt="Продукция в наличии" style="height: 180px; object-fit: cover;">
                            <h5 class="fw-bold">Продукция в наличии</h5>
                            <p class="text-muted small mt-2">Актуальный складской остаток алюминиевого проката</p>
                            <a href="#" class="btn btn-outline-primary w-100 mt-3">Смотреть наличие →</a>
                        </div>
                    </div>
                </div>

                <!-- Карточка 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 shadow-sm border-0 text-center">
                        <div class="card-body p-4">
                            <img src="https://via.placeholder.com/300x200/e6f0ff/0033a0?text=Сертификаты" 
                                 class="img-fluid rounded mb-4" alt="Сертификаты" style="height: 180px; object-fit: cover;">
                            <h5 class="fw-bold">Сертификаты</h5>
                            <p class="text-muted small mt-2">Качество подтверждено международными и российскими сертификатами</p>
                            <a href="#" class="btn btn-outline-primary w-100 mt-3">Скачать сертификаты →</a>
                        </div>
                    </div>
                </div>

                <!-- Карточка 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 shadow-sm border-0 text-center">
                        <div class="card-body p-4">
                            <img src="https://via.placeholder.com/300x200/f0e6ff/6f42c1?text=Анод.+листы" 
                                 class="img-fluid rounded mb-4" alt="Листы для анодирования" style="height: 180px; object-fit: cover;">
                            <h5 class="fw-bold">Листы для анодирования</h5>
                            <p class="text-muted small mt-2">Высококачественные листы с отличной поверхностью</p>
                            <a href="#" class="btn btn-outline-primary w-100 mt-3">Подробнее →</a>
                        </div>
                    </div>
                </div>

                <!-- Карточка 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 shadow-sm border-0 text-center">
                        <div class="card-body p-4">
                            <img src="https://via.placeholder.com/300x200/d1e7dd/0f5132?text=Судостроение" 
                                 class="img-fluid rounded mb-4" alt="Листы для судостроения" style="height: 180px; object-fit: cover;">
                            <h5 class="fw-bold">Листы для судостроения</h5>
                            <p class="text-muted small mt-2">Морские и речные сплавы повышенной коррозионной стойкости</p>
                            <a href="#" class="btn btn-outline-primary w-100 mt-3">Подробнее →</a>
                        </div>
                    </div>
                </div>

                <!-- Большая карточка внизу (как на скриншоте) -->
                <div class="col-12 mt-4">
                    <div class="card shadow-sm border-0">
                        <div class="row g-0">
                            <div class="col-lg-5">
                                <img src="https://via.placeholder.com/600x400/eeeeee/555555?text=Рифлёный+лист" 
                                     class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Рифленый лист">
                            </div>
                            <div class="col-lg-7 d-flex align-items-center">
                                <div class="card-body p-5">
                                    <h4 class="fw-bold">Широкий рифленый лист для пола изотермического фургона</h4>
                                    <p class="lead">
                                        Специальная продукция для автомобильной промышленности. 
                                        Высокая прочность, антискользящая поверхность, оптимальные размеры.
                                    </p>
                                    <a href="#" class="btn btn-primary btn-lg mt-3">Узнать больше о продукте →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Дополнительный блок с призывом -->
            <div class="text-center mt-5 pt-4 border-top">
                <h4 class="fw-bold text-primary">Хотите сделать заказ или получить консультацию?</h4>
                <p class="lead mt-3">Наши специалисты помогут подобрать оптимальную продукцию под ваши задачи.</p>
                <div class="mt-4">
                    <a href="/obratnaya-svyaz.php" class="btn btn-primary btn-lg px-5">Связаться с менеджером</a>
                    <a href="/application/" class="btn btn-outline-primary btn-lg px-5 ms-3">Подать заявку</a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
require_once __DIR__ . '/includes/footer.php'; 
?>