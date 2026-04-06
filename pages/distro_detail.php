<?php
// pages/distro_detail.php
require_once 'includes/header.php';

if(!isset($_GET['slug'])) {
    redirect('index.php?page=distros');
}

$slug = sanitizeInput($_GET['slug']);
$distro = getDistroBySlug($slug);

if(!$distro) {
    echo "<div class='container mt-5 mb-5 text-center'><h1 class='text-primary'>Aranan Sistem Şimdilik Veritabanımızda Yok!</h1><br><a href='index.php?page=distros' class='btn-primary mt-3'>Dağıtımlara Geri Dön</a></div>";
    require_once 'includes/footer.php';
    exit;
}

// Favori Ekleme Mekanizması (Session Simülasyonu)
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_favorite'])) {
    if(isLoggedIn()) {
        if(!isset($_SESSION['favorites'])) $_SESSION['favorites'] = [];
        
        if(!in_array($distro['id'], $_SESSION['favorites'])){
            $_SESSION['favorites'][] = $distro['id'];
            setFlashMessage('success', $distro['name'] . ' kişisel favorilerinize eklendi.');
        } else {
            setFlashMessage('info', 'Bu sistem zaten favorilerinizde mevcut.');
        }
        redirect('index.php?page=distro_detail&slug='.$distro['slug']);
    } else {
        setFlashMessage('warning', 'Favorilerinize sistem eklemek için önce giriş yapmalısınız.');
        redirect('index.php?page=login');
    }
}

// Favoride mi? Buton render durumu için:
$is_favorite = false;
if(isLoggedIn() && isset($_SESSION['favorites']) && in_array($distro['id'], $_SESSION['favorites'])){
    $is_favorite = true;
}
?>

