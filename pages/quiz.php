<?php
// pages/quiz.php

require_once 'includes/header.php';

// Modellenmiş Config verilerinden distroları çek
global $linux_distros;
$distros = $linux_distros;

$result_distros = [];
$show_results = false;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_quiz'])) {
    
    // Basit Puanlama Algoritması
    $scores = [];
    foreach($distros as $d) {
        $scores[$d['id']] = 0; 
    }
    
    $answers = [];
    $purpose    = isset($_POST['purpose'])    ? $_POST['purpose'] : '';
    $experience = isset($_POST['experience']) ? $_POST['experience'] : '';
    $hardware   = isset($_POST['hardware'])   ? $_POST['hardware'] : '';
    
    $answers['purpose']    = $purpose;
    $answers['experience'] = $experience;
    $answers['hardware']   = $hardware;
    
    // Algoritma
    foreach($distros as $d) {
        $point = 0;
        
        // Tecrübeye göre ana katsayı
        if($experience == 'beginner') {
            $point += ($d['score_beginner'] * 5); // Acemi arıyorsa direkt Mint vb.
        } elseif($experience == 'intermediate') {
            $point += ($d['score_beginner'] * 2); 
            $point += ($d['score_dev'] * 2); 
        } elseif($experience == 'advanced') {
            $point -= ($d['score_beginner'] * 5); // Yeni başlayan sistemlerinden nefret eder (Arch yukarı)
            $point += ($d['score_dev'] * 3); 
            $point += ($d['score_server'] * 3); 
        }
        
        // Amaca Göre Keskin Ayrımlar (Süzgeçleme)
        if($purpose == 'gaming') {
            $point += ($d['score_gaming'] * 20); // PopOS gibi oyun devleri uçar
            $point -= ($d['score_server'] * 10); // Sunucular oyunlardan uzaklaştırılır
        } elseif($purpose == 'dev') {
            $point += ($d['score_dev'] * 10);
            $point -= ($d['score_beginner'] * 2);
        } elseif($purpose == 'server') {
            // SUNUCU SEÇİLDİYSE MASAÜSTÜ ODAKLI SİSTEMLERİ YOK ET
            $point += ($d['score_server'] * 25);
            $point -= ($d['score_beginner'] * 8); // Ana akım masaüstüler (Mint, Ubuntu) elenir
            $point -= ($d['score_gaming'] * 5); // Oyun sistemleri sunucu olmaz
        } elseif($purpose == 'security') {
            $point += ($d['score_security'] * 25); // Kali anında liderliğe oturur
            $point -= ($d['score_beginner'] * 5);
        } elseif($purpose == 'general') {
            $point += ($d['score_beginner'] * 10);
            $point -= ($d['score_server'] * 10); // Genel kullanımda saf sunucuları siliyoruz
        }
        
        // Donanıma Göre Filitre
        if($hardware == 'old') {
            $point += ($d['score_old_pc'] * 25); // Lubuntu vb uçar
            $point -= ($d['score_gaming'] * 10); // Eski pclerde oyun zaten olmaz
            $point -= ($d['score_dev'] * 5); // Ağır IDE'ler de kasacaktır
        }
        
        $scores[$d['id']] = $point;
    }
    
    arsort($scores);
    $top3_ids = array_slice(array_keys($scores), 0, 3);
    
    foreach($top3_ids as $id) {
        foreach($distros as $d) {
            if($d['id'] == $id) {
                $d['algo_score'] = $scores[$id];
                $result_distros[] = $d;
            }
        }
    }
    
    $show_results = true;
    
    // Session Kaydı (DB olmadığı için geçici hafıza)
    if(isLoggedIn() && count($result_distros) > 0) {
        $best_distro_id = $result_distros[0]['id'];
        $_SESSION['last_quiz_result'] = [
            'recommended_distro_id' => $best_distro_id,
            'answers_json' => json_encode($answers),
            'created_at' => date('Y-m-d H:i:s')
        ];
    }
}
?>

