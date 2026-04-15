<?php
// pages/quiz.php — NEXOS Distro Quiz
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
    
    $answers = ['purpose' => $purpose, 'experience' => $experience, 'hardware' => $hardware];
    
    foreach($distros as $d) {
        $point = 0;
        if($experience == 'beginner')     { $point += ($d['score_beginner'] * 5); }
        elseif($experience == 'intermediate') { $point += ($d['score_beginner'] * 2); $point += ($d['score_dev'] * 2); }
        elseif($experience == 'advanced') { $point -= ($d['score_beginner'] * 5); $point += ($d['score_dev'] * 3); $point += ($d['score_server'] * 3); }
        
        if($purpose == 'gaming')   { $point += ($d['score_gaming'] * 20); $point -= ($d['score_server'] * 10); }
        elseif($purpose == 'dev')  { $point += ($d['score_dev'] * 10); $point -= ($d['score_beginner'] * 2); }
        elseif($purpose == 'server') { $point += ($d['score_server'] * 25); $point -= ($d['score_beginner'] * 8); $point -= ($d['score_gaming'] * 5); }
        elseif($purpose == 'security') { $point += ($d['score_security'] * 25); $point -= ($d['score_beginner'] * 5); }
        elseif($purpose == 'general')  { $point += ($d['score_beginner'] * 10); $point -= ($d['score_server'] * 10); }
        
        if($hardware == 'old') { $point += ($d['score_old_pc'] * 25); $point -= ($d['score_gaming'] * 10); $point -= ($d['score_dev'] * 5); }
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
        $_SESSION['last_quiz_result'] = [
            'recommended_distro_id' => $result_distros[0]['id'],
            'answers_json' => json_encode($answers),
            'created_at' => date('Y-m-d H:i:s')
        ];
    }
}
?>

<section class="nx-page-hero nx-bg-grid">
    <div class="container">
        <div class="nx-hero-label mx-auto" style="display:inline-flex;"><i class="fa-solid fa-wand-magic-sparkles"></i> Akıllı Analiz</div>
        <h1 class="nx-text-gradient-static"><?= $show_results ? 'Analiz Sonuçların!' : 'Hangi Linux Sana Göre?' ?></h1>
        <p><?= $show_results ? 'Puanlama algoritmasına göre en uygun dağıtımları belirledik.' : 'Kısa yanıtlara göre binlerce olasılığı eleyip en uygun Linux dağıtımını buluyoruz.' ?></p>
    </div>
</section>

