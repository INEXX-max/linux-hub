<?php
// pages/use_cases.php — NEXOS Use Cases (Apple-style)
require_once 'includes/header.php';
require_once 'includes/section-title.php';
?>

<section class="nx-section" style="padding-top:var(--nx-sp-20);">
    <div class="container" style="max-width:800px;">
        <div class="text-center reveal">
            <div class="nx-label" style="display:inline-flex; align-items:center; gap:8px; padding:6px 18px; background:var(--nx-purple-subtle); color:var(--nx-purple); border-radius:var(--nx-radius-full); font-size:var(--nx-fs-xs); font-weight:700; text-transform:uppercase; letter-spacing:1px; border:1px solid rgba(139,92,246,0.2);">
                <i class="fa-solid fa-lightbulb"></i> Senaryolar
            </div>
            <h1 style="font-size:var(--nx-fs-hero); font-weight:800; margin-top:var(--nx-sp-5); line-height:1.1;">
                Linux <span class="nx-text-gradient">Nerede</span> Kullanilir?
            </h1>
            <p class="text-muted" style="font-size:var(--nx-fs-lg); max-width:560px; margin:var(--nx-sp-5) auto 0;">
                Sunuculardan akilli telefonlara, uzay araclarindan super bilgisayarlara.
            </p>
        </div>
    </div>
</section>

<section class="nx-section-sm">
    <div class="container" style="max-width:900px;">
        <?php
        $scenarios = [
            ['icon' => 'fa-solid fa-code', 'color' => 'blue', 'title' => 'Yazilim Gelistirme', 'desc' => 'Docker, Kubernetes, Git, CI/CD — modern yazilim gelistirmenin tum araclari Linux icin olusturulmustur. VS Code, JetBrains IDE\'leri ve terminal araclari ile kusursuz calisir.', 'stat' => '%87', 'statLabel' => 'gelistirici Linux kullanir'],
            ['icon' => 'fa-solid fa-gamepad', 'color' => 'purple', 'title' => 'Oyun', 'desc' => 'Steam Proton ve Valve\'in yatirimlariyla Linux oyun platformu olarak buyuyor. Steam Deck tamamen Linux ile calisiyor. AAA oyunlarin %80\'i artik Linux uyumlu.', 'stat' => '%80', 'statLabel' => 'Steam oyunu uyumlu'],
            ['icon' => 'fa-solid fa-shield-halved', 'color' => 'red', 'title' => 'Siber Guvenlik', 'desc' => 'Kali Linux, Parrot OS, BlackArch — penetrasyon testleri, adli bilisim, ag analizi icin ozel araclar. Dunnyanin en buyuk guvenlik konferanslarinda Linux kullanilir.', 'stat' => '600+', 'statLabel' => 'guvenlik araci'],
            ['icon' => 'fa-solid fa-server', 'color' => 'amber', 'title' => 'Sunucu & Bulut', 'desc' => 'AWS, Azure, Google Cloud — hepsinin temeli Linux. Internetteki web sitelerinin %96.3\'u Linux sunucularda calisir. Enterprise itibarlilikte Red Hat lider.', 'stat' => '%96.3', 'statLabel' => 'web sunucusu'],
            ['icon' => 'fa-solid fa-microchip', 'color' => 'cyan', 'title' => 'Gomulu Sistemler & IoT', 'desc' => 'Akilli televizyonlar, router\'lar, arac bilgisayarlari, dronelar, robotlar — tumu Linux cekirdegi kullanir. Android da Linux tabali bir isletim sistemidir.', 'stat' => '3M+', 'statLabel' => 'Android cihaz'],
        ];
        foreach($scenarios as $i => $sc): 
        ?>
        <div class="reveal" style="display:grid; grid-template-columns:1fr 1fr; gap:var(--nx-sp-10); align-items:center; margin-bottom:var(--nx-sp-16); <?= $i % 2 === 1 ? 'direction:rtl;' : '' ?>">
            <div style="<?= $i % 2 === 1 ? 'direction:ltr;' : '' ?>">
                <div class="nx-icon-box nx-icon-box-<?= $sc['color'] ?>" style="margin-bottom:var(--nx-sp-5); width:56px; height:56px; font-size:1.4rem;">
                    <i class="<?= $sc['icon'] ?>"></i>
                </div>
                <h2 style="font-size:var(--nx-fs-3xl); font-weight:800; margin-bottom:var(--nx-sp-4);"><?= $sc['title'] ?></h2>
                <p class="text-muted" style="line-height:1.8; font-size:var(--nx-fs-md);"><?= $sc['desc'] ?></p>
            </div>
            <div style="<?= $i % 2 === 1 ? 'direction:ltr;' : '' ?> text-align:center;">
                <div style="padding:var(--nx-sp-12); background:var(--nx-surface); border:1px solid var(--nx-border); border-radius:var(--nx-radius-xl);">
                    <div style="font-size:clamp(3rem, 6vw, 4.5rem); font-weight:900; background:var(--nx-gradient-blue); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; line-height:1;"><?= $sc['stat'] ?></div>
                    <div style="font-size:var(--nx-fs-sm); color:var(--nx-text-dim); margin-top:var(--nx-sp-3); text-transform:uppercase; letter-spacing:1px; font-weight:600;"><?= $sc['statLabel'] ?></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="nx-section-sm">
    <div class="container" style="max-width:700px;">
        <div class="nx-cta-banner reveal text-center">
            <h2 style="font-size:var(--nx-fs-3xl);">Hangi senaryo <span class="nx-text-gradient">size uygun?</span></h2>
            <p class="text-muted" style="margin:var(--nx-sp-4) auto var(--nx-sp-8); max-width:400px;">Quiz ile ihtiyaciniza en uygun dagitimiizi saniyeler icinde bulun.</p>
            <a href="index.php?page=quiz" class="btn-gradient btn-lg"><i class="fa-solid fa-wand-magic-sparkles"></i> Teste Basla</a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
