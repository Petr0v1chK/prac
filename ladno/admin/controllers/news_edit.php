<?php
session_start();
include "../../includes/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    
    $id    = (int)$_POST['id'];
    $title = $connect->real_escape_string(trim($_POST['title']));
    $date  = $connect->real_escape_string($_POST['date']);
    $text  = $connect->real_escape_string(trim($_POST['text']));
    
    $image_sql = "";

    // Если загружено новое фото
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed)) {
            $new_name = uniqid('news_') . '.' . $ext;
            $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/news/' . $new_name;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                // Удаляем старое фото, если есть
                $old = $connect->query("SELECT image FROM news WHERE id_news = $id")->fetch_assoc();
                if (!empty($old['image']) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/assets/images/news/' . $old['image'])) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . '/assets/images/news/' . $old['image']);
                }
                $image_sql = ", image = '$new_name'";
            }
        }
    }

    $sql = "UPDATE news SET title='$title', date='$date', text='$text' $image_sql WHERE id_news=$id";
    
    if ($connect->query($sql)) {
        header("Location: /admin/news/");
    } else {
        header("Location: /admin/news/edit.php?id=$id&error=1");
    }
    exit;
}
header("Location: /admin/news/");
?>