<section class="nx-section-sm">
    <div class="container">
        <?php if($show_results): ?>
        <!-- RESULTS -->
        <div style="max-width:800px; margin:0 auto; display:flex; flex-direction:column; gap:var(--nx-sp-6); align-items:center;">
            <?php foreach($result_distros as $i => $res): 
                $badgeClass = $i === 0 ? 'nx-badge-green' : 'nx-badge-blue';
            ?>
            <div class="nx-card reveal w-full" style="<?= $i === 0 ? 'border:2px solid var(--nx-green); background:var(--nx-green-subtle); box-shadow:0 0 40px rgba(16,185,129,0.12);' : 'background:rgba(0,0,0,0.2);' ?>">
                <div class="d-flex justify-between items-center mb-4" style="border-bottom:1px solid var(--nx-border); padding-bottom:var(--nx-sp-4);">
                    <h2 style="margin:0; color:<?= $i === 0 ? 'var(--nx-green)' : 'var(--nx-text)' ?>;">
                        <?= $i === 0 ? '<i class="fa-solid fa-trophy"></i> ' : '' ?>#<?= $i + 1 ?> : <?= htmlspecialchars($res['name']) ?>
                    </h2>
                    <?php if($i === 0): ?>
                        <span class="nx-badge nx-badge-green">EN YÜKSEK UYUM</span>
                    <?php else: ?>
                        <span class="text-muted" style="font-size:var(--nx-fs-sm);">Alternatif</span>
                    <?php endif; ?>
                </div>
                <p style="font-size:var(--nx-fs-md); line-height:1.7;"><?= htmlspecialchars($res['short_desc']) ?></p>
                <div class="text-muted mb-4" style="font-size:var(--nx-fs-sm);">
                    <strong>Taban:</strong> <?= htmlspecialchars($res['base_os']) ?> &nbsp;|&nbsp;
                    <strong>GUI:</strong> <?= htmlspecialchars($res['desktop_environment']) ?>
                </div>
                <div class="d-flex justify-between items-center">
                    <?php if($i === 0 && !isLoggedIn()): ?>
                        <span class="text-muted" style="font-size:var(--nx-fs-xs);">Sonucu kaydetmek için <a href="index.php?page=register" style="text-decoration:underline;">kayıt ol</a>.</span>
                    <?php else: ?>
                        <span></span>
                    <?php endif; ?>
                    <a href="index.php?page=distro_detail&slug=<?= $res['slug'] ?>" class="<?= $i === 0 ? 'btn-highlight' : 'btn-outline' ?>">
                        Detayları Gör <i class="fa-solid fa-arrow-right" style="margin-left:6px;"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            <a href="index.php?page=quiz" class="btn-ghost mt-4"><i class="fa-solid fa-rotate-left"></i> Testi Yeniden Çöz</a>
        </div>

        <?php else: ?>
        <!-- QUIZ FORM -->
        <div class="nx-quiz-container">
            <div class="nx-quiz-card reveal">
                <!-- Progress -->
                <div class="nx-quiz-progress">
                    <div class="nx-quiz-progress-step active"></div>
                    <div class="nx-quiz-progress-step"></div>
                    <div class="nx-quiz-progress-step"></div>
                </div>

                <!-- Loader -->
                <div id="loaderArea" style="display:none; position:absolute; inset:0; background:var(--nx-surface); z-index:10; flex-direction:column; justify-content:center; align-items:center; border-radius:inherit;">
                    <i class="fa-solid fa-microchip nx-spin text-primary mb-4" style="font-size:3rem;"></i>
                    <h3 class="text-cyan">Algoritmalar Hesaplanıyor...</h3>
                </div>

                <form id="quizForm" method="POST" action="index.php?page=quiz">
                    <!-- Q1: Purpose -->
                    <div class="step" id="step1">
                        <h3 class="text-cyan mb-6"><i class="fa-solid fa-circle-question"></i> Soru 1: İşletim sistemini ne için kullanacaksınız?</h3>
                        <div class="radio-group grid grid-2 gap-4">
                            <label class="radio-card"><input type="radio" name="purpose" value="general" required>
                                <span class="card-content"><i class="fa-solid fa-house text-primary mb-3" style="font-size:2rem;"></i><strong>Ev Kullanımı</strong><span class="text-muted" style="font-size:var(--nx-fs-xs);">Web, video, dosya yönetimi</span></span>
                            </label>
                            <label class="radio-card"><input type="radio" name="purpose" value="dev">
                                <span class="card-content"><i class="fa-solid fa-code text-primary mb-3" style="font-size:2rem;"></i><strong>Geliştirici</strong><span class="text-muted" style="font-size:var(--nx-fs-xs);">Kod, Docker, Terminal</span></span>
                            </label>
                            <label class="radio-card"><input type="radio" name="purpose" value="gaming">
                                <span class="card-content"><i class="fa-solid fa-gamepad text-purple mb-3" style="font-size:2rem;"></i><strong>Oyuncu</strong><span class="text-muted" style="font-size:var(--nx-fs-xs);">Steam, Proton, FPS</span></span>
                            </label>
                            <label class="radio-card"><input type="radio" name="purpose" value="security">
                                <span class="card-content"><i class="fa-solid fa-mask text-pink mb-3" style="font-size:2rem;"></i><strong>Siber Güvenlik</strong><span class="text-muted" style="font-size:var(--nx-fs-xs);">Pentest, hacking araçları</span></span>
                            </label>
                            <label class="radio-card" style="grid-column:span 2;"><input type="radio" name="purpose" value="server">
                                <span class="card-content" style="flex-direction:row; gap:var(--nx-sp-4);"><i class="fa-solid fa-server text-amber" style="font-size:2rem;"></i><div style="text-align:left;"><strong>Sunucu</strong><div class="text-muted" style="font-size:var(--nx-fs-xs);">7/24 çalışan uzak sistem</div></div></span>
                            </label>
                        </div>
                    </div>

                    <!-- Q2: Experience -->
                    <div class="step" id="step2" style="display:none;">
                        <h3 class="text-cyan mb-6"><i class="fa-solid fa-circle-question"></i> Soru 2: Linux deneyiminiz?</h3>
                        <div class="radio-group" style="display:flex; flex-direction:column; gap:var(--nx-sp-4);">
                            <label class="radio-card"><input type="radio" name="experience" value="beginner" required>
                                <span class="card-content" style="flex-direction:row; gap:var(--nx-sp-5); text-align:left; min-height:auto; padding:var(--nx-sp-5);">
                                    <i class="fa-brands fa-windows text-primary" style="font-size:1.8rem;"></i>
                                    <div><strong>Sıfır Tecrübe</strong><div class="text-muted mt-1" style="font-size:var(--nx-fs-xs);">Tıkla-çalıştır bir şey istiyorum.</div></div>
                                </span>
                            </label>
                            <label class="radio-card"><input type="radio" name="experience" value="intermediate">
                                <span class="card-content" style="flex-direction:row; gap:var(--nx-sp-5); text-align:left; min-height:auto; padding:var(--nx-sp-5);">
                                    <i class="fa-solid fa-terminal text-amber" style="font-size:1.8rem;"></i>
                                    <div><strong>Orta Seviye</strong><div class="text-muted mt-1" style="font-size:var(--nx-fs-xs);">sudo apt-get install anlıyorum.</div></div>
                                </span>
                            </label>
                            <label class="radio-card"><input type="radio" name="experience" value="advanced">
                                <span class="card-content" style="flex-direction:row; gap:var(--nx-sp-5); text-align:left; min-height:auto; padding:var(--nx-sp-5);">
                                    <i class="fa-solid fa-code-commit text-red" style="font-size:1.8rem;"></i>
                                    <div><strong>İleri Düzey</strong><div class="text-muted mt-1" style="font-size:var(--nx-fs-xs);">Sistemi parça parça kendim kurup yönetirim.</div></div>
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Q3: Hardware -->
                    <div class="step" id="step3" style="display:none;">
                        <h3 class="text-cyan mb-6"><i class="fa-solid fa-circle-question"></i> Soru 3: Cihazınızın gücü?</h3>
                        <div class="radio-group grid grid-2 gap-5">
                            <label class="radio-card"><input type="radio" name="hardware" value="modern" required>
                                <span class="card-content"><i class="fa-solid fa-bolt text-green mb-3" style="font-size:2.5rem;"></i><strong>Güçlü / Ortalama</strong><span class="text-muted mt-2" style="font-size:var(--nx-fs-xs);">4GB+ RAM, SSD</span></span>
                            </label>
                            <label class="radio-card"><input type="radio" name="hardware" value="old">
                                <span class="card-content"><i class="fa-solid fa-person-cane text-red mb-3" style="font-size:2.5rem;"></i><strong>Eski Donanım</strong><span class="text-muted mt-2" style="font-size:var(--nx-fs-xs);">Düşük RAM, HDD</span></span>
                            </label>
                        </div>
                    </div>

                    <!-- Controls -->
                    <div class="d-flex justify-between items-center mt-8" style="border-top:1px solid var(--nx-border); padding-top:var(--nx-sp-5);">
                        <button type="button" class="btn-ghost" id="prevBtn" style="visibility:hidden;" onclick="nextPrev(-1)"><i class="fa-solid fa-arrow-left"></i> Geri</button>
                        <div class="text-muted" style="font-size:var(--nx-fs-sm);"><span id="stepCounter" class="font-bold text-white">1</span> / 3</div>
                        <button type="button" class="btn-primary" id="nextBtn" onclick="nextPrev(1)">Devam <i class="fa-solid fa-arrow-right"></i></button>
                        <button type="submit" name="submit_quiz" class="btn-gradient" id="submitBtn" style="display:none;" onclick="showLoader()"><i class="fa-solid fa-wand-magic"></i> Sonucu Gör</button>
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
let currentStep = 0;
const steps = document.querySelectorAll('.step');