<div class="container mt-5 mb-5">
    
    <!-- Sonuç Ekranı -->
    <?php if($show_results): ?>
        <div class="text-center mb-5">
            <h1 class="text-accent"><i class="fa-solid fa-wand-magic-sparkles"></i> İşte Analiz Sonuçların!</h1>
            <p class="text-muted">Türetilen puanlama algoritmasına göre, sana en uygun sistemin hangisi olduğunu belirledik.</p>
        </div>
        
        <div class="results-container d-flex" style="flex-direction:column; gap:30px; align-items:center;">
            
            <?php foreach($result_distros as $index => $res): ?>
                <div class="card distro-result-card" style="width: 100%; max-width:800px; <?= $index==0 ? 'border: 2px solid var(--accent-color); box-shadow: 0 0 30px rgba(16,185,129,0.2); background: rgba(16, 185, 129, 0.05);' : 'background: rgba(0,0,0,0.3);' ?>">
                    <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:15px; margin-bottom:15px;">
                        <h2 style="margin:0; color: <?= $index==0 ? 'var(--accent-color)' : 'var(--text-main)' ?>;">
                            <?= $index==0 ? '<i class="fa-solid fa-trophy"></i> ' : '' ?> #<?= $index + 1 ?> : <?= htmlspecialchars($res['name']) ?>
                        </h2>
                        <?php if($index == 0): ?>
                            <span class="badge" style="background:var(--accent-color); color:#fff; font-weight:bold; padding:5px 15px; border-radius:30px; font-size:0.85rem;">EN YÜKSEK UYUM SİNERJİSİ</span>
                        <?php else: ?>
                            <span style="font-size:0.9rem; color:var(--text-muted);">Alternatif Plan</span>
                        <?php endif; ?>
                    </div>
                    <p style="font-size:1.05rem; line-height:1.6;" class="mb-4">
                        <?= htmlspecialchars($res['short_desc']) ?>
                    </p>
                    <div class="mb-3" style="font-size:0.9rem; color:var(--text-muted);">
                        <strong>Taban: </strong><?= htmlspecialchars($res['base_os']) ?> &nbsp;|&nbsp; 
                        <strong>GUI: </strong><?= htmlspecialchars($res['desktop_environment']) ?>
                    </div>
                    <div class="text-right d-flex justify-between align-center">
                        <?php if($index==0 && !isLoggedIn()): ?>
                             <span style="font-size:0.85rem; color:var(--text-muted);">Sonucu kaydetmek için <a href="index.php?page=register" style="text-decoration:underline;">kayıt ol</a>.</span>
                        <?php else: ?>
                             <span></span>
                        <?php endif; ?>
                        <a href="index.php?page=distro_detail&slug=<?= $res['slug'] ?>" class="<?= $index==0 ? 'btn-highlight' : 'btn-outline' ?>">Teknik Spektlerini Göster <i class="fa-solid fa-arrow-right" style="margin-left: 5px;"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <div class="mt-4">
                <a href="index.php?page=quiz" class="btn-text" style="color:var(--text-muted);"><i class="fa-solid fa-rotate-left"></i> Testi Yeniden Çöz</a>
            </div>
        </div>

    <!-- Soru Anketi Formu -->
    <?php else: ?>
        <div class="quiz-intro text-center mb-5">
            <h1 class="text-primary" style="font-size:2.8rem; margin-bottom: 20px;">Hangi Linux Sana Göre?</h1>
            <p class="text-muted m-auto" style="max-width: 600px; font-size:1.1rem;">Verdiğiniz kısa yanıtlara göre binlerce olasılığı eleyecek ve arkamızdaki veritabanını kullanarak sana Linux'un en güzel halini sunacağız.</p>
        </div>

        <div class="quiz-form-container card m-auto" style="max-width: 750px; background: rgba(0,0,0,0.2); padding: 40px; position:relative; overflow:hidden;">
            <!-- Çark Dönme Animasyonu Yeri -->
            <div id="loaderArea" style="display:none; position:absolute; inset:0; background:var(--surface-color); z-index:10; display:flex; flex-direction:column; justify-content:center; align-items:center;">
                <i class="fa-solid fa-microchip fa-spin text-primary mb-4" style="font-size:4rem;"></i>
                <h3 class="text-accent" id="loaderText">Algoritmalar Hesaplanıyor...</h3>
            </div>

            <form id="quizForm" method="POST" action="index.php?page=quiz">
                
                <!-- SORU 1: Amaç -->
                <div class="step" id="step1">
                    <h3 class="text-accent mb-4"><i class="fa-solid fa-circle-question"></i> Soru 1: İşletim sistemini ana olarak ne maksatla kuruyorsun?</h3>
                    <div class="radio-group" style="display:grid; grid-template-columns: 1fr 1fr; gap:15px;">
                        
                        <label class="radio-card">
                            <input type="radio" name="purpose" value="general" required>
                            <span class="card-content">
                                <i class="fa-solid fa-house mb-3 text-primary" style="font-size:2.5rem;"></i>
                                <strong style="display:block;">Ev Dağıtımı</strong>
                                <span class="text-muted" style="font-size:0.85rem;">Standart web, netflix, dosya yönetimi.</span>
                            </span>
                        </label>

                        <label class="radio-card">
                            <input type="radio" name="purpose" value="dev">
                            <span class="card-content">
                                <i class="fa-solid fa-code mb-3 text-primary" style="font-size:2.5rem;"></i>
                                <strong style="display:block;">Geliştirici Dünyası</strong>
                                <span class="text-muted" style="font-size:0.85rem;">Kod ve betik yazmak, docker koşturmak.</span>
                            </span>
                        </label>
                        
                        <label class="radio-card">
                            <input type="radio" name="purpose" value="gaming">
                            <span class="card-content">
                                <i class="fa-solid fa-gamepad mb-3" style="font-size:2.5rem; color:#8b5cf6;"></i>
                                <strong style="display:block;">Saf Oyuncu</strong>
                                <span class="text-muted" style="font-size:0.85rem;">Steam, Proton performansı ve sürücüler.</span>
                            </span>
                        </label>

                        <label class="radio-card">
                            <input type="radio" name="purpose" value="security">
                            <span class="card-content">
                                <i class="fa-solid fa-mask mb-3" style="font-size:2.5rem; color:#ec4899;"></i>
                                <strong style="display:block;">Siber Güvenlikçi</strong>
                                <span class="text-muted" style="font-size:0.85rem;">Hazır sızma testi araçlarıyla donatılmış.</span>
                            </span>
                        </label>

                        <label class="radio-card" style="grid-column: span 2;">
                            <input type="radio" name="purpose" value="server">
                            <span class="card-content">
                                <i class="fa-solid fa-server mb-3" style="font-size:2.5rem; color:#f59e0b;"></i>
                                <strong style="display:block;">Sunucu / Uzak Sistem</strong>
                                <span class="text-muted" style="font-size:0.85rem;">Web sitemi / Veritabanımı açık tutup 7/24 arkada yöneteceğim.</span>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- SORU 2: Tecrübe -->
                <div class="step" id="step2" style="display:none;">
                    <h3 class="text-accent mb-4"><i class="fa-solid fa-circle-question"></i> Soru 2: Linux'a ne kadar hakimsiniz?</h3>
                    <div class="radio-group" style="display:flex; flex-direction:column; gap:15px;">
                        <label class="radio-card horizontal" style="text-align:left;">
                            <input type="radio" name="experience" value="beginner" required>
                            <span class="card-content" style="display:flex; align-items:center; gap:20px; flex-direction:row;">
                                <i class="fa-brands fa-windows" style="font-size:2rem; color:var(--primary-color);"></i>
                                <div>
                                    <strong style="font-size:1.1rem; color:#fff;">Sıfır Tecrübe / Gözüm Korkuyor</strong>
                                    <div class="text-muted mt-1" style="font-size:0.9rem;">Daha önce hiç kurmadım, kod yazmadan ayar dosyalarıyla uğraşmadan tıkla-çalıştır bir şey istiyorum.</div>
                                </div>
                            </span>
                        </label>
                        <label class="radio-card horizontal" style="text-align:left;">
                            <input type="radio" name="experience" value="intermediate">
                            <span class="card-content" style="display:flex; align-items:center; gap:20px; flex-direction:row;">
                                <i class="fa-solid fa-terminal" style="font-size:2rem; color:#f59e0b;"></i>
                                <div>
                                    <strong style="font-size:1.1rem; color:#fff;">Ortalama (Intermediate) Savaşçı</strong>
                                    <div class="text-muted mt-1" style="font-size:0.9rem;">sudo apt-get install falan anlıyorum. Komut satırına ufak ufak girip çözümler uygulamaktan çekinmem.</div>
                                </div>
                            </span>
                        </label>
                        <label class="radio-card horizontal" style="text-align:left;">
                            <input type="radio" name="experience" value="advanced">
                            <span class="card-content" style="display:flex; align-items:center; gap:20px; flex-direction:row;">
                                <i class="fa-solid fa-code-commit" style="font-size:2rem; color:#ef4444;"></i>
                                <div>
                                    <strong style="font-size:1.1rem; color:#fff;">İleri (Advanced) Düzey / Arch Sevdalısı</strong>
                                    <div class="text-muted mt-1" style="font-size:0.9rem;">Ben grafik arayüz istemiyorum, sistemi parça parça kendim kurup yönetmek benim en büyük tutkum. Hata çıktıkça düzeltirim.</div>
                                </div>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- SORU 3: Donanım -->
                <div class="step" id="step3" style="display:none;">
                    <h3 class="text-accent mb-4"><i class="fa-solid fa-circle-question"></i> Soru 3: Sistemi kurmayı düşündüğün cihazın gücü</h3>
                    <div class="radio-group" style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
                        <label class="radio-card">
                            <input type="radio" name="hardware" value="modern" required>
                            <span class="card-content">
                                <i class="fa-solid fa-bolt mb-3" style="font-size:3rem; color:#10b981;"></i>
                                <strong style="display:block; font-size:1.1rem;">Güçlü / Ortalama Piyasada</strong>
                                <span class="text-muted mt-2" style="font-size:0.9rem; display:block;">4GB ve üstü RAM, rahat SSD var. Animasyonlu şık bir masaüstünde kasılmadan çalışabilir.</span>
                            </span>
                        </label>
                        <label class="radio-card">
                            <input type="radio" name="hardware" value="old">
                            <span class="card-content">
                                <i class="fa-solid fa-person-cane mb-3" style="font-size:3rem; color:#ef4444;"></i>
                                <strong style="display:block; font-size:1.1rem;">Hayata Döndürmek Üzere!</strong>
                                <span class="text-muted mt-2" style="font-size:0.9rem; display:block;">Cihaz zor nefes alıyor, HDD veya çok düşük RAM var. Animasyona gerek yok, inanılmaz hafif bir sistem olsun.</span>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Controls -->
                <div class="quiz-controls mt-5 d-flex justify-between" style="border-top:1px solid rgba(255,255,255,0.1); padding-top:20px;">
                    <button type="button" class="btn-outline" id="prevBtn" style="visibility:hidden;" onclick="nextPrev(-1)"><i class="fa-solid fa-arrow-left"></i> Geri Dön</button>
                    
                    <div style="text-align:center; display:flex; align-items:center; font-size:0.85rem; color:var(--text-muted);">
                        <span id="stepCounter" style="color:#fff; font-weight:bold;">1</span> &nbsp;/ 3
                    </div>
                    
                    <button type="button" class="btn-primary" id="nextBtn" onclick="nextPrev(1)">Devam Et <i class="fa-solid fa-arrow-right"></i></button>
                    <button type="submit" name="submit_quiz" class="btn-highlight" id="submitBtn" style="display:none;" onclick="showLoader()">Sonucu Gör <i class="fa-solid fa-wand-magic"></i></button>
                </div>

            </form>
        </div>
    <?php endif; ?>
