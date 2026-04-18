<?php
// pages/distro_detail.php — linux.dev Distro Detail Page
require_once 'includes/header.php';

if(!isset($_GET['slug'])) {
    echo "<div class='container' style='padding:var(--nx-sp-20) 0; text-align:center;'><h1 class='text-primary'>Dagitim Belirtilmedi!</h1><br><a href='index.php?page=distros' class='btn-primary mt-4'>Dagitimlara Don</a></div>";
    require_once 'includes/footer.php';
    exit;
}
$slug = sanitizeInput($_GET['slug']);
$distro = getDistroBySlug($slug);

if(!$distro) {
    echo "<div class='container' style='padding:var(--nx-sp-20) 0; text-align:center;'><h1 class='text-primary'>Sistem Bulunamadi!</h1><br><a href='index.php?page=distros' class='btn-primary mt-4'>Dagitimlara Don</a></div>";
    require_once 'includes/footer.php';
    exit;
}

// Favori Ekleme (Gercek DB)
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_favorite'])) {
    if(isLoggedIn()) {
        addFavorite($_SESSION['user_id'], $distro['id']);
        setFlashMessage('success', $distro['name'] . ' favorilerinize eklendi.');
        echo "<script>window.location.href='index.php?page=distro_detail&slug=".$distro['slug']."';</script>";
        exit;
    } else {
        setFlashMessage('warning', 'Favorilere eklemek icin giris yapin.');
        echo "<script>window.location.href='index.php?page=login';</script>";
        exit;
    }
}

// Favori Silme
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_favorite'])) {
    if(isLoggedIn()) {
        removeFavorite($_SESSION['user_id'], $distro['id']);
        setFlashMessage('info', $distro['name'] . ' favorilerden cikarildi.');
        echo "<script>window.location.href='index.php?page=distro_detail&slug=".$distro['slug']."';</script>";
        exit;
    }
}

$is_favorite = false;
if(isLoggedIn()) {
    $favIds = getUserFavorites($_SESSION['user_id']);
    $is_favorite = in_array($distro['id'], $favIds);
}

$badgeClass = 'nx-badge-' . ($distro['difficulty'] === 'Beginner' ? 'green' : ($distro['difficulty'] === 'Intermediate' ? 'amber' : 'red'));
?>

