<?php
// user/dashboard.php — NEXOS Dashboard with Real SQLite Data
require_once 'includes/header.php';

if(!isLoggedIn()){
    setFlashMessage('warning', 'Dashboard icin giris yapin.');
    redirect('index.php?page=login');
}

global $linux_distros;

// Gercek DB favorileri
$favIds = getUserFavorites($_SESSION['user_id']);
$favorites = [];
foreach($favIds as $fid) {
    foreach($linux_distros as $d) {
        if($d['id'] == $fid) { $favorites[] = $d; }
    }
}

// Gercek DB quiz sonucu
$last_quiz = null;
$quizResult = getLastQuizResult($_SESSION['user_id']);
if($quizResult) {
    foreach($linux_distros as $d) {
        if($d['id'] == $quizResult['recommended_distro_id']) {
            $last_quiz = [
                'created_at' => $quizResult['created_at'],
                'distro_name' => $d['name'],
                'distro_slug' => $d['slug']
            ];
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
            <p style="font-size:var(--nx-fs-xs); color:var(--nx-text-muted);"><?= htmlspecialchars($_SESSION['email'] ?? '') ?></p>
        </div>
        <ul class="nx-dash-nav">
            <li><a href="index.php?page=dashboard" class="active"><i class="fa-solid fa-house"></i> Genel Bakis</a></li>
            <li><a href="index.php?page=distros"><i class="fa-solid fa-th-large"></i> Dagitimlar</a></li>
            <li><a href="index.php?page=quiz"><i class="fa-solid fa-wand-magic-sparkles"></i> Quiz</a></li>
            <li><a href="index.php?page=what-is-linux"><i class="fa-solid fa-book-open"></i> Ogrenme</a></li>
            <li><a href="index.php?page=logout"><i class="fa-solid fa-right-from-bracket"></i> Cikis</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="nx-dash-main">
        <!-- Welcome -->
        <div class="nx-dash-welcome reveal">
            <div class="nx-dash-welcome-icon"><i class="fa-solid fa-terminal"></i></div>
            <div>
                <h2>Hos Geldin, <?= htmlspecialchars($_SESSION['username']) ?></h2>
                <p><i class="fa-solid fa-shield-halved"></i> Platformda basariyla oturum acildi.</p>
            </div>
        </div>

        <!-- Stats -->
        <div class="nx-dash-stats reveal">
            <div class="nx-dash-stat-card">
                <div class="nx-dash-stat-icon nx-icon-box-blue"><i class="fa-solid fa-star"></i></div>
                <div>
                    <div class="stat-value"><?= count($favorites) ?></div>
                    <div class="stat-label">Favori Dagitim</div>
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
                    <div class="stat-label">Kesfedilebilir Distro</div>
                </div>
            </div>
        </div>

        <!-- Two Column -->
        <div style="display:grid; grid-template-columns:2fr 1fr; gap:var(--nx-sp-6);">
            <!-- Favorites -->
            <div>
                <h3 class="text-cyan mb-4"><i class="fa-solid fa-star"></i> Koleksiyonum</h3>
                <?php if(count($favorites) > 0): ?>
                <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(250px, 1fr)); gap:var(--nx-sp-4);">
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
                <div class="nx-card text-center" style="padding:var(--nx-sp-10); background:rgba(255,255,255,0.02);">
                    <i class="fa-regular fa-folder-open mb-3" style="font-size:2.5rem; color:var(--nx-text-dim);"></i>
                    <p class="text-muted">Henuz favori eklemediniz.</p>
                    <a href="index.php?page=distros" class="btn-primary btn-sm mt-3">Dagitimlari Kesfet</a>
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
                            <i class="fa-regular fa-clock"></i> <?= date('d M Y H:i', strtotime($last_quiz['created_at'])) ?>
                        </span>
                    </div>
                    <h4 class="text-center" style="color:var(--nx-green);">Senin Icin En Iyisi:</h4>
                    <div class="text-center mt-3 mb-5">
                        <strong style="font-size:var(--nx-fs-3xl); font-family:var(--nx-font-mono);"><?= htmlspecialchars($last_quiz['distro_name']) ?></strong>
                    </div>
                    <a href="index.php?page=distro_detail&slug=<?= $last_quiz['distro_slug'] ?>" class="btn-highlight w-full" style="justify-content:center;">Incele</a>
                </div>
                <?php else: ?>
                <div class="nx-card text-center reveal" style="padding:var(--nx-sp-10); background:rgba(255,255,255,0.02);">
                    <i class="fa-solid fa-vial-circle-check mb-3" style="font-size:2.5rem; color:var(--nx-green);"></i>
                    <p class="text-muted" style="font-size:var(--nx-fs-sm);">Quiz sonucunuz yok.</p>
                    <a href="index.php?page=quiz" class="btn-highlight btn-sm mt-3">Quiz'e Basla</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
