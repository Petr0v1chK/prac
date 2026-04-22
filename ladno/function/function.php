<?php
include __DIR__ . "/../includes/connect.php";

// список продукции
function fnOutService() {
    global $connect;
    $res = $connect->query("SELECT * FROM service ORDER BY name");
    $out = "";
    while ($r = $res->fetch_assoc()) {
        $out .= "<option value='{$r['id_service']}'>{$r['name']}</option>";
    }
    return $out;
}

// заявки пользователя в личном кабинете
function fnOutCardProfile($login) {
    global $connect;
    
    $u = $connect->query("SELECT id_user FROM user WHERE login = '" . $connect->real_escape_string($login) . "'")->fetch_assoc();
    
    if (!$u) return "<p class='text-danger'>Пользователь не найден.</p>";

    $res = $connect->query("
        SELECT a.*, s.status, se.name AS sname 
        FROM application a
        JOIN status s ON a.id_status = s.id_status
        JOIN service se ON a.id_service = se.id_service
        WHERE a.id_user = {$u['id_user']}
        ORDER BY a.id_application DESC
    ");

    if (!$res->num_rows) {
        return "<p class='text-muted'>У вас пока нет заявок.</p>";
    }

    $out = "<div class='row row-cols-1 row-cols-md-2 g-4'>";
    while ($r = $res->fetch_assoc()) {
        $out .= "
        <div class='col'>
            <div class='card h-100 border-primary'>
                <div class='card-body'>
                    <h5 class='card-title text-primary'>Заявка №{$r['id_application']}</h5>
                    <p><strong>Продукция:</strong> {$r['sname']}</p>
                    <p><strong>Дата и время:</strong> {$r['date']} {$r['time']}</p>
                    <p><strong>Адрес:</strong> {$r['address']}</p>
                    <p><strong>Статус:</strong> <span class='badge bg-primary'>{$r['status']}</span></p>
                    " . (!empty($r['description']) ? "<p><strong>Комментарий:</strong><br>{$r['description']}</p>" : "") . "
                </div>
            </div>
        </div>";
    }
    $out .= "</div>";
    return $out;
}

// заявки для админа
function fnOutCardAdmin() {
    global $connect;
    
    $sql = "SELECT a.id_application, a.date, a.time, a.address, a.phone, a.description, 
                   u.name, u.surname, u.patronymic,
                   s.status, se.name AS sname
            FROM application a
            JOIN user u ON a.id_user = u.id_user
            JOIN status s ON a.id_status = s.id_status
            JOIN service se ON a.id_service = se.id_service
            ORDER BY a.id_application DESC";

    $result = $connect->query($sql);

    if (!$result->num_rows) {
        return "<h4 class='text-center text-muted py-5'>Заявок пока нет</h4>";
    }

    $out = "<div class='row row-cols-1 row-cols-md-2 g-4'>";

    while ($item = $result->fetch_assoc()) {
        $out .= "
        <div class='col'>
            <div class='card h-100'>
                <div class='card-body'>
                    <h5 class='card-title text-primary'>Заявка №{$item['id_application']}</h5>
                    <p><strong>Клиент:</strong> {$item['surname']} {$item['name']} {$item['patronymic']}</p>
                    <p><strong>Продукция:</strong> {$item['sname']}</p>
                    <p><strong>Дата и время:</strong> {$item['date']} {$item['time']}</p>
                    <p><strong>Адрес:</strong> {$item['address']}</p>
                    <p><strong>Телефон:</strong> {$item['phone']}</p>
                    <p><strong>Статус:</strong> <span class='badge bg-primary'>{$item['status']}</span></p>
                    " . (!empty($item['description']) ? "<p><strong>Комментарий:</strong><br>{$item['description']}</p>" : "") . "
                </div>
            </div>
        </div>";
    }
    $out .= "</div>";
    return $out;
}

// === НОВАЯ ФУНКЦИЯ: Вывод сообщений из формы "Обратная связь" для админа ===
function fnOutFeedbackAdmin() {
    global $connect;
    
    $sql = "SELECT * FROM feedback ORDER BY created_at DESC";
    $result = $connect->query($sql);

    if (!$result->num_rows) {
        return "<h4 class='text-center text-muted py-5'>Сообщений пока нет</h4>";
    }

    $out = "<div class='row row-cols-1 row-cols-md-2 g-4'>";

    while ($item = $result->fetch_assoc()) {
        $out .= "
        <div class='col'>
            <div class='card h-100 border-primary'>
                <div class='card-body'>
                    <div class='d-flex justify-content-between align-items-start mb-3'>
                        <h5 class='card-title text-primary mb-0'>Сообщение №{$item['id_feedback']}</h5>
                        <small class='text-muted'>{$item['created_at']}</small>
                    </div>
                    <p><strong>ФИО:</strong> {$item['surname']} {$item['name']}</p>
                    " . (!empty($item['phone']) ? "<p><strong>Телефон:</strong> {$item['phone']}</p>" : "") . "
                    " . (!empty($item['email']) ? "<p><strong>Email:</strong> {$item['email']}</p>" : "") . "
                    <p><strong>Сообщение:</strong><br>" . nl2br(htmlspecialchars($item['message'])) . "</p>
                </div>
            </div>
        </div>";
    }
    $out .= "</div>";
    return $out;
}
// Вывод новостей на публичной странице (с фото)
function fnOutNews() {
    global $connect;
    $res = $connect->query("SELECT * FROM news ORDER BY date DESC, id_news DESC");
    
    if (!$res->num_rows) {
        return "<p class='text-muted'>Новостей пока нет.</p>";
    }

    $out = "";
    while ($r = $res->fetch_assoc()) {
        $img = !empty($r['image']) ? 
            "<img src='/assets/images/news/{$r['image']}' class='img-fluid rounded mb-3' style='max-height: 400px; object-fit: cover;' alt='{$r['title']}'>" : 
            "";

        $out .= "
        <div class='news-card mb-5 p-4 bg-white shadow-sm rounded'>
            {$img}
            <div class='d-flex justify-content-between align-items-start'>
                <div>
                    <h5 class='fw-bold'>{$r['title']}</h5>
                </div>
                <div class='text-primary fw-bold'>" . date('d.m.Y', strtotime($r['date'])) . "</div>
            </div>
            <p class='mt-3 mb-0'>
                " . nl2br(htmlspecialchars($r['text'])) . "
            </p>
        </div>";
    }
    return $out;
}

// Вывод новостей для админа (с фото и кнопками)
function fnOutNewsAdmin() {
    global $connect;
    $res = $connect->query("SELECT * FROM news ORDER BY date DESC, id_news DESC");
    
    if (!$res->num_rows) {
        return "<h4 class='text-center text-muted py-5'>Новостей пока нет</h4>";
    }

    $out = "<div class='row row-cols-1 g-4'>";
    while ($r = $res->fetch_assoc()) {
        $img = !empty($r['image']) ? 
            "<img src='/assets/images/news/{$r['image']}' class='img-fluid rounded mb-3' style='max-height: 200px; object-fit: cover;'>" : 
            "<p class='text-muted'>Без фото</p>";

        $out .= "
        <div class='col'>
            <div class='card h-100'>
                <div class='card-body'>
                    {$img}
                    <div class='d-flex justify-content-between'>
                        <h5 class='card-title text-primary'>{$r['title']}</h5>
                        <span class='text-muted small'>" . date('d.m.Y', strtotime($r['date'])) . "</span>
                    </div>
                    <p class='card-text mt-2'>" . nl2br(htmlspecialchars(substr($r['text'], 0, 200))) . (strlen($r['text']) > 200 ? '...' : '') . "</p>
                    
                    <div class='mt-3'>
                        <a href='/admin/news/edit.php?id={$r['id_news']}' class='btn btn-warning btn-sm'>Редактировать</a>
                        <a href='/admin/controllers/news_delete.php?id={$r['id_news']}' 
                           class='btn btn-danger btn-sm' 
                           onclick=\"return confirm('Удалить новость?');\">Удалить</a>
                    </div>
                </div>
            </div>
        </div>";
    }
    $out .= "</div>";
    return $out;
}
?>