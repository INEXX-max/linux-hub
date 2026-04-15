<?php
// pages/use_cases.php — NEXOS Use Cases
require_once 'includes/header.php';
require_once 'includes/section-title.php';
?>

<section class="nx-page-hero nx-bg-grid">
    <div class="container">
        <div class="nx-hero-label mx-auto" style="display:inline-flex;"><i class="fa-solid fa-compass"></i> Senaryolar</div>
        <h1 class="nx-text-gradient-static">İhtiyaca Göre Linux</h1>
        <p>"En iyi Linux dağıtımı hangisi?" sorusunun tek cevabı yoktur. Cevap tamamen onu ne için kullanacağınıza bağlıdır.</p>
    </div>
</section>

<section class="nx-section-sm">
    <div class="container">
        <div style="display:flex; flex-direction:column; gap:var(--nx-sp-8);">
            <?php
            $scenarios = [
                ['icon' => 'fa-solid fa-code', 'color' => 'blue', 'title' => 'Yazılım Geliştirme', 'desc' => 'Docker ve Kubernetes gibi günümüzün standart altyapıları yerel olarak Linux üzerinde çalışır. Python, Rust, Go, C++ derleyicileri kutudan çıkar.', 'distros' => 'Ubuntu, Fedora, Arch Linux'],
                ['icon' => 'fa-solid fa-gamepad', 'color' => 'purple', 'title' => 'Oyun & Eğlence', 'desc' => 'Valve\'in Proton uyumluluk katmanı ile Steam kütüphanenizin %85+\'ı Linux\'ta çalışıyor. Steam Deck tamamen Linux tabanlı.', 'distros' => 'Pop!_OS, Nobara, ChimeraOS'],
                ['icon' => 'fa-solid fa-mask', 'color' => 'pink', 'title' => 'Siber Güvenlik', 'desc' => 'Ağ trafiğini manipüle etme ve zafiyet analizi araçları Linux çekirdeğinden doğrudan güç alır. Binlerce önceden kurulu araç.', 'distros' => 'Kali Linux, Parrot OS'],
                ['icon' => 'fa-solid fa-server', 'color' => 'amber', 'title' => 'Sunucu ve Bulut', 'desc' => 'GUI olmadan 100MB RAM ile yıllarca kapatılmadan hizmet veren Linux sunucuları, internetin omurgasını oluşturur.', 'distros' => 'Debian, Ubuntu Server, Alpine Linux'],
                ['icon' => 'fa-solid fa-laptop-medical', 'color' => 'green', 'title' => 'Eski Bilgisayarları Diriltmek', 'desc' => '15 yıllık bir laptop bile hafif bir Linux dağıtımı ve SSD ile yeni gibi çalışabilir.', 'distros' => 'Lubuntu, Xubuntu, Linux Lite'],
            ];
            foreach($scenarios as $s):
            ?>
            <div class="nx-scenario-card reveal" style="border-left-color:var(--nx-<?= $s['color'] ?>);">
                <div class="nx-scenario-icon nx-icon-box-<?= $s['color'] ?>" style="width:80px; height:80px; font-size:2.2rem;">
                    <i class="<?= $s['icon'] ?>"></i>
                </div>
                <div class="nx-scenario-body">
                    <h3 style="color:var(--nx-<?= $s['color'] ?>);"><?= $s['title'] ?></h3>
                    <p><?= $s['desc'] ?></p>
                    <div class="nx-scenario-tag"><strong>Öne Çıkan:</strong> <?= $s['distros'] ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- CTA -->
        <div class="nx-cta-banner mt-12 reveal">
            <h2>Kafanız mı Karıştı?</h2>
            <p style="color:var(--nx-text-muted); max-width:500px; margin:0 auto var(--nx-sp-6) auto;">
                Algoritma destekli testimiz ihtiyaçlarınızı analiz edip en uygun dağıtımı öneriyor.
            </p>
            <a href="index.php?page=quiz" class="btn-gradient btn-lg">
                <i class="fa-solid fa-bolt"></i> Hangi Linux Bana Göre?
            </a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
