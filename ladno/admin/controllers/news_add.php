<?php
session_start();
include "../../includes/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    
    $title = $connect->real_escape_string(trim($_POST['title']));
    $date  = $connect->real_escape_string($_POST['date']);
    $text  = $connect->real_escape_string(trim($_POST['text']));
    $image = '';

    // Обработка загрузки фото
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed)) {
            $new_name = uniqid('news_') . '.' . $ext;
            $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/news/' . $new_name;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                $image = $new_name;
            }
        }
    }

    $sql = "INSERT INTO news (title, date, text, image) VALUES ('$title', '$date', '$text', '$image')";
    
    if ($connect->query($sql)) {
        header("Location: /admin/news/add.php?success=1");
    } else {
        header("Location: /admin/news/add.php?error=Ошибка добавления");
    }
    exit;
}
header("Location: /admin/news/");
?>