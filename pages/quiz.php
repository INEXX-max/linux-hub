<?php
// pages/quiz.php — NEXOS AI-Powered Distro Quiz (Expanded Algorithm)
require_once 'includes/header.php';
require_once 'includes/section-title.php';
global $linux_distros;
$distros = $linux_distros;

$result_distros = [];
$show_results = false;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_quiz'])) {
    $scores = [];
    foreach($distros as $d) { $scores[$d['id']] = 0; }
    
    $purpose    = isset($_POST['purpose'])    ? $_POST['purpose'] : '';
    $experience = isset($_POST['experience']) ? $_POST['experience'] : '';
    $hardware   = isset($_POST['hardware'])   ? $_POST['hardware'] : '';
    $priority   = isset($_POST['priority'])   ? $_POST['priority'] : '';
    $desktop    = isset($_POST['desktop'])    ? $_POST['desktop'] : '';
    
    $answers = [
        'purpose' => $purpose, 'experience' => $experience, 
        'hardware' => $hardware, 'priority' => $priority, 'desktop' => $desktop
    ];
    
    foreach($distros as $d) {
        $point = 0;
        
        // Deneyim seviyesi (agirlik: 5x)
        if($experience == 'beginner') { 
            $point += ($d['score_beginner'] * 8); 
            $point -= (10 - $d['score_beginner']) * 3;
        }
        elseif($experience == 'intermediate') { 
            $point += ($d['score_beginner'] * 2); 
            $point += ($d['score_dev'] * 4); 
        }
        elseif($experience == 'advanced') { 
            $point -= ($d['score_beginner'] * 6); 
            $point += ($d['score_dev'] * 5); 
            $point += ($d['score_server'] * 3); 
            $point += ($d['score_security'] * 2);
        }
        
        // Amac (agirlik: 20x)
        if($purpose == 'gaming') { 
            $point += ($d['score_gaming'] * 25); 
            $point -= ($d['score_server'] * 12); 
            $point += ($d['score_beginner'] * 3);
        }
        elseif($purpose == 'dev') { 
            $point += ($d['score_dev'] * 15); 
            $point += ($d['score_server'] * 5);
            $point -= ($d['score_beginner'] * 3); 
        }
        elseif($purpose == 'server') { 
            $point += ($d['score_server'] * 30); 
            $point -= ($d['score_beginner'] * 10); 
            $point -= ($d['score_gaming'] * 8); 
            $point += ($d['score_security'] * 5);
        }
        elseif($purpose == 'security') { 
            $point += ($d['score_security'] * 30); 
            $point -= ($d['score_beginner'] * 8); 
            $point -= ($d['score_gaming'] * 10);
            $point += ($d['score_server'] * 5);
        }
        elseif($purpose == 'general') { 
            $point += ($d['score_beginner'] * 15); 
            $point += ($d['score_gaming'] * 3);
            $point -= ($d['score_server'] * 12); 
        }
        elseif($purpose == 'education') {
            $point += ($d['score_beginner'] * 10);
            $point += ($d['score_dev'] * 5);
            $point -= ($d['score_server'] * 5);
        }
        
        // Donanim (agirlik: 25x)
        if($hardware == 'old') { 
            $point += ($d['score_old_pc'] * 30); 
            $point -= ($d['score_gaming'] * 12); 
            $point -= ($d['score_dev'] * 5); 
        }
        elseif($hardware == 'mid') {
            $point += ($d['score_beginner'] * 3);
            $point += ($d['score_dev'] * 3);
        }
        elseif($hardware == 'high') {
            $point += ($d['score_gaming'] * 5);
            $point += ($d['score_dev'] * 5);
            $point -= ($d['score_old_pc'] * 3);
        }
        
        // Oncelik (yeni soru)
        if($priority == 'stability') {
            $point += ($d['score_server'] * 8);
            $point += ($d['score_beginner'] * 3);
        }
        elseif($priority == 'cutting_edge') {
            $point -= ($d['score_beginner'] * 5);
            $point += ($d['score_dev'] * 8);
        }
        elseif($priority == 'privacy') {
            $point += ($d['score_security'] * 10);
            $point -= ($d['score_beginner'] * 2);
        }
        elseif($priority == 'customization') {
            $point -= ($d['score_beginner'] * 5);
            $point += ($d['score_dev'] * 5);
            $point += ($d['score_security'] * 3);
        }
        
        // Masaustu tercihi (yeni soru)
        if($desktop == 'modern_gui') {
            $point += ($d['score_beginner'] * 5);
            $point += ($d['score_gaming'] * 3);
        }
        elseif($desktop == 'lightweight') {
            $point += ($d['score_old_pc'] * 8);
        }
        elseif($desktop == 'terminal_only') {
            $point -= ($d['score_beginner'] * 8);
            $point += ($d['score_server'] * 10);
            $point += ($d['score_security'] * 5);
        }
        
        $scores[$d['id']] = $point;
    }
    
    arsort($scores);
    $top3_ids = array_slice(array_keys($scores), 0, 3);
    foreach($top3_ids as $id) {
        foreach($distros as $d) {
            if($d['id'] == $id) { $d['algo_score'] = $scores[$id]; $result_distros[] = $d; }
        }
    }
    $show_results = true;
    
    if(isLoggedIn() && count($result_distros) > 0) {
        saveQuizResult($_SESSION['user_id'], $result_distros[0]['id'], json_encode($answers));
    }
}
?>

