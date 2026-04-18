<?php
// includes/navbar.php — linux.dev Transparent Navbar
$page = isset($page) ? $page : (isset($_GET['page']) ? $_GET['page'] : 'home');
?>
<nav class="nx-navbar" id="nexosNavbar">
    <div class="container">
        <a href="index.php?page=home" class="nx-logo">
            <span class="nx-logo-mark">&lt;/&gt;</span>
            <span class="nx-logo-text">linux<span class="nx-logo-dot">.</span>dev</span>
        </a>

        <div class="nx-nav-links" id="navLinks">
            <a href="index.php?page=what-is-linux" <?= $page === 'what-is-linux' ? 'class="active"' : '' ?>>Linux Nedir?</a>
            <a href="index.php?page=architecture" <?= $page === 'architecture' ? 'class="active"' : '' ?>>Mimari</a>
            <a href="index.php?page=distros" <?= $page === 'distros' ? 'class="active"' : '' ?>>Dagitimlar</a>
            <a href="index.php?page=history" <?= $page === 'history' ? 'class="active"' : '' ?>>Tarihce</a>
            <a href="index.php?page=use_cases" <?= $page === 'use_cases' ? 'class="active"' : '' ?>>Kullanim</a>
            <a href="index.php?page=quiz" class="nx-nav-highlight" <?= $page === 'quiz' ? 'style="color:var(--nx-cyan)"' : '' ?>>
                <i class="fa-solid fa-wand-magic-sparkles"></i> Quiz
            </a>
        </div>

        <div class="nx-nav-actions">
            <div class="nx-nav-auth">
                <?php if(isLoggedIn()): ?>
                    <a href="index.php?page=dashboard" class="btn-ghost btn-sm"><i class="fa-solid fa-grid-2"></i> Panel</a>
                    <a href="index.php?page=logout" class="btn-outline btn-sm" style="border-color:var(--nx-red); color:var(--nx-red)!important;"><i class="fa-solid fa-power-off"></i></a>
                <?php else: ?>
                    <a href="index.php?page=login" class="btn-ghost btn-sm">Giris</a>
                    <a href="index.php?page=register" class="btn-gradient btn-sm">Kayit Ol</a>
                <?php endif; ?>
            </div>
            <button class="nx-mobile-toggle" id="mobileMenuBtn" aria-label="Menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>
</nav>
