<?php
// pages/architecture.php — NEXOS Architecture (SpaceX-style)
require_once 'includes/header.php';
require_once 'includes/section-title.php';
?>

<section class="nx-section" style="padding-top:var(--nx-sp-20);">
    <div class="container" style="max-width:800px;">
        <div class="text-center reveal">
            <div class="nx-label" style="display:inline-flex; align-items:center; gap:8px; padding:6px 18px; background:var(--nx-cyan-subtle); color:var(--nx-cyan); border-radius:var(--nx-radius-full); font-size:var(--nx-fs-xs); font-weight:700; text-transform:uppercase; letter-spacing:1px; border:1px solid rgba(34,211,238,0.2);">
                <i class="fa-solid fa-layer-group"></i> Teknik Detay
            </div>
            <h1 style="font-size:var(--nx-fs-hero); font-weight:800; margin-top:var(--nx-sp-5); line-height:1.1;">
                Linux <span class="nx-text-gradient">Mimarisi</span>
            </h1>
            <p class="text-muted" style="font-size:var(--nx-fs-lg); max-width:560px; margin:var(--nx-sp-5) auto 0;">
                Donanindan uygulamaya kadar katman katman isletim sistemi yapisi.
            </p>
        </div>
    </div>
</section>

<!-- Interactive Layer Stack -->
<section class="nx-section-sm">
    <div class="container" style="max-width:600px;">
        <div class="reveal">
            <?php
            $layers = [
                ['name' => 'Uygulamalar', 'desc' => 'Firefox, VS Code, Docker, Terminal', 'color' => 'var(--nx-blue)', 'bg' => 'var(--nx-blue-subtle)'],
                ['name' => 'Shell / CLI', 'desc' => 'Bash, Zsh, Fish — Komut yorumlayicisi', 'color' => 'var(--nx-cyan)', 'bg' => 'var(--nx-cyan-subtle)'],
                ['name' => 'System Libraries', 'desc' => 'glibc, libstdc++ — Sistem kutuphaneleri', 'color' => 'var(--nx-purple)', 'bg' => 'var(--nx-purple-subtle)'],
                ['name' => 'Kernel', 'desc' => 'Islem, bellek, dosya sistemi, ag yonetimi', 'color' => 'var(--nx-green)', 'bg' => 'var(--nx-green-subtle)'],
                ['name' => 'Donanim', 'desc' => 'CPU, RAM, Disk, GPU, NIC', 'color' => 'var(--nx-amber)', 'bg' => 'var(--nx-amber-subtle)'],
            ];
            foreach($layers as $i => $l):
            ?>
            <div class="nx-arch-layer reveal" style="background:<?= $l['bg'] ?>; border:1px solid <?= $l['color'] ?>20; border-radius:var(--nx-radius-md); padding:var(--nx-sp-6) var(--nx-sp-8); margin-bottom:var(--nx-sp-3); display:flex; justify-content:space-between; align-items:center; transition:all 0.3s ease;" onmouseover="this.style.transform='scale(1.02)'; this.style.borderColor='<?= $l['color'] ?>50'" onmouseout="this.style.transform='scale(1)'; this.style.borderColor='<?= $l['color'] ?>20'">
                <div>
                    <strong style="color:<?= $l['color'] ?>; font-size:var(--nx-fs-md);"><?= $l['name'] ?></strong>
                    <p style="margin:4px 0 0; color:var(--nx-text-muted); font-size:var(--nx-fs-sm);"><?= $l['desc'] ?></p>
                </div>
                <div style="font-family:var(--nx-font-mono); font-size:var(--nx-fs-xs); color:var(--nx-text-dim);">Layer <?= $i ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Components -->
<section class="nx-section-sm">
    <div class="container" style="max-width:900px;">
        <?php sectionTitle('Bilesenler', 'Cekirdek Modulleri', 'Linux cekirdeginin temel yonetim birimleri.'); ?>
        
        <div class="grid grid-3 gap-6 reveal-stagger">
            <?php
            $components = [
                ['icon' => 'fa-solid fa-microchip', 'color' => 'blue', 'name' => 'Islem Yoneticisi', 'desc' => 'CPU zamanlama, coklu islem, thread yonetimi, oncelik atama.'],
                ['icon' => 'fa-solid fa-memory', 'color' => 'green', 'name' => 'Bellek Yoneticisi', 'desc' => 'Sanal bellek, sayfa tablosu, swap, OOM killer mekanizmalari.'],
                ['icon' => 'fa-solid fa-hard-drive', 'color' => 'purple', 'name' => 'Dosya Sistemi', 'desc' => 'ext4, Btrfs, XFS, ZFS — blok cihaz ve inode yonetimi.'],
                ['icon' => 'fa-solid fa-network-wired', 'color' => 'cyan', 'name' => 'Ag Yigini', 'desc' => 'TCP/IP, socket API, netfilter, iptables, routing.'],
                ['icon' => 'fa-solid fa-plug', 'color' => 'amber', 'name' => 'Aygit Suruculeri', 'desc' => 'GPU, USB, NVMe, ses karti — donanim soyutlama katmani.'],
                ['icon' => 'fa-solid fa-shield-halved', 'color' => 'red', 'name' => 'Guvenlik Modulleri', 'desc' => 'SELinux, AppArmor, seccomp, capabilities framework.'],
            ];
            foreach($components as $c):
            ?>
            <div class="nx-card reveal" style="padding:var(--nx-sp-8); text-align:center;">
                <div class="nx-icon-box nx-icon-box-<?= $c['color'] ?>" style="margin:0 auto var(--nx-sp-5); width:52px; height:52px; font-size:1.3rem;">
                    <i class="<?= $c['icon'] ?>"></i>
                </div>
                <h4 style="font-size:var(--nx-fs-base); margin-bottom:var(--nx-sp-3);"><?= $c['name'] ?></h4>
                <p class="text-muted" style="font-size:var(--nx-fs-sm); line-height:1.6;"><?= $c['desc'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="nx-section-sm">
    <div class="container text-center" style="max-width:600px;">
        <div class="reveal">
            <h3 style="font-size:var(--nx-fs-2xl); margin-bottom:var(--nx-sp-5);">Mimariyi anladiniz.<br>Simdi <span class="nx-text-gradient">dagitimiinizi</span> secin.</h3>
            <div class="d-flex gap-4 justify-center">
                <a href="index.php?page=quiz" class="btn-gradient btn-lg"><i class="fa-solid fa-wand-magic-sparkles"></i> Quiz</a>
                <a href="index.php?page=distros" class="btn-outline btn-lg">Dagitimlar</a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