<?php if(!$show_results): ?>
<section class="nx-section" style="min-height:90vh; display:flex; align-items:center;">
    <div class="container" style="max-width:720px;">
        <?php sectionTitle('AI Algoritma', 'Sana En Uygun Dagitimiizi Bulalim', '5 soru, gelismis agirlikli puanlama. Sonuc saniyeler icinde.'); ?>

        <form method="POST" action="index.php?page=quiz" id="quizForm">
            <!-- Progress -->
            <div class="nx-quiz-progress" style="margin-bottom:var(--nx-sp-10);">
                <div class="d-flex justify-between mb-2" style="font-size:var(--nx-fs-xs); color:var(--nx-text-dim);">
                    <span>Soru <span id="currentStep">1</span> / 5</span>
                    <span id="progressPercent">20%</span>
                </div>
                <div class="nx-progress"><div class="nx-progress-bar" id="progressBar" style="width:20%; background:var(--nx-gradient-blue);"></div></div>
            </div>

            <!-- Step 1: Amac -->
            <div class="nx-quiz-step active" data-step="1">
                <h3 style="margin-bottom:var(--nx-sp-2); font-size:var(--nx-fs-2xl);">Birincil amac</h3>
                <p class="text-muted mb-6" style="font-size:var(--nx-fs-sm);">Linux'u ne icin kullanmayi planliyorsunuz?</p>
                <div class="nx-quiz-options">
                    <label class="nx-quiz-card"><input type="radio" name="purpose" value="general" required><div class="nx-quiz-card-inner"><i class="fa-solid fa-house" style="color:var(--nx-blue);"></i><strong>Gunluk Kullanim</strong><span>Web, medya, ofis</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="purpose" value="dev"><div class="nx-quiz-card-inner"><i class="fa-solid fa-code" style="color:var(--nx-green);"></i><strong>Yazilim Gelistirme</strong><span>Kod, Docker, Git</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="purpose" value="gaming"><div class="nx-quiz-card-inner"><i class="fa-solid fa-gamepad" style="color:var(--nx-purple);"></i><strong>Oyun</strong><span>Steam, Proton, GPU</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="purpose" value="server"><div class="nx-quiz-card-inner"><i class="fa-solid fa-server" style="color:var(--nx-amber);"></i><strong>Sunucu</strong><span>Web hosting, veritabani</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="purpose" value="security"><div class="nx-quiz-card-inner"><i class="fa-solid fa-shield-halved" style="color:var(--nx-red);"></i><strong>Siber Guvenlik</strong><span>Pentest, forensics</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="purpose" value="education"><div class="nx-quiz-card-inner"><i class="fa-solid fa-graduation-cap" style="color:var(--nx-cyan);"></i><strong>Egitim</strong><span>Ogrenme, akademik</span></div></label>
                </div>
            </div>

            <!-- Step 2: Deneyim -->
            <div class="nx-quiz-step" data-step="2">
                <h3 style="margin-bottom:var(--nx-sp-2); font-size:var(--nx-fs-2xl);">Deneyim seviyesi</h3>
                <p class="text-muted mb-6" style="font-size:var(--nx-fs-sm);">Linux ile ilgili tecrübeniz ne düzeyde?</p>
                <div class="nx-quiz-options">
                    <label class="nx-quiz-card"><input type="radio" name="experience" value="beginner" required><div class="nx-quiz-card-inner"><i class="fa-solid fa-seedling" style="color:var(--nx-green);"></i><strong>Yeni Basliyorum</strong><span>Hic kullanmadim</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="experience" value="intermediate"><div class="nx-quiz-card-inner"><i class="fa-solid fa-laptop-code" style="color:var(--nx-blue);"></i><strong>Orta Seviye</strong><span>Temel komutlari biliyorum</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="experience" value="advanced"><div class="nx-quiz-card-inner"><i class="fa-solid fa-terminal" style="color:var(--nx-purple);"></i><strong>Ileri Seviye</strong><span>Kernel, script, server</span></div></label>
                </div>
            </div>

            <!-- Step 3: Donanim -->
            <div class="nx-quiz-step" data-step="3">
                <h3 style="margin-bottom:var(--nx-sp-2); font-size:var(--nx-fs-2xl);">Donanim gucu</h3>
                <p class="text-muted mb-6" style="font-size:var(--nx-fs-sm);">Bilgisayarinizin yaklasik performans seviyesi.</p>
                <div class="nx-quiz-options">
                    <label class="nx-quiz-card"><input type="radio" name="hardware" value="old" required><div class="nx-quiz-card-inner"><i class="fa-solid fa-battery-quarter" style="color:var(--nx-amber);"></i><strong>Dusuk / Eski</strong><span>4GB RAM, eski islemci</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="hardware" value="mid"><div class="nx-quiz-card-inner"><i class="fa-solid fa-battery-half" style="color:var(--nx-blue);"></i><strong>Orta</strong><span>8GB RAM, modern CPU</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="hardware" value="high"><div class="nx-quiz-card-inner"><i class="fa-solid fa-battery-full" style="color:var(--nx-green);"></i><strong>Yuksek</strong><span>16GB+ RAM, GPU</span></div></label>
                </div>
            </div>

            <!-- Step 4: Oncelik (YENI) -->
            <div class="nx-quiz-step" data-step="4">
                <h3 style="margin-bottom:var(--nx-sp-2); font-size:var(--nx-fs-2xl);">En onemli oncelik</h3>
                <p class="text-muted mb-6" style="font-size:var(--nx-fs-sm);">Bir isletim sisteminde sizin icin en onemli sey nedir?</p>
                <div class="nx-quiz-options">
                    <label class="nx-quiz-card"><input type="radio" name="priority" value="stability" required><div class="nx-quiz-card-inner"><i class="fa-solid fa-mountain" style="color:var(--nx-green);"></i><strong>Kararlilik</strong><span>Cokmesin, calışsın</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="priority" value="cutting_edge"><div class="nx-quiz-card-inner"><i class="fa-solid fa-bolt" style="color:var(--nx-cyan);"></i><strong>En Yeni Teknoloji</strong><span>Son kernel, son yazilim</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="priority" value="privacy"><div class="nx-quiz-card-inner"><i class="fa-solid fa-user-secret" style="color:var(--nx-purple);"></i><strong>Gizlilik</strong><span>Izlenme istemiyorum</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="priority" value="customization"><div class="nx-quiz-card-inner"><i class="fa-solid fa-palette" style="color:var(--nx-pink);"></i><strong>Ozellestirme</strong><span>Her seyi kontrol etmek</span></div></label>
                </div>
            </div>

            <!-- Step 5: Masaustu (YENI) -->
            <div class="nx-quiz-step" data-step="5">
                <h3 style="margin-bottom:var(--nx-sp-2); font-size:var(--nx-fs-2xl);">Arayuz tercihi</h3>
                <p class="text-muted mb-6" style="font-size:var(--nx-fs-sm);">Nasil bir gorunume sahip bir sistem tercih edersiniz?</p>
                <div class="nx-quiz-options">
                    <label class="nx-quiz-card"><input type="radio" name="desktop" value="modern_gui" required><div class="nx-quiz-card-inner"><i class="fa-solid fa-display" style="color:var(--nx-blue);"></i><strong>Modern Grafik</strong><span>GNOME, KDE gibi</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="desktop" value="lightweight"><div class="nx-quiz-card-inner"><i class="fa-solid fa-feather" style="color:var(--nx-green);"></i><strong>Hafif Arayuz</strong><span>XFCE, LXDE</span></div></label>
                    <label class="nx-quiz-card"><input type="radio" name="desktop" value="terminal_only"><div class="nx-quiz-card-inner"><i class="fa-solid fa-rectangle-terminal" style="color:var(--nx-amber);"></i><strong>Sadece Terminal</strong><span>GUI gereksiz</span></div></label>
                </div>
            </div>

            <!-- Navigation -->
            <div class="d-flex justify-between mt-8" style="gap:var(--nx-sp-4);">
                <button type="button" id="prevBtn" class="btn-ghost" style="display:none;" onclick="quizNav(-1)">
                    <i class="fa-solid fa-arrow-left"></i> Geri
                </button>
                <div style="flex:1;"></div>
                <button type="button" id="nextBtn" class="btn-primary" onclick="quizNav(1)">
                    Sonraki <i class="fa-solid fa-arrow-right"></i>
                </button>
                <button type="submit" name="submit_quiz" id="submitBtn" class="btn-gradient btn-lg" style="display:none;">
                    <i class="fa-solid fa-wand-magic-sparkles"></i> Analiz Et
                </button>
            </div>
        </form>
    </div>
