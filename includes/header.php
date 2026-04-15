<?php
// includes/header.php — NEXOS Global Header
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NEXOS — Geleceğin işletim sistemi deneyimini keşfedin. Linux dağıtımları, mimari, güvenlik ve açık kaynak topluluğu.">
    <meta name="theme-color" content="#06080d">
    <title>NEXOS — Linux'un Gücünü Keşfet</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- NEXOS Design System -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- Mouse Follow Glow -->
<div class="nx-mouse-glow" id="mouseGlow"></div>

<?php require_once 'includes/navbar.php'; ?>
<?php displayFlashMessage(); ?>
<main>
