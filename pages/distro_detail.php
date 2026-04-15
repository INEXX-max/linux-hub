<?php
// pages/distro_detail.php — NEXOS Distro Profile
require_once 'includes/header.php';

if(!isset($_GET['slug'])) { redirect('index.php?page=distros'); }
$slug = sanitizeInput($_GET['slug']);
$distro = getDistroBySlug($slug);

if(!$distro) {
    echo "<div class='container' style='padding:var(--nx-sp-20) 0; text-align:center;'><h1 class='text-primary'>Sistem Bulunamadı!</h1><br><a href='index.php?page=distros' class='btn-primary mt-4'>Dağıtımlara Dön</a></div>";
    require_once 'includes/footer.php';
    exit;
}

// Favori Ekleme
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_favorite'])) {
    if(isLoggedIn()) {
        if(!isset($_SESSION['favorites'])) $_SESSION['favorites'] = [];
        if(!in_array($distro['id'], $_SESSION['favorites'])){
            $_SESSION['favorites'][] = $distro['id'];
            setFlashMessage('success', $distro['name'] . ' favorilerinize eklendi.');
        } else {
            setFlashMessage('info', 'Bu sistem zaten favorilerinizde.');
        }
        redirect('index.php?page=distro_detail&slug='.$distro['slug']);
    } else {
        setFlashMessage('warning', 'Favorilere eklemek için giriş yapın.');
        redirect('index.php?page=login');
    }
}

$is_favorite = isLoggedIn() && isset($_SESSION['favorites']) && in_array($distro['id'], $_SESSION['favorites']);
$badgeClass = 'nx-badge-' . ($distro['difficulty'] === 'Beginner' ? 'green' : ($distro['difficulty'] === 'Intermediate' ? 'amber' : 'red'));
?>

