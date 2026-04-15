<?php
// includes/navbar.php — NEXOS Premium Navigation
?>
<nav class="nx-navbar" id="nexosNavbar">
    <div class="nx-navbar-inner">
        <!-- Logo -->
        <a href="index.php?page=home" class="nx-logo">
            <div class="nx-logo-icon"><i class="fa-brands fa-linux"></i></div>
            <span class="nx-logo-text">NEXOS</span>
        </a>
        
        <!-- Navigation Links -->
        <div class="nx-nav-links" id="navLinks">
            <a href="index.php?page=what-is-linux" <?= ($page ?? '') === 'what-is-linux' ? 'class="active"' : '' ?>>Linux Nedir?</a>
            <a href="index.php?page=architecture" <?= ($page ?? '') === 'architecture' ? 'class="active"' : '' ?>>Mimari</a>
            <a href="index.php?page=distros" <?= ($page ?? '') === 'distros' ? 'class="active"' : '' ?>>Dağıtımlar</a>
            <a href="index.php?page=history" <?= ($page ?? '') === 'history' ? 'class="active"' : '' ?>>Tarihçe</a>
            <a href="index.php?page=use_cases" <?= ($page ?? '') === 'use_cases' ? 'class="active"' : '' ?>>Kullanım</a>
            <a href="index.php?page=quiz" class="nx-nav-highlight" <?= ($page ?? '') === 'quiz' ? 'style="color:var(--nx-cyan)"' : '' ?>>
                <i class="fa-solid fa-wand-magic-sparkles"></i> Quiz
            </a>
            
            <!-- Auth Links -->
            <div class="nx-nav-auth">
                <?php if(isLoggedIn()): ?>
                    <a href="index.php?page=dashboard" class="btn-outline btn-sm">
                        <i class="fa-solid fa-terminal"></i> Panel
                    </a>
                    <a href="index.php?page=logout" class="btn-ghost btn-sm">Çıkış</a>
                <?php else: ?>
                    <a href="index.php?page=login" class="btn-ghost btn-sm">Giriş</a>
                    <a href="index.php?page=register" class="btn-primary btn-sm">Kayıt Ol</a>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Mobile Toggle -->
        <button class="nx-mobile-toggle" id="mobileMenuBtn" aria-label="Menü">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>
</nav>