function showStep(n) {
    if(!steps[n]) return;
    steps.forEach((s, i) => {
        s.style.display = i === n ? 'block' : 'none';
        if(i === n) s.style.animation = 'slideUp 0.4s ease forwards';
    });
    document.getElementById('prevBtn').style.visibility = n === 0 ? 'hidden' : 'visible';
    if(n === steps.length - 1) {
        document.getElementById('nextBtn').style.display = 'none';
        document.getElementById('submitBtn').style.display = 'inline-flex';
    } else {
        document.getElementById('nextBtn').style.display = 'inline-flex';
        document.getElementById('submitBtn').style.display = 'none';
    }
    document.getElementById('stepCounter').innerText = n + 1;
    
    // Update progress bar
    document.querySelectorAll('.nx-quiz-progress-step').forEach((ps, i) => {
        ps.classList.remove('active', 'done');
        if(i < n) ps.classList.add('done');
        if(i === n) ps.classList.add('active');
    });
}

function nextPrev(n) {
    if(n === 1) {
        const inputs = steps[currentStep].querySelectorAll('input[type="radio"]');
        let selected = false;
        inputs.forEach(i => { if(i.checked) selected = true; });
        if(!selected) { alert('Devam etmek için bir cevap seçin.'); return; }
    }
    currentStep += n;
    showStep(currentStep);
}

function showLoader() {
    const lf = document.getElementById('loaderArea');
    if(lf) lf.style.display = 'flex';
}

document.addEventListener('DOMContentLoaded', () => {
    const lf = document.getElementById('loaderArea');
    if(lf) lf.style.display = 'none';
});
</script>

<?php require_once 'includes/footer.php'; ?>
