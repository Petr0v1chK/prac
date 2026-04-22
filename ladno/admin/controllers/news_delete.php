<?php
session_start();
include "../../includes/connect.php";

if (isset($_GET['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    $id = (int)$_GET['id'];
    $connect->query("DELETE FROM news WHERE id_news = $id");
}
header("Location: /admin/news/");
exit;
?>