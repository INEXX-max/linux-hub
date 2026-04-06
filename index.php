<?php
// index.php - Tüm isteklerin geçtiği ana yönlendirici (Router)
require_once 'config/data.php';
require_once 'includes/functions.php';

$page = isset($_GET['page']) ? sanitizeInput($_GET['page']) : 'home';

// İzin verilen sayfalar ve klasör yollarının haritası (White-list security)
$allowed_pages = [
    'home' => 'pages/home.php',
    'what-is-linux' => 'pages/what-is-linux.php',
    'history' => 'pages/history.php',
    'architecture' => 'pages/architecture.php',
    'distros' => 'pages/distros_list.php',
    'distro_detail' => 'pages/distro_detail.php',
    'use_cases' => 'pages/use_cases.php',
    'quiz' => 'pages/quiz.php',
    'about' => 'pages/about.php',
    'login' => 'auth/login.php',
    'register' => 'auth/register.php',
    'logout' => 'auth/logout.php',
    'forgot-password' => 'auth/forgot-password.php',
    'dashboard' => 'user/dashboard.php'
];

// Sayfa var mı kontrolü
if (array_key_exists($page, $allowed_pages)) {
    $file_path = $allowed_pages[$page];
    if(file_exists($file_path)){
        require_once $file_path;
    } else {
        // Dosya henüz oluşturulmadıysa hata basmak yerine inşaatta sayfası gösteriyoruz
        echo "<h2>Sayfa yapım aşamasında ($file_path) </h2><a href='index.php?page=home'>Geri Dön</a>";
    }
} else {
    // Bilinmeyen bir page istendiğinde 404
    echo "<h2>404 - Sayfa Bulunamadı!</h2><a href='index.php?page=home'>Ana Sayfaya Dön</a>";
}
?>