</div>

<style>
/* Fancy Radio Cards */
.radio-card input { display: none; }
.radio-card .card-content {
    display: block; background: rgba(0,0,0,0.3); border: 2px solid var(--border-color);
    border-radius: 12px; padding: 25px 15px; text-align: center; cursor: pointer; transition: 0.2s ease; height: 100%;
}
.radio-card input:checked + .card-content {
    background: rgba(16, 185, 129, 0.05); border-color: var(--accent-color);
}
</style>

<script>
let currentStep = 0;
const steps = document.querySelectorAll('.step');

function showStep(n) {
    if(!steps[n]) return;
    steps.forEach((step, index) => {
        step.style.display = (index === n) ? 'block' : 'none';
        step.style.animation = (index === n) ? 'slideIn 0.4s ease forwards' : 'none';
    });
    
    document.getElementById('prevBtn').style.visibility = (n === 0) ? 'hidden' : 'visible';
    
    if (n === (steps.length - 1)) {
        document.getElementById('nextBtn').style.display = 'none';
        document.getElementById('submitBtn').style.display = 'inline-flex';
    } else {
        document.getElementById('nextBtn').style.display = 'inline-flex';
        document.getElementById('submitBtn').style.display = 'none';
    }
    document.getElementById('stepCounter').innerText = (n + 1);
}

function nextPrev(n) {
    if(n == 1) {
        const inputs = steps[currentStep].querySelectorAll('input[type="radio"]');
        let selected = false;
        inputs.forEach(i => { if(i.checked) selected = true; });
        if(!selected) {
            alert("Devam etmek için bir cevap seçmelisiniz.");
            return false;
        }
    }
    currentStep += n;
    showStep(currentStep);
}

function showLoader(){
    const lf = document.getElementById('loaderArea');
    if(lf) {
        lf.style.display = 'flex';
    }
}

// Initial hide loader Area, handled by CSS mostly but good measure
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('loaderArea').style.display = 'none';
});
</script>

<?php require_once 'includes/footer.php'; ?>