<div class="container mt-5 mb-5">
    <div class="d-flex justify-between align-center mb-4">
        <a href="index.php?page=distros" class="btn-text" style="color:var(--text-muted);"><i class="fa-solid fa-arrow-left"></i> Geri Dön</a>
        <?php if(!$is_favorite): ?>
            <form method="POST" style="display:inline;">
                <button type="submit" name="add_favorite" class="btn-outline" style="border-color:#ff9f43; color:#ff9f43!important;"><i class="fa-regular fa-star"></i> Koleksiyona Ekle</button>
            </form>
        <?php else: ?>
            <button disabled class="btn-text" style="color:#ff9f43!important; cursor:default;"><i class="fa-solid fa-star"></i> Favoride</button>
        <?php endif; ?>
    </div>

    <!-- Header Bilgisi -->
    <div class="card mb-5" style="border-top: 6px solid var(--primary-color);">
        <div class="d-flex justify-between align-center mb-2">
            <h1 class="text-primary" style="font-size:3rem; margin:0; line-height: 1;"><?= htmlspecialchars($distro['name']) ?></h1>
            <span class="badge badge-<?= strtolower($distro['difficulty']) ?>" style="padding: 8px 15px; border-radius:12px; font-weight:bold; letter-spacing:1px; font-size:1rem; text-transform:uppercase;">
                Zorluk: <?= htmlspecialchars($distro['difficulty']) ?>
            </span>
        </div>
        <p class="text-muted mt-3" style="font-size:1.2rem; margin-bottom: 0;"><?= htmlspecialchars($distro['short_desc']) ?></p>
    </div>

    <!-- İçerik Grid: 2 Column Layout -->
    <div class="layout-grid" style="display:grid; grid-template-columns: 2fr 1fr; gap:40px;">
        
        <!-- Sol Kolon: Açıklama ve AI Skor Yorumu -->
        <article class="distro-article">
            <h2 class="text-accent mb-3" style="border-bottom:1px solid var(--border-color); padding-bottom:8px;">Detaylı İnceleme</h2>
            <div class="card mb-5" style="line-height:1.8; font-size:1.05rem; white-space: pre-line;">
                <!-- Veritabanındaki salt metni yeni satırlarıyla yazdıralım -->
                <?= htmlspecialchars($distro['full_desc']) ?>
            </div>

            <!-- Uygunluk Kartları (Skor Analizi Grafikleri Puanı) -->
            <h2 class="text-accent mb-3" style="border-bottom:1px solid var(--border-color); padding-bottom:8px;">Uygunluk ve Potansiyel (1-10)</h2>
            <div class="card mb-4" style="background: rgba(0,0,0,0.2);">
                <p class="text-muted" style="font-size:0.85rem; margin-bottom: 20px;"><i class="fa-solid fa-circle-info text-primary"></i> Aşağıdaki oranlar, sistemin saf (out-of-the-box) kurulumunda, ek modifikasyon gerektirmeden spesifik kullanıcılara ne kadar hitap ettiğini yansıtır.</p>
                
                <div style="display:flex; flex-direction:column; gap:20px;">
                    <?php 
                    $bars = [
                        'Yeni Başlayanlar İçin Uyumluluk' => ['score' => $distro['score_beginner'], 'color' => '#10b981'],
                        'Modding / Geliştirici Potansiyeli' => ['score' => $distro['score_dev'], 'color' => '#3b82f6'],
                        'Oyun (Proton/Lutris) Uyumluluğu' => ['score' => $distro['score_gaming'], 'color' => '#8b5cf6'],
                        'Sunucu ve Backend Stabilitesi' => ['score' => $distro['score_server'], 'color' => '#f59e0b'],
                        'Eski & Zayıf Donanım Performansı' => ['score' => $distro['score_old_pc'], 'color' => '#ef4444'],
                        'Siber Güvenlik / Hacking Hazır Paketi' => ['score' => $distro['score_security'], 'color' => '#ec4899']
                    ];
                    
                    foreach($bars as $label => $data):
                        $width = ($data['score'] * 10) . '%';
                    ?>
                    <div>
                        <div style="display:flex; justify-content:space-between; margin-bottom:5px; font-size:0.95rem; font-weight:600; color:#fff;">
                            <span><?= $label ?></span>
                            <span><?= $data['score'] ?> / 10</span>
                        </div>
                        <div style="background: rgba(255,255,255,0.05); width: 100%; height: 12px; border-radius: 6px; overflow:hidden;">
                            <div style="background: <?= $data['color'] ?>; width: <?= $width ?>; height: 100%; border-radius: 6px;"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Bilgilendirme Alarmları -->
            <div style="display:flex; flex-direction:column; gap:15px;">
                <?php if($distro['score_beginner'] >= 9): ?>
                    <div class="alert" style="background: rgba(16, 185, 129, 0.1); border-left: 4px solid #10b981; padding: 20px; border-radius:4px;">
                        <strong><i class="fa-solid fa-handshake"></i> Windows veya Mac'ten İlk Geçiş!</strong> Terminal komutlarıyla yüzleşmeden gündelik işlerinizi rahatça yapabileceğiniz tam teşekküllü bir başlangıç sistemidir. Donanım sıkıntısı yaşama ihtimaliniz düşüktür.
                    </div>
                <?php endif; ?>

                <?php if($distro['score_beginner'] <= 3): ?>
                    <div class="alert" style="background: rgba(239, 68, 68, 0.1); border-left: 4px solid #ef4444; padding: 20px; border-radius:4px;">
                        <strong><i class="fa-solid fa-triangle-exclamation"></i> Yeni Başlayanlara Uyarı!</strong> Bu ekosistem elden geçirme ve konsol hakimiyeti gerektirir. "İşletim Sistemini Kurması" bile belli oranda bilgi gerektirebilir (Örn: Arch CLI kurulumu). Çıktığı gibi hazır oyun veya ofis bilgisayarı beklemeyin.
                    </div>
                <?php endif; ?>

                <?php if($distro['score_old_pc'] >= 8): ?>
                    <div class="alert" style="background: rgba(59, 130, 246, 0.1); border-left: 4px solid #3b82f6; padding: 20px; border-radius:4px;">
                        <strong><i class="fa-solid fa-laptop-medical"></i> Can Suyu Sistemi!</strong> Aşırı eski işlemciniz ve yavaş RAM'leriniz varsa, bu sistem arka planda ölü donanımınızı tekrar yüksek hızlara çıkarıp onu canlandıracaktır.
                    </div>
                <?php endif; ?>
            </div>
            
        </article>
        
        <!-- Sağ Kolon: Veri Kimliği (Sidebar) -->
        <aside class="distro-sidebar">
            <div class="card" style="position: sticky; top: 100px; padding:30px 25px;">
                <h3 class="mb-4 text-primary" style="font-size:1.4rem;">Teknik Kimlik</h3>
                
                <ul style="list-style:none; display:flex; flex-direction:column; gap:20px;">
                    <li>
                        <div style="font-size:0.85rem; color:var(--text-muted);"><i class="fa-solid fa-code-branch text-accent" style="width:20px;"></i> Taban Mimarisi</div>
                        <div style="font-weight:600; font-size:1.1rem; padding-left:22px;"><?= htmlspecialchars($distro['base_os']) ?></div>
                    </li>
                    <li>
                        <div style="font-size:0.85rem; color:var(--text-muted);"><i class="fa-solid fa-box text-accent" style="width:20px;"></i> Paket Yöneticisi & Havuz</div>
                        <div style="font-weight:600; font-size:1.1rem; padding-left:22px;"><?= htmlspecialchars($distro['package_manager']) ?></div>
                    </li>
                    <li>
                        <div style="font-size:0.85rem; color:var(--text-muted);"><i class="fa-solid fa-desktop text-accent" style="width:20px;"></i> Ana Masaüstü Ortamı (GUI)</div>
                        <div style="font-weight:600; font-size:1.1rem; padding-left:22px;"><?= htmlspecialchars($distro['desktop_environment']) ?></div>
                    </li>
                    <li style="border-top:1px solid rgba(255,255,255,0.05); padding-top:15px; margin-top:5px;">
                        <div style="font-size:0.85rem; color:var(--text-muted);"><i class="fa-solid fa-microchip text-primary" style="width:20px;"></i> Ortalama Boşta RAM Tüketimi</div>
                        <div style="font-family:var(--font-mono); font-weight:700; font-size:1.2rem; color:var(--text-main); padding-left:22px;">
                            <?= htmlspecialchars($distro['ram_usage']) ?> *
                        </div>
                    </li>
                </ul>
                <div style="margin-top:25px; padding:15px; background:rgba(0,0,0,0.3); border-radius:6px; font-size:0.85rem; color:var(--text-muted);">
                    <i class="fa-solid fa-hard-drive"></i> SSD üzerine kurulum tavsiye edilir. EXT4 / BTRFS dosya sistemleri ile HDD üzerinde "fragmentation" olmaz ancak yine de okuma hızı düşüklüğü mekanik doğasından ötürü yaşanacaktır.
                </div>
            </div>
        </aside>
    </div>
</div>

<style>
.badge-beginner { background: rgba(16, 185, 129, 0.2); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.5); }
.badge-intermediate { background: rgba(245, 158, 11, 0.2); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.5); }
.badge-advanced { background: rgba(239, 68, 68, 0.2); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.5); }
@media(max-width:992px){
    .layout-grid { grid-template-columns: 1fr !important; }
}
</style>

<?php require_once 'includes/footer.php'; ?>
