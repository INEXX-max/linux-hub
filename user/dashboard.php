<?php
// user/dashboard.php — NEXOS User Dashboard
require_once 'includes/header.php';

if(!isLoggedIn()){
    setFlashMessage('warning', 'Dashboard alanına erişmek için giriş yapmalısınız.');
    redirect('index.php?page=login');
}

global $linux_distros;
$favorites = [];
if(isset($_SESSION['favorites'])) {
    $favs_reversed = array_reverse($_SESSION['favorites']);
    foreach($favs_reversed as $fav_id) {
        foreach($linux_distros as $d) {
            if($d['id'] == $fav_id) { $favorites[] = $d; }
        }
    }
}

$last_quiz = null;
if(isset($_SESSION['last_quiz_result'])) {
    $res = $_SESSION['last_quiz_result'];
    foreach($linux_distros as $d) {
        if($d['id'] == $res['recommended_distro_id']) {
            $last_quiz = ['created_at' => $res['created_at'], 'distro_name' => $d['name'], 'distro_slug' => $d['slug']];
            break;
        }
    }
}
?>

<div class="nx-dashboard">
    <!-- Sidebar -->
    <aside class="nx-dash-sidebar">
        <div class="nx-dash-sidebar-user">
            <div class="nx-dash-avatar"><i class="fa-solid fa-user-astronaut"></i></div>
            <h4><?= htmlspecialchars($_SESSION['username']) ?></h4>
            <p>NEXOS Üyesi</p>
        </div>
        <ul class="nx-dash-nav">
            <li><a href="index.php?page=dashboard" class="active"><i class="fa-solid fa-house"></i> Genel Bakış</a></li>
            <li><a href="index.php?page=distros"><i class="fa-solid fa-th-large"></i> Dağıtımlar</a></li>
            <li><a href="index.php?page=quiz"><i class="fa-solid fa-wand-magic-sparkles"></i> Quiz</a></li>
            <li><a href="index.php?page=what-is-linux"><i class="fa-solid fa-book-open"></i> Öğrenme</a></li>
            <li><a href="index.php?page=logout"><i class="fa-solid fa-right-from-bracket"></i> Çıkış</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="nx-dash-main">
        <!-- Welcome -->
        <div class="nx-dash-welcome reveal">
            <div class="nx-dash-welcome-icon"><i class="fa-solid fa-terminal"></i></div>
            <div>
                <h2>Hoş Geldin, <?= htmlspecialchars($_SESSION['username']) ?></h2>
                <p><i class="fa-solid fa-shield-halved"></i> NEXOS platformuna başarıyla bağlandın.</p>
            </div>
        </div>

        <!-- Stats -->
        <div class="nx-dash-stats reveal">
            <div class="nx-dash-stat-card">
                <div class="nx-dash-stat-icon nx-icon-box-blue"><i class="fa-solid fa-star"></i></div>
                <div>
                    <div class="stat-value"><?= count($favorites) ?></div>
                    <div class="stat-label">Favori Dağıtım</div>
                </div>
            </div>
            <div class="nx-dash-stat-card">
                <div class="nx-dash-stat-icon nx-icon-box-green"><i class="fa-solid fa-vial"></i></div>
                <div>
                    <div class="stat-value"><?= $last_quiz ? '1' : '0' ?></div>
                    <div class="stat-label">Tamamlanan Quiz</div>
                </div>
            </div>
            <div class="nx-dash-stat-card">
                <div class="nx-dash-stat-icon nx-icon-box-purple"><i class="fa-solid fa-book-open"></i></div>
                <div>
                    <div class="stat-value"><?= count($linux_distros) ?></div>
                    <div class="stat-label">Keşfedilebilir Distro</div>
                </div>
            </div>
        </div>

        <!-- Two Column: Favorites + Quiz -->
        <div style="display:grid; grid-template-columns:2fr 1fr; gap:var(--nx-sp-6);">
            <!-- Favorites -->
            <div>
                <h3 class="text-cyan mb-4"><i class="fa-solid fa-star"></i> Koleksiyonum</h3>
                <?php if(count($favorites) > 0): ?>
                <div class="grid grid-auto-sm gap-4">
                    <?php foreach($favorites as $fav): ?>
                    <div class="nx-card reveal" style="padding:var(--nx-sp-5);">
                        <div class="d-flex justify-between items-center mb-2">
                            <h4 style="color:var(--nx-blue); margin:0; font-size:var(--nx-fs-md);"><?= htmlspecialchars($fav['name']) ?></h4>
                            <span class="nx-badge nx-badge-blue" style="font-size:0.65rem;"><?= $fav['difficulty'] ?></span>
                        </div>
                        <p class="text-muted mb-3" style="font-size:var(--nx-fs-xs); line-height:1.5;"><?= htmlspecialchars($fav['short_desc']) ?></p>
                        <a href="index.php?page=distro_detail&slug=<?= $fav['slug'] ?>" class="btn-outline btn-sm w-full" style="justify-content:center;">Detay</a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <div class="nx-card text-center" style="padding:var(--nx-sp-10); background:rgba(0,0,0,0.2);">
                    <i class="fa-regular fa-folder-open mb-3" style="font-size:2.5rem; color:var(--nx-text-dim);"></i>
                    <p class="text-muted">Henüz favori eklemediniz.</p>
                    <a href="index.php?page=distros" class="btn-primary btn-sm mt-3">Dağıtımları Keşfet</a>
                </div>
                <?php endif; ?>
            </div>

            <!-- Quiz Result -->
            <div>
                <h3 class="text-primary mb-4"><i class="fa-solid fa-robot"></i> Quiz Sonucum</h3>
                <?php if($last_quiz): ?>
                <div class="nx-card reveal" style="border:1px solid rgba(16,185,129,0.2); background:var(--nx-green-subtle);">
                    <div class="text-center mb-4">
                        <span class="text-muted" style="font-size:var(--nx-fs-xs);">
                            <i class="fa-regular fa-clock"></i> <?= date('d M Y — H:i', strtotime($last_quiz['created_at'])) ?>
                        </span>
                    </div>
                    <h4 class="text-center text-green">Senin İçin En İyisi:</h4>
                    <div class="text-center mt-3 mb-5">
                        <strong style="font-size:var(--nx-fs-3xl); font-family:var(--nx-font-mono);"><?= htmlspecialchars($last_quiz['distro_name']) ?></strong>
                    </div>
                    <a href="index.php?page=distro_detail&slug=<?= $last_quiz['distro_slug'] ?>" class="btn-highlight w-full" style="justify-content:center;">İncele</a>
                    <div class="text-center mt-3">
                        <a href="index.php?page=quiz" style="font-size:var(--nx-fs-xs); color:var(--nx-text-muted); text-decoration:underline;">Testi Tekrar Çöz</a>
                    </div>
                </div>
                <?php else: ?>
                <div class="nx-card text-center reveal" style="padding:var(--nx-sp-10); background:rgba(0,0,0,0.2);">
                    <i class="fa-solid fa-vial-circle-check text-green mb-3" style="font-size:2.5rem;"></i>
                    <p class="text-muted" style="font-size:var(--nx-fs-sm);">Quiz sonucunuz yok. Hemen deneyin!</p>
                    <a href="index.php?page=quiz" class="btn-highlight btn-sm mt-3">Quiz'e Başla</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Recommended -->
        <div class="mt-8 reveal">
            <h3 class="text-purple mb-4"><i class="fa-solid fa-compass"></i> Önerilen İçerikler</h3>
            <div class="grid grid-3 gap-4">
                <a href="index.php?page=what-is-linux" class="nx-card-glow" style="padding:var(--nx-sp-5); text-decoration:none;">
                    <div class="nx-icon-box nx-icon-box-blue mb-3" style="width:40px; height:40px;"><i class="fa-solid fa-book-open"></i></div>
                    <h5 style="margin-bottom:var(--nx-sp-1);">Linux Nedir?</h5>
                    <p class="text-muted mb-0" style="font-size:var(--nx-fs-xs);">Temel kavramları öğrenin.</p>
                </a>
                <a href="index.php?page=architecture" class="nx-card-glow" style="padding:var(--nx-sp-5); text-decoration:none;">
                    <div class="nx-icon-box nx-icon-box-purple mb-3" style="width:40px; height:40px;"><i class="fa-solid fa-layer-group"></i></div>
                    <h5 style="margin-bottom:var(--nx-sp-1);">Mimari</h5>
                    <p class="text-muted mb-0" style="font-size:var(--nx-fs-xs);">Kernel, shell, dosya sistemi.</p>
                </a>
                <a href="index.php?page=use_cases" class="nx-card-glow" style="padding:var(--nx-sp-5); text-decoration:none;">
                    <div class="nx-icon-box nx-icon-box-green mb-3" style="width:40px; height:40px;"><i class="fa-solid fa-compass"></i></div>
                    <h5 style="margin-bottom:var(--nx-sp-1);">Kullanım Alanları</h5>
                    <p class="text-muted mb-0" style="font-size:var(--nx-fs-xs);">Hangi senaryo size uygun?</p>
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
