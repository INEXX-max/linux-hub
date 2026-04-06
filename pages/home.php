<?php
// pages/home.php
// Ana sayfa tasarımı
require_once 'includes/header.php';
?>

<section class="hero-section">
    <div class="hero-bg-glow"></div>
    <div class="container">
        <h1 class="hero-title">İşletim Sisteminde <span class="text-primary">Özgürlüğü</span> Keşfedin</h1>
        <p class="hero-subtitle">İhtiyaçlarınıza en uygun Linux dağıtımını saniyeler içinde bulun, sistem mimarisini öğrenin ve açık kaynak dünyasının gücünü bilgisayarınıza taşıyın.</p>
        <div class="hero-actions d-flex align-center justify-center" style="gap: 15px; margin-top: 20px; justify-content: center;">
            <a href="index.php?page=quiz" class="btn-highlight"><i class="fa-solid fa-bolt"></i> Testi Çöz</a>
            <a href="index.php?page=distros" class="btn-outline">Tüm Dağıtımlar</a>
        </div>
    </div>
</section>

<section class="features-section container mt-5 mb-5">
    <div class="features-grid">
        <div class="card text-center">
            <i class="fa-brands fa-linux" style="font-size: 3rem; color: var(--primary-color); margin-bottom: 15px;"></i>
            <h3>Geniş Dağıtım Veritabanı</h3>
            <p>Popüler ve niş dağıtımlar hakkında tarafsız, kapsamlı ve donanım uyumluluğunu içeren veriler.</p>
        </div>
        <div class="card text-center">
            <i class="fa-solid fa-brain" style="font-size: 3rem; color: var(--accent-color); margin-bottom: 15px;"></i>
            <h3>Zeki Öneri Motoru</h3>
            <p>Sizin için en doğru seçimi yapan, alışkanlıklarınıza uygun dağıtımı puanlayıp sunan test modülü.</p>
        </div>
        <div class="card text-center">
            <i class="fa-solid fa-shield-halved" style="font-size: 3rem; color: #ff9f43; margin-bottom: 15px;"></i>
            <h3>Açık Kaynak, Net Mimari</h3>
            <p>Dosya sistemi, kernel mantığı ve paket yöneticileri hakkında detaylı akademik rehberler.</p>
        </div>
    </div>
</section>

<section class="info-teaser-section container mt-5 mb-5">
    <div class="layout-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
        <div class="info-text">
            <h2 style="font-size: 2.2rem; margin-bottom: 15px;">Neden Linux?</h2>
            <p class="mb-3" style="color: var(--text-muted); font-size: 1.05rem;">Linux sıradan bir işletim sistemi çekirdeği değil; teknoloji dünyasını yıllardır ayakta tutan özgür bir felsefedir. Windows ve macOS'in kapalı kutu yaklaşımının aksine, sistemin efendisi siz olursunuz.</p>
            <ul style="list-style: none; color: var(--text-muted); font-size: 1rem;">
                <li class="mb-2"><i class="fa-solid fa-check text-accent" style="margin-right: 10px;"></i> Güncelleme dayatması olmadan tam kontrol.</li>
                <li class="mb-2"><i class="fa-solid fa-check text-accent" style="margin-right: 10px;"></i> Telemetri (izlenme) endişesi taşımayan gizlilik.</li>
                <li class="mb-2"><i class="fa-solid fa-check text-accent" style="margin-right: 10px;"></i> Eski donanımlara ikinci bir hayat verme şansı.</li>
            </ul>
            <a href="index.php?page=what-is-linux" class="btn-outline mt-3">Derinlemesine Öğren <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i></a>
        </div>
        <div class="info-visual card" style="background: rgba(59, 130, 246, 0.05); border-color: rgba(59, 130, 246, 0.3);">
            <div class="terminal-header" style="display:flex; gap:6px; margin-bottom:15px;">
                <div style="width:12px;height:12px;border-radius:50%;background:#ff5f56"></div>
                <div style="width:12px;height:12px;border-radius:50%;background:#ffbd2e"></div>
                <div style="width:12px;height:12px;border-radius:50%;background:#27c93f"></div>
            </div>
            <pre style="color: var(--text-main); font-family: var(--font-mono); font-size: 0.9rem; overflow-x: auto; line-height:1.4;">
<span style="color:#10b981">root@linux-hub</span>:<span style="color:#3b82f6">~</span>$ uname -a
Linux localhost 6.5.0-14-generic #1 SMP PREEMPT_DYNAMIC
<span style="color:#10b981">root@linux-hub</span>:<span style="color:#3b82f6">~</span>$ echo "Gelecek Açık Kaynakta!"
Gelecek Açık Kaynakta!
<span style="color:#10b981">root@linux-hub</span>:<span style="color:#3b82f6">~</span>$ _
            </pre>
        </div>
    </div>
</section>

<style>
/* Ana sayfaya özel ekstra stiller */
.hero-section {
    position: relative;
    padding: 120px 0 80px 0;
    overflow: hidden;
}
.hero-bg-glow {
    position: absolute;
    top: -40%;
    left: 50%;
    transform: translateX(-50%);
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, rgba(11, 15, 25, 0) 70%);
    z-index: -1;
    pointer-events: none;
}
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}
@media (max-width: 768px) {
    .layout-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php
require_once 'includes/footer.php';
?>