</section>

<script>
let currentStep = 1;
const totalSteps = 5;

function quizNav(dir) {
    const steps = document.querySelectorAll('.nx-quiz-step');
    const current = steps[currentStep - 1];
    const radios = current.querySelectorAll('input[type="radio"]');
    let selected = false;
    radios.forEach(r => { if(r.checked) selected = true; });
    if(dir === 1 && !selected) { 
        current.style.animation = 'shake 0.4s ease';
        setTimeout(() => current.style.animation = '', 400);
        return; 
    }
    
    currentStep += dir;
    if(currentStep < 1) currentStep = 1;
    if(currentStep > totalSteps) currentStep = totalSteps;
    
    steps.forEach((s, i) => {
        s.classList.toggle('active', i === currentStep - 1);
    });
    
    document.getElementById('prevBtn').style.display = currentStep > 1 ? 'inline-flex' : 'none';
    document.getElementById('nextBtn').style.display = currentStep < totalSteps ? 'inline-flex' : 'none';
    document.getElementById('submitBtn').style.display = currentStep === totalSteps ? 'inline-flex' : 'none';
    document.getElementById('currentStep').textContent = currentStep;
    const pct = Math.round((currentStep / totalSteps) * 100);
    document.getElementById('progressPercent').textContent = pct + '%';
    document.getElementById('progressBar').style.width = pct + '%';
}
</script>

