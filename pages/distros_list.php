<?php
// pages/distros_list.php
require_once 'includes/header.php';

// Statik Veri kaynağından tüm dağıtımları çek
global $linux_distros;
$distros = $linux_distros;
usort($distros, function($a, $b) {
    return strcmp($a['name'], $b['name']);
});
?>

<div class="container mt-5 mb-5">
    <div class="text-center mb-5">
        <h1 class="text-primary" style="font-size: 2.8rem;">Linux Dağıtımları (Distros)</h1>
        <p class="text-muted" style="max-width: 700px; margin: 0 auto;">Açık kaynak dünyasında her ihtiyaca özel bir "tat" mevcuttur. İşte popülerleşmiş dağıtımların kapsamlı veritabanı. İnceleyin, araştırın ve kendi seçiminizi yapın.</p>
    </div>

    <!-- Arama Kutusu (Front-end JS Filter) -->
    <div class="search-box mb-5 text-center">
        <input type="text" id="searchInput" class="form-control" style="max-width: 500px; margin: 0 auto;" placeholder="Ubuntu, Arch, Kali vb. dağıtım, çevre ya da taban arayın..." onkeyup="filterDistros()">
    </div>

    <!-- Grid Yapısı -->
    <div class="layout-grid" id="distroGrid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px;">
        <?php foreach($distros as $distro): ?>
            <div class="card distro-card" style="display: flex; flex-direction: column;">
                <div class="d-flex justify-between align-center mb-3">
                    <h3 style="margin:0; font-size:1.5rem;"><?= htmlspecialchars($distro['name']) ?></h3>
                    <span class="badge badge-<?= strtolower($distro['difficulty']) ?>" style="padding: 5px 12px; border-radius:15px; font-size:0.8rem; font-weight:700; text-transform:uppercase;">
                        <?= htmlspecialchars($distro['difficulty']) ?>
                    </span>
                </div>
                
                <p class="text-muted" style="font-size:0.95rem; height: 90px; overflow:hidden; border-bottom: 1px solid var(--border-color); padding-bottom: 15px; margin-bottom:15px;">
                    <?= htmlspecialchars($distro['short_desc']) ?>
                </p>
                
                <div class="mb-4" style="font-size:0.85rem; color: var(--text-main); flex-grow: 1;">
                    <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                        <span class="text-muted">Taban:</span>
                        <strong class="text-primary"><?= htmlspecialchars($distro['base_os']) ?></strong>
                    </div>
                    <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                        <span class="text-muted">Masaüstü (GUI):</span>
                        <strong><?= htmlspecialchars($distro['desktop_environment']) ?></strong>
                    </div>
                </div>

                <a href="index.php?page=distro_detail&slug=<?= urlencode($distro['slug']) ?>" class="btn-outline" style="width:100%; border-color:var(--primary-color); display:flex; justify-content:center; margin-top:auto;">Teknik Detayları Göster</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
.badge-beginner { background: rgba(16, 185, 129, 0.2); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.5); }
.badge-intermediate { background: rgba(245, 158, 11, 0.2); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.5); }
.badge-advanced { background: rgba(239, 68, 68, 0.2); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.5); }
</style>

<script>
// Gerçek zamanlı arama
function filterDistros() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let cards = document.getElementsByClassName('distro-card');
    
    for (let i = 0; i < cards.length; i++) {
        let textContent = cards[i].innerText.toLowerCase(); // Tüm text üzerinden arama
        
        if (textContent.includes(input)) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}
</script>

<?php require_once 'includes/footer.php'; ?>
