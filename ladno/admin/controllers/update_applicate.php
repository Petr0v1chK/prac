<?php
include "../../includes/connect.php";

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = (int)$_GET['id'];
    $type = $_GET['type'];

    $status = $connect->query("SELECT id_status FROM status WHERE code = '$type'")->fetch_assoc();

    if ($type == "canceled" && isset($_GET['info'])) {
        $info = $connect->real_escape_string($_GET['info']);
        $sql = "UPDATE application SET id_status = '{$status['id_status']}', status_info = '$info' WHERE id_application = $id";
    } else {
        $sql = "UPDATE application SET id_status = '{$status['id_status']}' WHERE id_application = $id";
    }

    if ($connect->query($sql)) {
        header("Location: /admin/");
        exit;
    }
}

header("Location: /admin/");
exit;
?>