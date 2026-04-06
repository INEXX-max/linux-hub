<?php
// includes/navbar.php
?>
<nav class="navbar" style="border-bottom: 1px solid rgba(255,255,255,0.05); background: rgba(11,15,25,0.95); backdrop-filter: blur(10px); position: sticky; top: 0; z-index: 1000; padding: 15px 0;">
    <div class="container d-flex justify-between align-center">
        <a href="index.php?page=home" class="nav-logo" style="font-size:1.5rem; font-weight:bold; color:#fff; text-decoration:none;">
            <i class="fa-brands fa-linux text-primary"></i> <span class="text-accent">Linux</span>Hub
        </a>
        
        <div class="nav-links d-flex align-center gap-20" id="navLinks">
            <a href="index.php?page=what-is-linux">Linux Nedir?</a>
            <a href="index.php?page=architecture">Mimari</a>
            <a href="index.php?page=distros">Kütüphane</a>
            <a href="index.php?page=use_cases">Senaryolar</a>
            <a href="index.php?page=quiz" class="text-primary font-bold"><i class="fa-solid fa-wand-magic-sparkles"></i> AI Quiz</a>
            
            <?php if(isLoggedIn()): ?>
                <a href="index.php?page=dashboard" class="btn-outline" style="padding: 5px 15px;"><i class="fa-solid fa-user-astronaut"></i> Panel</a>
                <a href="index.php?page=logout" class="text-muted" style="font-size:0.9rem;">Çıkış</a>
            <?php else: ?>
                <a href="index.php?page=login" class="text-muted" style="margin-left:10px;">Giriş Yap</a>
                <a href="index.php?page=register" class="btn-primary" style="padding: 5px 15px;">Kayıt Ol</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<style>
.nav-links a { color: var(--text-main); text-decoration: none; font-size:0.95rem; transition: 0.2s ease; }
.nav-links a:hover { color: var(--primary-color); }
.gap-20 { gap: 20px; }
.font-bold { font-weight: 600; }
</style>