<?php else: ?>
<!-- RESULTS -->
<section class="nx-section" style="min-height:90vh; display:flex; align-items:center;">
    <div class="container" style="max-width:860px;">
        <div class="text-center mb-10 reveal">
            <div class="nx-label" style="display:inline-flex; align-items:center; gap:8px; padding:6px 18px; background:var(--nx-green-subtle); color:var(--nx-green); border-radius:var(--nx-radius-full); font-size:var(--nx-fs-xs); font-weight:700; text-transform:uppercase; letter-spacing:1px; border:1px solid rgba(16,185,129,0.2);">
                <i class="fa-solid fa-check-circle"></i> Analiz Tamamlandi
            </div>
            <h2 style="font-size:var(--nx-fs-4xl); margin-top:var(--nx-sp-5); font-weight:800;">Sana En Uygun Dagitimlar</h2>
            <p class="text-muted" style="max-width:500px; margin:var(--nx-sp-3) auto 0;">5 soruya verdigin yanitlara gore algoritmamiz bu sonuclari uretti.</p>
        </div>

        <div class="grid grid-3 gap-6 reveal-stagger">
            <?php foreach($result_distros as $i => $rd): 
                $isChampion = ($i === 0);
                $medal = ['fa-trophy', 'fa-medal', 'fa-award'];
                $medalColor = ['var(--nx-amber)', 'var(--nx-text-soft)', 'var(--nx-amber)'];
                $rankLabel = ['En Iyi Eslesme', '2. Oneri', '3. Oneri'];
            ?>
            <div class="nx-card reveal <?= $isChampion ? 'nx-champion-card' : '' ?>" style="<?= $isChampion ? 'border-color:rgba(16,185,129,0.3); background:var(--nx-green-subtle);' : '' ?> padding:var(--nx-sp-8); text-align:center;">
                <div style="margin-bottom:var(--nx-sp-4);">
                    <i class="fa-solid <?= $medal[$i] ?>" style="font-size:2rem; color:<?= $medalColor[$i] ?>;"></i>
                </div>
                <div style="font-size:var(--nx-fs-xs); color:<?= $isChampion ? 'var(--nx-green)' : 'var(--nx-text-muted)' ?>; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:var(--nx-sp-3);">
                    <?= $rankLabel[$i] ?>
                </div>
                <h3 style="font-size:var(--nx-fs-2xl); color:<?= $isChampion ? 'var(--nx-green)' : 'var(--nx-blue)' ?>; margin-bottom:var(--nx-sp-3);"><?= htmlspecialchars($rd['name']) ?></h3>
                <p class="text-muted mb-4" style="font-size:var(--nx-fs-sm); line-height:1.6;"><?= htmlspecialchars($rd['short_desc']) ?></p>
                <div style="font-family:var(--nx-font-mono); font-size:var(--nx-fs-xs); color:var(--nx-text-dim); margin-bottom:var(--nx-sp-5);">
                    skor: <?= $rd['algo_score'] ?>pt
                </div>
                <a href="index.php?page=distro_detail&slug=<?= urlencode($rd['slug']) ?>" class="<?= $isChampion ? 'btn-highlight' : 'btn-outline' ?> w-full" style="justify-content:center;">
                    Detaylari Incele
                </a>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-10 reveal">
            <a href="index.php?page=quiz" class="btn-ghost"><i class="fa-solid fa-rotate"></i> Testi Tekrarla</a>
            <a href="index.php?page=distros" class="btn-outline" style="margin-left:var(--nx-sp-4);"><i class="fa-solid fa-th-large"></i> Tum Dagitimlar</a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>
