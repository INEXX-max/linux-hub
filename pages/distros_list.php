<?php
// pages/distros_list.php — NEXOS Distro Catalog
require_once 'includes/header.php';
require_once 'includes/section-title.php';
global $linux_distros;
$distros = $linux_distros;
usort($distros, function($a, $b) { return strcmp($a['name'], $b['name']); });
?>

<section class="nx-page-hero nx-bg-grid">
    <div class="nx-glow-orb nx-glow-orb-cyan" style="top:-25%; left:30%;"></div>
    <div class="container">
        <div class="nx-hero-label mx-auto" style="display:inline-flex;"><i class="fa-solid fa-th-large"></i> Dağıtım Kataloğu</div>
        <h1 class="nx-text-gradient-static">Linux Dağıtımları</h1>
        <p>Açık kaynak dünyasında her ihtiyaca özel bir "tat" mevcuttur. İnceleyin, araştırın ve seçiminizi yapın.</p>
    </div>
</section>

<section class="nx-section-sm">
    <div class="container">
        <!-- Search -->
        <div class="nx-search-box reveal">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="searchInput" placeholder="Dağıtım, taban veya masaüstü ortamı arayın..." onkeyup="filterDistros()">
        </div>

        <!-- Grid -->
        <div class="nx-distro-grid reveal-stagger" id="distroGrid">
            <?php foreach($distros as $distro): 
                $badgeClass = 'nx-badge-' . ($distro['difficulty'] === 'Beginner' ? 'green' : ($distro['difficulty'] === 'Intermediate' ? 'amber' : 'red'));
            ?>
            <div class="nx-distro-card distro-card reveal">
                <div class="nx-distro-card-header">
                    <h3><?= htmlspecialchars($distro['name']) ?></h3>
                    <span class="nx-badge <?= $badgeClass ?>"><?= $distro['difficulty'] ?></span>
                </div>
                <p class="nx-distro-card-desc"><?= htmlspecialchars($distro['short_desc']) ?></p>
                <div class="nx-distro-card-meta">
                    <div class="nx-distro-card-meta-row">
                        <span class="label">Taban:</span>
                        <span class="value text-primary"><?= htmlspecialchars($distro['base_os']) ?></span>
                    </div>
                    <div class="nx-distro-card-meta-row">
                        <span class="label">Masaüstü:</span>
                        <span class="value"><?= htmlspecialchars($distro['desktop_environment']) ?></span>
                    </div>
                </div>
                <a href="index.php?page=distro_detail&slug=<?= urlencode($distro['slug']) ?>" class="btn-outline w-full" style="justify-content:center; margin-top:auto;">
                    Teknik Detaylar <i class="fa-solid fa-arrow-right" style="margin-left:6px;"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
function filterDistros() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const cards = document.getElementsByClassName('distro-card');
    for (let i = 0; i < cards.length; i++) {
        const text = cards[i].innerText.toLowerCase();
        cards[i].style.display = text.includes(input) ? '' : 'none';
    }
}
</script>

<?php require_once 'includes/footer.php'; ?>
