<?php
include __DIR__ . "/../includes/connect.php";

function fnOutService() {
    global $connect;
    $res = $connect->query("SELECT * FROM service ORDER BY name");
    $out = "";
    while ($r = $res->fetch_assoc()) {
        $out .= "<option value='{$r['id_service']}'>{$r['name']}</option>";
    }
    return $out;
}

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
            <div class='card h-100'>
                <div class='card-body'>
                    <h5 class='card-title text-primary'>Заявка №{$r['id_application']}</h5>
                    <p><strong>Продукция:</strong> {$r['sname']}</p>
                    <p><strong>Дата:</strong> {$r['date']} {$r['time']}</p>
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
        return "<h4 class='text-center text-muted'>Заявок пока нет</h4>";
    }

    $out = "<div class='row row-cols-1 row-cols-md-2 g-4'>";

    while ($item = $result->fetch_assoc()) {
        $out .= "
        <div class='col'>
            <div class='card h-100'>
                <div class='card-body'>
                    <h5 class='card-title'>Заявка №{$item['id_application']}</h5>
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
?>