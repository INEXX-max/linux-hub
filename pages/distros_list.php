<?php
// pages/distros_list.php — NEXOS Distro Catalog (Modern Grid)
require_once 'includes/header.php';
require_once 'includes/section-title.php';
global $linux_distros;
?>

<section class="nx-section" style="padding-top:var(--nx-sp-20);">
    <div class="container" style="max-width:800px;">
        <div class="text-center reveal">
            <div class="nx-label" style="display:inline-flex; align-items:center; gap:8px; padding:6px 18px; background:var(--nx-green-subtle); color:var(--nx-green); border-radius:var(--nx-radius-full); font-size:var(--nx-fs-xs); font-weight:700; text-transform:uppercase; letter-spacing:1px; border:1px solid rgba(16,185,129,0.2);">
                <i class="fa-solid fa-th-large"></i> Katalog
            </div>
            <h1 style="font-size:var(--nx-fs-hero); font-weight:800; margin-top:var(--nx-sp-5); line-height:1.1;">
                Linux <span class="nx-text-gradient">Dagitimlari</span>
            </h1>
            <p class="text-muted" style="font-size:var(--nx-fs-lg); max-width:500px; margin:var(--nx-sp-5) auto 0;">
                <?= count($linux_distros) ?> dagitim. Ihtiyaciniza en uygun olani bulun.
            </p>
        </div>
    </div>
</section>

<section class="nx-section-sm">
    <div class="container">
        <!-- Search -->
        <div class="reveal" style="max-width:480px; margin:0 auto var(--nx-sp-10);">
            <div style="position:relative;">
                <i class="fa-solid fa-magnifying-glass" style="position:absolute; left:18px; top:50%; transform:translateY(-50%); color:var(--nx-text-dim);"></i>
                <input type="text" id="distroSearch" class="form-control" placeholder="Dagitim ara..." style="padding-left:48px;" onkeyup="filterDistros()">
            </div>
        </div>

        <!-- Grid -->
        <div class="grid grid-3 gap-6 reveal-stagger" id="distroGrid">
            <?php foreach($linux_distros as $d): 
                $badgeClass = 'nx-badge-' . ($d['difficulty'] === 'Beginner' ? 'green' : ($d['difficulty'] === 'Intermediate' ? 'amber' : 'red'));
            ?>
            <div class="nx-card-glow distro-item reveal" data-name="<?= strtolower($d['name']) ?>" style="padding:var(--nx-sp-8);">
                <div class="d-flex justify-between items-center mb-3">
                    <h3 style="margin:0; font-size:var(--nx-fs-xl); font-weight:700;"><?= htmlspecialchars($d['name']) ?></h3>
                    <span class="nx-badge <?= $badgeClass ?>"><?= $d['difficulty'] ?></span>
                </div>
                <p class="text-muted mb-4" style="font-size:var(--nx-fs-sm); line-height:1.6;"><?= htmlspecialchars($d['short_desc']) ?></p>
                <div style="display:flex; gap:var(--nx-sp-6); margin-bottom:var(--nx-sp-5); font-size:var(--nx-fs-xs); color:var(--nx-text-dim);">
                    <span><i class="fa-solid fa-code-branch" style="color:var(--nx-blue); margin-right:4px;"></i> <?= $d['base_os'] ?></span>
                    <span><i class="fa-solid fa-desktop" style="color:var(--nx-purple); margin-right:4px;"></i> <?= $d['desktop_environment'] ?></span>
                </div>
                <a href="index.php?page=distro_detail&slug=<?= urlencode($d['slug']) ?>" class="btn-outline btn-sm w-full" style="justify-content:center; position:relative; z-index:2;">
                    İncele <i class="fa-solid fa-arrow-right" style="margin-left:6px;"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
function filterDistros() {
    const q = document.getElementById('distroSearch').value.toLowerCase();
    document.querySelectorAll('.distro-item').forEach(el => {
        el.style.display = el.dataset.name.includes(q) ? '' : 'none';
    });
}
</script>

<?php require_once 'includes/footer.php'; ?>