<!-- Hero Banner -->
<section class="nx-section-sm nx-bg-grid" style="padding-top:var(--nx-sp-16); padding-bottom:var(--nx-sp-12); position:relative; overflow:hidden;">
    <div class="nx-glow-orb nx-glow-orb-blue" style="top:-30%; right:-10%;"></div>
    <div class="container">
        <!-- Back + Favorite -->
        <div class="d-flex justify-between items-center mb-6 reveal" style="position:relative; z-index:2;">
            <a href="index.php?page=distros" class="btn-ghost"><i class="fa-solid fa-arrow-left"></i> Tüm Dağıtımlar</a>
            <?php if(isLoggedIn()): ?>
                <?php if(!$is_favorite): ?>
                    <form method="POST" style="display:inline;">
                        <button type="submit" name="add_favorite" class="btn-outline" style="border-color:var(--nx-amber); color:var(--nx-amber)!important;">
                            <i class="fa-regular fa-star"></i> Koleksiyona Ekle
                        </button>
                    </form>
                <?php else: ?>
                    <form method="POST" style="display:inline;">
                        <button type="submit" name="remove_favorite" class="btn-outline" style="border-color:var(--nx-red); color:var(--nx-red)!important;">
                            <i class="fa-solid fa-star"></i> Koleksiyondan Çıkar
                        </button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Distro Header -->
        <div class="reveal" style="position:relative; z-index:2;">
            <div class="d-flex items-center gap-4 mb-4" style="gap:16px; flex-wrap:wrap;">
                <span class="nx-badge <?= $badgeClass ?>" style="padding:8px 18px; font-size:var(--nx-fs-sm);">
                    <?= htmlspecialchars($distro['difficulty']) ?>
                </span>
                <span style="font-size:var(--nx-fs-xs); color:var(--nx-text-dim); text-transform:uppercase; letter-spacing:2px; font-weight:600;">
                    <i class="fa-solid fa-calendar"></i> <?= htmlspecialchars($distro['founded']) ?>'den beri
                </span>
            </div>
            <h1 style="font-size:clamp(2.5rem, 6vw, 4rem); font-weight:800; margin-bottom:var(--nx-sp-4); letter-spacing:-0.03em;">
                <?= htmlspecialchars($distro['name']) ?>
            </h1>
            <p style="font-size:var(--nx-fs-xl); color:var(--nx-text-muted); max-width:700px; line-height:1.6; margin-bottom:var(--nx-sp-6);">
                <?= htmlspecialchars($distro['short_desc']) ?>
            </p>
            <a href="<?= htmlspecialchars($distro['website']) ?>" target="_blank" class="btn-outline btn-sm" style="border-color:var(--nx-cyan); color:var(--nx-cyan)!important;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> <?= htmlspecialchars($distro['website']) ?>
            </a>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="nx-section-sm">
    <div class="container">
        <div class="nx-detail-layout">
            <!-- Left Column -->
            <div>
                <!-- Hakkında -->
                <div class="nx-card mb-6 reveal" style="padding:var(--nx-sp-8);">
                    <h2 style="color:var(--nx-cyan); border-bottom:1px solid var(--nx-border); padding-bottom:var(--nx-sp-3); margin-bottom:var(--nx-sp-5); display:flex; align-items:center; gap:10px;">
                        <i class="fa-solid fa-circle-info" style="font-size:1.2rem;"></i> Detaylı İnceleme
                    </h2>
                    <p style="line-height:1.9; font-size:var(--nx-fs-md); white-space:pre-line; color:var(--nx-text-soft);"><?= htmlspecialchars($distro['full_desc']) ?></p>
                </div>

                <!-- Kim Yaptı / Arkasında Kim Var -->
                <div class="nx-card mb-6 reveal" style="padding:var(--nx-sp-8); border-left:3px solid var(--nx-blue);">
                    <h2 style="color:var(--nx-blue); margin-bottom:var(--nx-sp-6); display:flex; align-items:center; gap:10px;">
                        <i class="fa-solid fa-users" style="font-size:1.2rem;"></i> Arkasında Kim Var?
                    </h2>
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:var(--nx-sp-6);">
                        <div style="padding:var(--nx-sp-5); background:rgba(79,143,255,0.05); border-radius:var(--nx-radius-sm); border:1px solid rgba(79,143,255,0.1);">
                            <div style="font-size:var(--nx-fs-xs); color:var(--nx-text-dim); text-transform:uppercase; letter-spacing:1px; margin-bottom:6px; font-weight:600;">
                                <i class="fa-solid fa-building" style="color:var(--nx-blue);"></i> Geliştirici
                            </div>
                            <div style="font-size:var(--nx-fs-md); font-weight:700; color:var(--nx-text);"><?= htmlspecialchars($distro['developer']) ?></div>
                        </div>
                        <div style="padding:var(--nx-sp-5); background:rgba(139,92,246,0.05); border-radius:var(--nx-radius-sm); border:1px solid rgba(139,92,246,0.1);">
                            <div style="font-size:var(--nx-fs-xs); color:var(--nx-text-dim); text-transform:uppercase; letter-spacing:1px; margin-bottom:6px; font-weight:600;">
                                <i class="fa-solid fa-user-tie" style="color:var(--nx-purple);"></i> Kurucu
                            </div>
                            <div style="font-size:var(--nx-fs-md); font-weight:700; color:var(--nx-text);"><?= htmlspecialchars($distro['founder']) ?></div>
                        </div>
                        <div style="padding:var(--nx-sp-5); background:rgba(16,185,129,0.05); border-radius:var(--nx-radius-sm); border:1px solid rgba(16,185,129,0.1);">
                            <div style="font-size:var(--nx-fs-xs); color:var(--nx-text-dim); text-transform:uppercase; letter-spacing:1px; margin-bottom:6px; font-weight:600;">
                                <i class="fa-solid fa-globe" style="color:var(--nx-green);"></i> Menşei
                            </div>
                            <div style="font-size:var(--nx-fs-md); font-weight:700; color:var(--nx-text);"><?= htmlspecialchars($distro['origin']) ?></div>
                        </div>
                        <div style="padding:var(--nx-sp-5); background:rgba(245,158,11,0.05); border-radius:var(--nx-radius-sm); border:1px solid rgba(245,158,11,0.1);">
                            <div style="font-size:var(--nx-fs-xs); color:var(--nx-text-dim); text-transform:uppercase; letter-spacing:1px; margin-bottom:6px; font-weight:600;">
                                <i class="fa-solid fa-calendar-check" style="color:var(--nx-amber);"></i> Kuruluş Yılı
                            </div>
                            <div style="font-size:var(--nx-fs-md); font-weight:700; color:var(--nx-text);"><?= htmlspecialchars($distro['founded']) ?></div>
                        </div>
                    </div>
                </div>

                <!-- Felsefe -->
                <div class="nx-card mb-6 reveal" style="padding:var(--nx-sp-8); border-left:3px solid var(--nx-purple);">
                    <h2 style="color:var(--nx-purple); margin-bottom:var(--nx-sp-4); display:flex; align-items:center; gap:10px;">
                        <i class="fa-solid fa-lightbulb" style="font-size:1.2rem;"></i> Felsefe & Vizyon
                    </h2>
                    <p style="line-height:1.9; font-size:var(--nx-fs-md); color:var(--nx-text-soft); font-style:italic;">
                        "<?= htmlspecialchars($distro['philosophy']) ?>"
                    </p>
                </div>

                <!-- Fun Fact -->
                <div class="nx-card mb-6 reveal" style="padding:var(--nx-sp-8); background:linear-gradient(135deg, rgba(245,158,11,0.05) 0%, rgba(239,68,68,0.03) 100%); border:1px solid rgba(245,158,11,0.15);">
                    <h2 style="color:var(--nx-amber); margin-bottom:var(--nx-sp-4); display:flex; align-items:center; gap:10px;">
                        <i class="fa-solid fa-star" style="font-size:1.2rem;"></i> Biliyor muydunuz?
                    </h2>
                    <p style="line-height:1.9; font-size:var(--nx-fs-md); color:var(--nx-text-soft);">
                        <?= htmlspecialchars($distro['fun_fact']) ?>
                    </p>
                </div>

                <!-- Score Bars -->
                <div class="nx-card mb-6 reveal" style="padding:var(--nx-sp-8); background:rgba(255,255,255,0.02);">
                    <h2 style="color:var(--nx-cyan); border-bottom:1px solid var(--nx-border); padding-bottom:var(--nx-sp-3); margin-bottom:var(--nx-sp-6); display:flex; align-items:center; gap:10px;">
                        <i class="fa-solid fa-chart-bar" style="font-size:1.2rem;"></i> Uygunluk Puanları (1-10)
                    </h2>
                    <div class="nx-score-container">
                        <?php 
                        $bars = [
                            'Yeni Başlayanlar' => ['score' => $distro['score_beginner'], 'color' => 'var(--nx-green)'],
                            'Geliştirici' => ['score' => $distro['score_dev'], 'color' => 'var(--nx-blue)'],
                            'Oyun Uyumluluğu' => ['score' => $distro['score_gaming'], 'color' => 'var(--nx-purple)'],
                            'Sunucu' => ['score' => $distro['score_server'], 'color' => 'var(--nx-amber)'],
                            'Eski Donanim' => ['score' => $distro['score_old_pc'], 'color' => 'var(--nx-red)'],
                            'Güvenlik' => ['score' => $distro['score_security'], 'color' => 'var(--nx-pink)'],
                        ];
                        foreach($bars as $label => $data):
                            $width = ($data['score'] * 10) . '%';
                        ?>
                        <div class="nx-score-item">
                            <div class="nx-score-label">
                                <span class="name"><?= $label ?></span>
                                <span class="val"><?= $data['score'] ?> / 10</span>
                            </div>
                            <div class="nx-score-bar">
                                <div class="nx-score-fill" style="width:<?= $width ?>; background:<?= $data['color'] ?>;"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Right: Identity Sidebar -->
            <aside>
                <div class="nx-identity-card reveal">
                    <h3><i class="fa-solid fa-fingerprint"></i> Teknik Kimlik</h3>
                    <ul class="nx-identity-list">
                        <li>
                            <div class="meta-label"><i class="fa-solid fa-code-branch"></i> Taban</div>
                            <div class="meta-value"><?= htmlspecialchars($distro['base_os']) ?></div>
                        </li>
                        <li>
                            <div class="meta-label"><i class="fa-solid fa-box"></i> Paket Yöneticisi</div>
                            <div class="meta-value"><?= htmlspecialchars($distro['package_manager']) ?></div>
                        </li>
                        <li>
                            <div class="meta-label"><i class="fa-solid fa-desktop"></i> Masaüstü</div>
                            <div class="meta-value"><?= htmlspecialchars($distro['desktop_environment']) ?></div>
                        </li>
                        <li style="border-top:1px solid var(--nx-border); padding-top:var(--nx-sp-5);">
                            <div class="meta-label"><i class="fa-solid fa-microchip" style="color:var(--nx-blue);"></i> RAM Tüketimi</div>
                            <div class="meta-value" style="font-family:var(--nx-font-mono); color:var(--nx-cyan);"><?= htmlspecialchars($distro['ram_usage']) ?></div>
                        </li>
                        <li style="border-top:1px solid var(--nx-border); padding-top:var(--nx-sp-5);">
                            <div class="meta-label"><i class="fa-solid fa-tag" style="color:var(--nx-green);"></i> Son Sürüm</div>
                            <div class="meta-value" style="color:var(--nx-green);"><?= htmlspecialchars($distro['latest_version']) ?></div>
                        </li>
                        <li style="border-top:1px solid var(--nx-border); padding-top:var(--nx-sp-5);">
                            <div class="meta-label"><i class="fa-solid fa-scale-balanced" style="color:var(--nx-amber);"></i> Lisans</div>
                            <div class="meta-value"><?= htmlspecialchars($distro['license']) ?></div>
                        </li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div class="nx-card reveal" style="padding:var(--nx-sp-6); margin-top:var(--nx-sp-6);">
                    <h4 style="margin-bottom:var(--nx-sp-4); font-size:var(--nx-fs-sm); text-transform:uppercase; letter-spacing:1px; color:var(--nx-text-dim);">Hızlı Bağlantılar</h4>
                    <div style="display:flex; flex-direction:column; gap:8px;">
                        <a href="<?= htmlspecialchars($distro['website']) ?>" target="_blank" class="btn-outline btn-sm" style="justify-content:center; width:100%;">
                            <i class="fa-solid fa-globe"></i> Resmi Site
                        </a>
                        <a href="index.php?page=quiz" class="btn-outline btn-sm" style="justify-content:center; width:100%; border-color:var(--nx-purple); color:var(--nx-purple)!important;">
                            <i class="fa-solid fa-wand-magic-sparkles"></i> Dağıtım Testi
                        </a>
                        <a href="index.php?page=distros" class="btn-ghost btn-sm" style="justify-content:center; width:100%;">
                            <i class="fa-solid fa-arrow-left"></i> Tüm Dağıtımlar
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
