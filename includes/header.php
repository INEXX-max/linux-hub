<?php
// includes/header.php — NEXOS Global Header
?><!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NEXOS — Modern Linux bilgi platformu. Dagitim karsilastirma, interaktif terminal, quiz ve daha fazlasi.">
    <meta name="theme-color" content="#000000">
    <title>NEXOS — Linux'un Gucunu Kesfet</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- NEXOS Design System -->
    <link rel="stylesheet" href="assets/css/style.css">

    <?php
    // Sayfa bazli CSS
    $pageCss = [
        'home' => 'home', 'what-is-linux' => 'content', 'architecture' => 'content',
        'use_cases' => 'content', 'quiz' => 'content', 'distros' => 'distros',
        'distro_detail' => 'distros', 'history' => 'history',
        'login' => 'auth', 'register' => 'auth', 'forgot-password' => 'auth',
        'dashboard' => 'dashboard'
    ];
    $currentPage = isset($page) ? $page : (isset($_GET['page']) ? $_GET['page'] : 'home');
    if (isset($pageCss[$currentPage])) {
        echo '<link rel="stylesheet" href="assets/css/pages/' . $pageCss[$currentPage] . '.css">';
    }
    ?>
</head>
<body>
<!-- Mouse Glow -->
<div id="mouseGlow" class="nx-mouse-glow"></div>

<?php require_once 'includes/navbar.php'; ?>
<?php displayFlashMessage(); ?>
<main>
