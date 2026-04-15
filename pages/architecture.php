<?php
// pages/architecture.php — NEXOS Architecture Page
require_once 'includes/header.php';
require_once 'includes/section-title.php';
?>

<section class="nx-page-hero nx-bg-grid">
    <div class="container">
        <div class="nx-hero-label mx-auto" style="display:inline-flex;"><i class="fa-solid fa-layer-group"></i> Sistem Mimarisi</div>
        <h1 class="nx-text-gradient-static">İçeride Neler Oluyor?</h1>
        <p>Linux Mimarisi — her donanımın ve yazılımın mükemmel bir hiyerarşi içinde iletişim kurduğu mühendislik harikası.</p>
    </div>
</section>

<section class="nx-section-sm">
    <div class="container">
        <!-- Architecture Layers -->
        <div class="nx-arch-stack reveal">
            <div class="nx-arch-layer" style="background:var(--nx-purple); border:2px solid var(--nx-purple); border-radius:var(--nx-radius-md) var(--nx-radius-md) 0 0;">
                <i class="fa-solid fa-window-restore"></i> User Space (Uygulamalar, GUI, Tarayıcılar)
            </div>
            <div class="nx-arch-layer" style="background:var(--nx-cyan); border:2px solid var(--nx-cyan); border-top:none;">
                <i class="fa-solid fa-terminal"></i> Shell (Bash/Zsh) & GNU Araçları
            </div>
            <div class="nx-arch-layer" style="background:var(--nx-red); border:2px solid var(--nx-red); border-top:none; padding:var(--nx-sp-8);">
                <i class="fa-solid fa-heart-pulse"></i> Linux Kernel (Çekirdek)
                <div class="nx-arch-layer-sub">Bellek Yönetimi, Süreçler, Sürücüler, Ağ Yığını</div>
            </div>
            <div class="nx-arch-layer" style="background:var(--nx-surface-3); border:2px solid var(--nx-surface-3); border-top:none; border-radius:0 0 var(--nx-radius-md) var(--nx-radius-md); display:flex; justify-content:center; gap:var(--nx-sp-6);">
                <span><i class="fa-solid fa-microchip"></i> CPU</span>
                <span><i class="fa-solid fa-memory"></i> RAM</span>
                <span><i class="fa-solid fa-hard-drive"></i> SSD</span>
                <span><i class="fa-solid fa-wifi"></i> NIC</span>
            </div>
        </div>

        <!-- Details Grid -->
        <?php sectionTitle('Bileşenler', 'Temel Mimari Bileşenler', 'Linux sisteminin her katmanını derinlemesine anlayın.'); ?>
        
        <div class="grid grid-3 gap-6 reveal-stagger">
            <?php
            $components = [
                ['icon' => 'fa-solid fa-heart-pulse', 'color' => 'red', 'title' => 'Kernel (Çekirdek)', 'desc' => 'Donanım ile doğrudan iletişim kuran sistemin beynidir. Memory management, süreç planlama ve donanım sürücüleri burada bulunur.'],
                ['icon' => 'fa-solid fa-terminal', 'color' => 'cyan', 'title' => 'Shell (Kabuk)', 'desc' => 'Kullanıcı komutlarını kernel\'ın anlayacağı dile çeviren arayüz. Bash en yaygınıdır. GUI çökse bile sistem Shell ile çalışır.'],
                ['icon' => 'fa-solid fa-folder-tree', 'color' => 'amber', 'title' => 'Dosya Sistemi', 'desc' => 'Her şey kök dizinden (/) başlar. /home kullanıcı dosyalarını, /etc ayar dosyalarını tutar. "Her şey bir dosyadır" felsefesi.'],
                ['icon' => 'fa-solid fa-box-open', 'color' => 'green', 'title' => 'Paket Yöneticileri', 'desc' => 'APT, DNF, Pacman — güvenli depolardan tek komutla yazılım kurulumu. .exe arayıp virüs riski yok.'],
                ['icon' => 'fa-solid fa-users-gear', 'color' => 'purple', 'title' => 'Root ve İzin Sistemi', 'desc' => 'En tepede root kullanıcısı. Normal kullanıcılar sudo izni olmadan sisteme zarar veremez.'],
                ['icon' => 'fa-solid fa-window-restore', 'color' => 'blue', 'title' => 'GUI vs CLI', 'desc' => 'Masaüstü ortamı (GNOME/KDE) sadece kernel üstünde çalışan programlardır. Sunucularda GUI olmaz.'],
            ];
            foreach($components as $c):
            ?>
            <div class="nx-card-glow reveal" style="padding:var(--nx-sp-6);">
                <div class="nx-icon-box nx-icon-box-<?= $c['color'] ?> mb-4"><i class="<?= $c['icon'] ?>"></i></div>
                <h4><?= $c['title'] ?></h4>
                <p class="text-muted mb-0" style="font-size:var(--nx-fs-sm);"><?= $c['desc'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Reliability -->
        <div class="mt-12 reveal">
            <h2 class="text-cyan mb-6" style="border-bottom:1px solid var(--nx-border); padding-bottom:var(--nx-sp-3);">Neden Güvenilir?</h2>
            <div style="display:flex; flex-direction:column; gap:var(--nx-sp-5);">
                <?php
                $points = [
                    ['title' => 'İzole Süreçler', 'desc' => 'Bir program çökerse sadece kendisi kapanır. Sistem mavi ekrana girmez.'],
                    ['title' => 'Açık Kaynak Güvenlik', 'desc' => 'Güvenlik açığı bulunduğunda dakikalar içinde yamalanabilir.'],
                    ['title' => 'Sıfır Parçalanma', 'desc' => 'EXT4/BTRFS dosya sistemleri defrag gerektirmez, yıllarca %100 hızda çalışır.'],
                ];
                foreach($points as $p):
                ?>
                <div class="d-flex gap-4 items-start">
                    <i class="fa-solid fa-circle-check text-primary" style="margin-top:5px;"></i>
                    <div>
                        <strong><?= $p['title'] ?>:</strong>
                        <span class="text-muted"> <?= $p['desc'] ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
