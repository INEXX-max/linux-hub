<?php
// pages/distro_detail.php — NEXOS Distro Profile with Real DB Favorites
require_once 'includes/header.php';

if(!isset($_GET['slug'])) { redirect('index.php?page=distros'); }
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
        redirect('index.php?page=distro_detail&slug='.$distro['slug']);
    } else {
        setFlashMessage('warning', 'Favorilere eklemek icin giris yapin.');
        redirect('index.php?page=login');
    }
}

// Favori Silme
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_favorite'])) {
    if(isLoggedIn()) {
        removeFavorite($_SESSION['user_id'], $distro['id']);
        setFlashMessage('info', $distro['name'] . ' favorilerden cikarildi.');
        redirect('index.php?page=distro_detail&slug='.$distro['slug']);
    }
}

$is_favorite = false;
if(isLoggedIn()) {
    $favIds = getUserFavorites($_SESSION['user_id']);
    $is_favorite = in_array($distro['id'], $favIds);
}

$badgeClass = 'nx-badge-' . ($distro['difficulty'] === 'Beginner' ? 'green' : ($distro['difficulty'] === 'Intermediate' ? 'amber' : 'red'));
?>

<section class="nx-section-sm">
    <div class="container">
        <!-- Back + Favorite -->
        <div class="d-flex justify-between items-center mb-6 reveal">
            <a href="index.php?page=distros" class="btn-ghost"><i class="fa-solid fa-arrow-left"></i> Geri Don</a>
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
                            <i class="fa-solid fa-star"></i> Koleksiyondan Cikar
                        </button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Header -->
        <div class="nx-detail-header mb-8 reveal">
            <div class="d-flex justify-between items-center mb-3">
                <h1 style="margin:0; color:var(--nx-blue);"><?= htmlspecialchars($distro['name']) ?></h1>
                <span class="nx-badge <?= $badgeClass ?>" style="padding:8px 18px; font-size:var(--nx-fs-sm);">
                    <?= htmlspecialchars($distro['difficulty']) ?>
                </span>
            </div>
            <p class="text-muted" style="font-size:var(--nx-fs-lg); margin:0;"><?= htmlspecialchars($distro['short_desc']) ?></p>
        </div>

        <!-- 2 Col Layout -->
        <div class="nx-detail-layout">
            <!-- Left -->
            <div>
                <div class="nx-card mb-6 reveal" style="padding:var(--nx-sp-8);">
                    <h2 style="color:var(--nx-cyan); border-bottom:1px solid var(--nx-border); padding-bottom:var(--nx-sp-3);">Detayli Inceleme</h2>
                    <p style="line-height:1.8; font-size:var(--nx-fs-md); white-space:pre-line;"><?= htmlspecialchars($distro['full_desc']) ?></p>
                </div>

                <!-- Score Bars -->
                <div class="nx-card mb-6 reveal" style="padding:var(--nx-sp-8); background:rgba(255,255,255,0.02);">
                    <h2 style="color:var(--nx-cyan); border-bottom:1px solid var(--nx-border); padding-bottom:var(--nx-sp-3); margin-bottom:var(--nx-sp-6);">Uygunluk Puanlari (1-10)</h2>
                    <div class="nx-score-container">
                        <?php 
                        $bars = [
                            'Yeni Baslayanlar' => ['score' => $distro['score_beginner'], 'color' => 'var(--nx-green)'],
                            'Gelistirici' => ['score' => $distro['score_dev'], 'color' => 'var(--nx-blue)'],
                            'Oyun Uyumlulugu' => ['score' => $distro['score_gaming'], 'color' => 'var(--nx-purple)'],
                            'Sunucu' => ['score' => $distro['score_server'], 'color' => 'var(--nx-amber)'],
                            'Eski Donanim' => ['score' => $distro['score_old_pc'], 'color' => 'var(--nx-red)'],
                            'Guvenlik' => ['score' => $distro['score_security'], 'color' => 'var(--nx-pink)'],
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

            <!-- Right: Identity -->
            <aside>
                <div class="nx-identity-card reveal">
                    <h3><i class="fa-solid fa-fingerprint"></i> Teknik Kimlik</h3>
                    <ul class="nx-identity-list">
                        <li>
                            <div class="meta-label"><i class="fa-solid fa-code-branch"></i> Taban</div>
                            <div class="meta-value"><?= htmlspecialchars($distro['base_os']) ?></div>
                        </li>
                        <li>
                            <div class="meta-label"><i class="fa-solid fa-box"></i> Paket Yoneticisi</div>
                            <div class="meta-value"><?= htmlspecialchars($distro['package_manager']) ?></div>
                        </li>
                        <li>
                            <div class="meta-label"><i class="fa-solid fa-desktop"></i> Masaustu</div>
                            <div class="meta-value"><?= htmlspecialchars($distro['desktop_environment']) ?></div>
                        </li>
                        <li style="border-top:1px solid var(--nx-border); padding-top:var(--nx-sp-5);">
                            <div class="meta-label"><i class="fa-solid fa-microchip" style="color:var(--nx-blue);"></i> RAM Tuketimi</div>
                            <div class="meta-value" style="font-family:var(--nx-font-mono); color:var(--nx-cyan);"><?= htmlspecialchars($distro['ram_usage']) ?></div>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
