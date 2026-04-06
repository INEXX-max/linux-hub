<?php
// user/dashboard.php
require_once 'includes/header.php';

if(!isLoggedIn()){
    setFlashMessage('warning', 'Dashboard alanına erişmek için giriş yapmalısınız.');
    redirect('index.php?page=login');
}

// Kullanıcının favorilerini çek (Session Simülasyonu)
global $linux_distros;
$favorites = [];
if(isset($_SESSION['favorites'])) {
    // Array reverse yapalım ki son eklenen başta görünsün
    $favs_reversed = array_reverse($_SESSION['favorites']);
    foreach($favs_reversed as $fav_id) {
        foreach($linux_distros as $d) {
            if($d['id'] == $fav_id) {
                $favorites[] = $d;
            }
        }
    }
}

// Kullanıcının son test sonucunu çek (Session Simülasyonu)
$last_quiz = null;
if(isset($_SESSION['last_quiz_result'])) {
    $res = $_SESSION['last_quiz_result'];
    foreach($linux_distros as $d) {
        if($d['id'] == $res['recommended_distro_id']) {
            $last_quiz = [
                'created_at' => $res['created_at'],
                'distro_name' => $d['name'],
                'distro_slug' => $d['slug']
            ];
            break;
        }
    }
}
?>

<div class="container mt-5 mb-5">
    
    <div class="card mb-5" style="border-top: 5px solid var(--primary-color); display:flex; align-items:center; gap:20px;">
        <div style="width: 80px; height: 80px; background: rgba(59, 130, 246, 0.2); border-radius: 50%; display:flex; justify-content:center; align-items:center; font-size:2.5rem; color:var(--primary-color);">
            <i class="fa-solid fa-user-astronaut"></i>
        </div>
        <div>
            <h1 class="text-primary" style="margin:0; font-size:2.2rem;">Hoş Geldin, <?= htmlspecialchars($_SESSION['username']) ?></h1>
            <p class="text-muted" style="margin:0;"><i class="fa-solid fa-shield-cat"></i> Terminaline başarıyla bağlandın.</p>
        </div>
    </div>

    <div class="layout-grid" style="display:grid; grid-template-columns: 2fr 1fr; gap:30px;">
        
        <!-- Favorilerim Alanı -->
        <div class="favorites-section">
            <h2 class="text-accent mb-4"><i class="fa-solid fa-star"></i> Koleksiyonum (Favoriler)</h2>
            
            <?php if(count($favorites) > 0): ?>
                <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap:20px;">
                    <?php foreach($favorites as $fav): ?>
                        <div class="card" style="padding: 20px;">
                            <div class="d-flex justify-between align-center mb-2">
                                <h3 class="text-primary" style="margin:0; font-size:1.2rem;"><?= htmlspecialchars($fav['name']) ?></h3>
                            </div>
                            <span class="badge" style="font-size:0.75rem; color:#fff; background:rgba(255,255,255,0.1); padding:3px 8px; border-radius:4px;"><?= htmlspecialchars($fav['difficulty']) ?></span>
                            <p class="text-muted mt-2" style="font-size:0.9rem; line-height:1.5;"><?= htmlspecialchars($fav['short_desc']) ?></p>
                            <a href="index.php?page=distro_detail&slug=<?= $fav['slug'] ?>" class="btn-outline" style="width:100%; text-align:center; padding:8px; margin-top:10px; font-size:0.9rem;">Detaya Git</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="card text-center" style="padding: 40px; background:rgba(0,0,0,0.2);">
                    <i class="fa-regular fa-folder-open mb-3" style="font-size:3rem; color:var(--text-muted);"></i>
                    <p class="text-muted">Henüz hiçbir dağıtımı favorilerine eklemedin.</p>
                    <a href="index.php?page=distros" class="btn-primary mt-3">Dağıtımları Keşfet</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Quiz Sonuçları Alanı -->
        <div class="quiz-history-section">
            <h2 class="text-primary mb-4"><i class="fa-solid fa-robot"></i> AI Öneri Sonucum</h2>

            <?php if($last_quiz): ?>
                <div class="card" style="border:1px solid rgba(16, 185, 129, 0.3); background: rgba(16, 185, 129, 0.05);">
                    <div style="text-align:center; margin-bottom: 20px;">
                        <span style="font-size:0.8rem; color:var(--text-muted);"><i class="fa-regular fa-clock"></i> <?= date('d M Y - H:i', strtotime($last_quiz['created_at'])) ?></span>
                    </div>
                    
                    <h3 class="text-center text-accent" style="font-size:1.5rem;">Senin İçin En İyisi:</h3>
                    
                    <div class="text-center mt-3 mb-4">
                        <strong style="font-size:2.5rem; color:#fff; font-family:var(--font-mono);"><?= htmlspecialchars($last_quiz['distro_name']) ?></strong>
                    </div>

                    <a href="index.php?page=distro_detail&slug=<?= $last_quiz['distro_slug'] ?>" class="btn-highlight" style="width:100%; justify-content:center;">İncele ve Kuruluma Başla</a>

                    <div class="text-center mt-3">
                        <a href="index.php?page=quiz" style="font-size:0.85rem; color:var(--text-muted); text-decoration:underline;">Testi Tekrar Çöz</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="card text-center" style="padding: 40px; background:rgba(0,0,0,0.2);">
                    <i class="fa-solid fa-vial-circle-check" style="font-size:3rem; color:var(--accent-color); margin-bottom:15px;"></i>
                    <p class="text-muted text-sm">Hangi sistemin sana uygun olduğunu bilmiyor musun? Hemen algoritmamıza danış.</p>
                    <a href="index.php?page=quiz" class="btn-highlight mt-3">Testi Çöz</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>

<style>
@media(max-width:992px){
    .layout-grid { grid-template-columns: 1fr !important; }
}
</style>

<?php require_once 'includes/footer.php'; ?>