<section class="nx-section-sm">
    <div class="container">
        <!-- Back + Favorite -->
        <div class="d-flex justify-between items-center mb-6 reveal">
            <a href="index.php?page=distros" class="btn-ghost"><i class="fa-solid fa-arrow-left"></i> Geri Dön</a>
            <?php if(!$is_favorite): ?>
                <form method="POST" style="display:inline;">
                    <button type="submit" name="add_favorite" class="btn-outline" style="border-color:var(--nx-amber); color:var(--nx-amber)!important;">
                        <i class="fa-regular fa-star"></i> Koleksiyona Ekle
                    </button>
                </form>
            <?php else: ?>
                <span class="btn-text" style="color:var(--nx-amber)!important;"><i class="fa-solid fa-star"></i> Favoride</span>
            <?php endif; ?>
        </div>

        <!-- Header -->
        <div class="nx-detail-header mb-8 reveal">
            <div class="d-flex justify-between items-center mb-3 md-flex-col gap-4">
                <h1 style="margin:0; color:var(--nx-blue);"><?= htmlspecialchars($distro['name']) ?></h1>
                <span class="nx-badge <?= $badgeClass ?>" style="padding:8px 18px; font-size:var(--nx-fs-sm);">
                    Zorluk: <?= htmlspecialchars($distro['difficulty']) ?>
                </span>
            </div>
            <p class="text-muted" style="font-size:var(--nx-fs-lg); margin:0;"><?= htmlspecialchars($distro['short_desc']) ?></p>
        </div>

        <!-- 2 Col Layout -->
        <div class="nx-detail-layout">
            <!-- Left: Content -->
            <div>
                <!-- Description -->
                <div class="nx-card mb-6 reveal" style="padding:var(--nx-sp-8);">
                    <h2 style="color:var(--nx-cyan); border-bottom:1px solid var(--nx-border); padding-bottom:var(--nx-sp-3);">Detaylı İnceleme</h2>
                    <p style="line-height:1.8; font-size:var(--nx-fs-md); white-space:pre-line;"><?= htmlspecialchars($distro['full_desc']) ?></p>
                </div>

                <!-- Score Bars -->
                <div class="nx-card mb-6 reveal" style="padding:var(--nx-sp-8); background:rgba(0,0,0,0.2);">
                    <h2 style="color:var(--nx-cyan); border-bottom:1px solid var(--nx-border); padding-bottom:var(--nx-sp-3); margin-bottom:var(--nx-sp-6);">Uygunluk Puanları (1-10)</h2>
                    <p class="text-muted mb-6" style="font-size:var(--nx-fs-xs);"><i class="fa-solid fa-circle-info text-primary"></i> Saf kurulumda, ek modifikasyon olmadan spesifik kullanıcılara hitap oranı.</p>
                    
                    <div class="nx-score-container">
                        <?php 
                        $bars = [
                            'Yeni Başlayanlar İçin' => ['score' => $distro['score_beginner'], 'color' => 'var(--nx-green)'],
                            'Geliştirici Potansiyeli' => ['score' => $distro['score_dev'], 'color' => 'var(--nx-blue)'],
                            'Oyun Uyumluluğu' => ['score' => $distro['score_gaming'], 'color' => 'var(--nx-purple)'],
                            'Sunucu Stabilitesi' => ['score' => $distro['score_server'], 'color' => 'var(--nx-amber)'],
                            'Eski Donanım' => ['score' => $distro['score_old_pc'], 'color' => 'var(--nx-red)'],
                            'Siber Güvenlik' => ['score' => $distro['score_security'], 'color' => 'var(--nx-pink)'],
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

                <!-- Contextual Alerts -->
                <div class="reveal" style="display:flex; flex-direction:column; gap:var(--nx-sp-4);">
                    <?php if($distro['score_beginner'] >= 9): ?>
                    <div class="nx-alert nx-alert-green">
                        <strong><i class="fa-solid fa-handshake"></i> İlk Geçiş İçin Mükemmel!</strong> Terminal komutlarıyla yüzleşmeden gündelik işlerinizi yapabileceğiniz başlangıç sistemidir.
                    </div>
                    <?php endif; ?>
                    <?php if($distro['score_beginner'] <= 3): ?>
                    <div class="nx-alert nx-alert-red">
                        <strong><i class="fa-solid fa-triangle-exclamation"></i> İleri Seviye!</strong> Bu sistem konsol hakimiyeti gerektirir. Kurulumu bile belli oranda bilgi gerektirebilir.
                    </div>
                    <?php endif; ?>
                    <?php if($distro['score_old_pc'] >= 8): ?>
                    <div class="nx-alert">
                        <strong><i class="fa-solid fa-laptop-medical"></i> Can Suyu Sistemi!</strong> Eski donanımınızı tekrar hızlı hale getirecek hafif bir dağıtım.
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right: Identity Sidebar -->
            <aside>
                <div class="nx-identity-card reveal">
                    <h3><i class="fa-solid fa-fingerprint"></i> Teknik Kimlik</h3>
                    <ul class="nx-identity-list">
                        <li>
                            <div class="meta-label"><i class="fa-solid fa-code-branch"></i> Taban Mimarisi</div>
                            <div class="meta-value"><?= htmlspecialchars($distro['base_os']) ?></div>
                        </li>
                        <li>
                            <div class="meta-label"><i class="fa-solid fa-box"></i> Paket Yöneticisi</div>
                            <div class="meta-value"><?= htmlspecialchars($distro['package_manager']) ?></div>
                        </li>
                        <li>
                            <div class="meta-label"><i class="fa-solid fa-desktop"></i> Masaüstü Ortamı</div>
                            <div class="meta-value"><?= htmlspecialchars($distro['desktop_environment']) ?></div>
                        </li>
                        <li style="border-top:1px solid var(--nx-border); padding-top:var(--nx-sp-5); margin-top:var(--nx-sp-2);">
                            <div class="meta-label"><i class="fa-solid fa-microchip" style="color:var(--nx-blue);"></i> Boşta RAM Tüketimi</div>
                            <div class="meta-value" style="font-family:var(--nx-font-mono); color:var(--nx-cyan);"><?= htmlspecialchars($distro['ram_usage']) ?></div>
                        </li>
                    </ul>
                    <div style="margin-top:var(--nx-sp-6); padding:var(--nx-sp-4); background:rgba(0,0,0,0.3); border-radius:var(--nx-radius-sm); font-size:var(--nx-fs-xs); color:var(--nx-text-muted);">
                        <i class="fa-solid fa-hard-drive"></i> SSD üzerine kurulum tavsiye edilir.
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
