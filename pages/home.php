<?php
// pages/home.php — NEXOS Ana Sayfa
// Premium landing page: Hero > Stats > Use Cases > Companies > Distros > Desktop Preview > Timeline > Security > Terminal > Learning > CTA
require_once 'includes/header.php';
require_once 'includes/section-title.php';
global $linux_distros;
?>

<!-- ═══════════════════════════════════════
     SECTION 1: HERO
     ═══════════════════════════════════════ -->
<section class="nx-hero nx-bg-grid">
    <!-- Background Glow Orbs -->
    <div class="nx-glow-orb nx-glow-orb-blue" style="top:-20%; left:-10%;"></div>
    <div class="nx-glow-orb nx-glow-orb-purple" style="bottom:-10%; right:-5%;"></div>
    
    <div class="container">
        <div class="nx-hero-inner">
            <!-- Left: Content -->
            <div class="nx-hero-content">
                <div class="nx-hero-label">
                    <i class="fa-solid fa-rocket"></i> Geleceğin İşletim Sistemi
                </div>
                <h1 class="nx-hero-title">
                    Özgürlüğün Kodlandığı<br>
                    <span class="nx-text-gradient">İşletim Sistemi</span>
                </h1>
                <p class="nx-hero-subtitle">
                    Açık kaynak, peerless güvenlik, sınırsız özelleştirme ve dünya genelinde milyonlarca geliştiricinin gücü — Linux ile tanışın.
                </p>
                <div class="nx-hero-actions">
                    <a href="index.php?page=what-is-linux" class="btn-gradient btn-lg">
                        <i class="fa-solid fa-bolt"></i> Linux'u Keşfet
                    </a>
                    <a href="index.php?page=distros" class="btn-outline btn-lg">
                        <i class="fa-solid fa-grid-2"></i> Dağıtımları İncele
                    </a>
                    <a href="index.php?page=register" class="btn-ghost btn-lg">
                        Topluluğa Katıl <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Right: Linux Desktop Mockup -->
            <div class="nx-hero-visual">
                <?php require_once 'includes/hero-linux-ui.php'; ?>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     SECTION 2: STATS BAR
     ═══════════════════════════════════════ -->
<section class="nx-section-sm nx-section-alt">
    <div class="container">
        <div class="nx-stats-bar reveal">
            <div class="nx-stat">
                <div class="nx-stat-value nx-counter" data-target="96">0</div>
                <div class="nx-stat-label">Sunucu Pazar Payı (%)</div>
            </div>
            <div class="nx-stat">
                <div class="nx-stat-value nx-counter" data-target="100">0</div>
                <div class="nx-stat-label">Top500 Süper Bilgisayar (%)</div>
            </div>
            <div class="nx-stat">
                <div class="nx-stat-value nx-counter" data-target="3" data-suffix="M+">0</div>
                <div class="nx-stat-label">Android Cihaz (Milyar)</div>
            </div>
            <div class="nx-stat">
                <div class="nx-stat-value nx-counter" data-target="20000" data-suffix="+">0</div>
                <div class="nx-stat-label">Kernel Katkıcısı</div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     SECTION 3: LINUX NERELERDE KULLANILIR
     ═══════════════════════════════════════ -->
<section class="nx-section nx-bg-dots">
    <div class="container">
        <?php sectionTitle('Kullanım Alanları', 'Linux Her Yerde', 'Cebinizdeki telefondan uzaydaki uydulara, dünya genelinde Linux sessizce her şeyi çalıştırıyor.'); ?>
        
        <div class="grid grid-3 gap-6 reveal-stagger">
            <?php
            $useCases = [
                ['icon' => 'fa-solid fa-server', 'color' => 'blue', 'title' => 'Sunucular', 'desc' => 'İnternetteki web sitelerinin %96\'sı Linux sunucularda çalışır.'],
                ['icon' => 'fa-solid fa-shield-halved', 'color' => 'pink', 'title' => 'Siber Güvenlik', 'desc' => 'Kali Linux ve Parrot OS ile sızma testleri ve güvenlik denetimleri.'],
                ['icon' => 'fa-solid fa-code', 'color' => 'purple', 'title' => 'Yazılım Geliştirme', 'desc' => 'Docker, Kubernetes, Git — tüm modern araçlar Linux\'ta doğar.'],
                ['icon' => 'fa-solid fa-cloud', 'color' => 'cyan', 'title' => 'Bulut Sistemleri', 'desc' => 'AWS, Azure, GCP — bulutun temeli Linux üzerine inşa edilmiştir.'],
                ['icon' => 'fa-solid fa-microchip', 'color' => 'green', 'title' => 'Gömülü Sistemler', 'desc' => 'IoT cihazları, robotlar, araç bilgisayarları Linux çekirdeği kullanır.'],
                ['icon' => 'fa-solid fa-atom', 'color' => 'amber', 'title' => 'Süper Bilgisayarlar', 'desc' => 'Dünyanın en güçlü 500 bilgisayarının %100\'ü Linux çalıştırır.'],
                ['icon' => 'fa-solid fa-building', 'color' => 'blue', 'title' => 'Kurumsal Altyapı', 'desc' => 'Red Hat Enterprise ile Fortune 500 şirketlerinin kritik sistemleri.'],
                ['icon' => 'fa-solid fa-graduation-cap', 'color' => 'purple', 'title' => 'Eğitim Kurumları', 'desc' => 'Üniversiteler ve araştırma merkezlerinin tercih ettiği özgür platform.'],
                ['icon' => 'fa-solid fa-cubes', 'color' => 'cyan', 'title' => 'DevOps & Container', 'desc' => 'Konteyner teknolojileri (Docker, Podman) doğal Linux ortamında gelişir.'],
            ];
            foreach($useCases as $uc):
            ?>
            <div class="nx-usecase-card reveal">
                <div class="nx-icon-box nx-icon-box-<?= $uc['color'] ?>">
                    <i class="<?= $uc['icon'] ?>"></i>
                </div>
                <h4><?= $uc['title'] ?></h4>
                <p><?= $uc['desc'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     SECTION 4: BÜYÜK KURULUŞLAR
     ═══════════════════════════════════════ -->
<section class="nx-section-sm nx-section-alt">
    <div class="container">
        <?php sectionTitle('Güven', 'Dünyanın Devleri Linux Kullanıyor', 'Küresel teknoloji altyapısının kalbinde Linux yer alıyor.'); ?>
        
        <div class="nx-company-grid reveal">
            <?php
            $companies = [
                ['name' => 'Google', 'info' => 'Android + tüm altyapı'],
                ['name' => 'Amazon', 'info' => 'AWS — en büyük bulut sağlayıcı'],
                ['name' => 'Meta', 'info' => 'Milyarlarca kullanıcının altyapısı'],
                ['name' => 'NASA', 'info' => 'ISS ve Mars görevleri'],
                ['name' => 'CERN', 'info' => 'Büyük Hadron Çarpıştırıcısı'],
                ['name' => 'IBM', 'info' => 'Red Hat satın alımı — $34B'],
                ['name' => 'Intel', 'info' => 'Kernel\'a en çok katkı'],
                ['name' => 'Oracle', 'info' => 'Oracle Linux + veritabanları'],
                ['name' => 'Red Hat', 'info' => 'Kurumsal Linux lideri'],
                ['name' => 'Tesla', 'info' => 'Araç bilgisayarları Linux'],
            ];
            foreach($companies as $c):
            ?>
            <div class="nx-company-logo">
                <?= $c['name'] ?>
                <div class="nx-tooltip"><?= $c['info'] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     SECTION 5: DAĞITIMLAR ÖNİZLEME
     ═══════════════════════════════════════ -->
<section class="nx-section">
    <div class="container">
        <?php sectionTitle('Dağıtımlar', 'Her İhtiyaca Bir Linux', 'Yüzlerce dağıtım arasından ihtiyacınıza en uygun olanı bulun.'); ?>
        
        <div class="grid grid-3 gap-6 reveal-stagger">
            <?php 
            $featured = array_slice($linux_distros, 0, 6);
            foreach($featured as $distro): 
                $badgeClass = 'nx-badge-' . (
                    $distro['difficulty'] === 'Beginner' ? 'green' : 
                    ($distro['difficulty'] === 'Intermediate' ? 'amber' : 'red')
                );
            ?>
            <div class="nx-distro-card reveal">
                <div class="nx-distro-card-header">
                    <h3><?= htmlspecialchars($distro['name']) ?></h3>
                    <span class="nx-badge <?= $badgeClass ?>"><?= $distro['difficulty'] ?></span>
                </div>
                <p class="nx-distro-card-desc"><?= htmlspecialchars($distro['short_desc']) ?></p>
                <div class="nx-distro-card-meta">
                    <div class="nx-distro-card-meta-row">
                        <span class="label">Taban</span>
                        <span class="value text-primary"><?= htmlspecialchars($distro['base_os']) ?></span>
                    </div>
                    <div class="nx-distro-card-meta-row">
                        <span class="label">Masaüstü</span>
                        <span class="value"><?= htmlspecialchars($distro['desktop_environment']) ?></span>
                    </div>
                </div>
                <a href="index.php?page=distro_detail&slug=<?= urlencode($distro['slug']) ?>" class="btn-outline w-full" style="justify-content:center;">
                    Detayları Gör <i class="fa-solid fa-arrow-right" style="margin-left:6px;"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-10 reveal">
            <a href="index.php?page=distros" class="btn-primary btn-lg">
                <i class="fa-solid fa-th-large"></i> Tüm Dağıtımları Gör
            </a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     SECTION 6: MASAÜSTÜ ARAYÜZ ÖNİZLEMELERİ
     ═══════════════════════════════════════ -->
<section class="nx-section nx-section-alt">
    <div class="container">
        <?php sectionTitle('Masaüstü Ortamları', 'Linux\'ta Görsel Deneyim', 'Tek tıkla tüm arayüzü değiştirin. İşte en popüler masaüstü ortamları.'); ?>
        
        <?php require_once 'includes/desktop-preview-tabs.php'; ?>
    </div>
</section>

<!-- ═══════════════════════════════════════
     SECTION 7: TARİHÇE ÖNİZLEME
     ═══════════════════════════════════════ -->
<section class="nx-section">
    <div class="container">
        <?php sectionTitle('Tarihçe', '30+ Yıllık Özgürlük Yolculuğu', 'Bir üniversite projesinden dünyanın en büyük yazılım ekosistemine.'); ?>
        
        <div style="max-width:700px; margin:0 auto;">
            <div class="reveal" style="display:flex; align-items:flex-start; gap:var(--nx-sp-6); margin-bottom:var(--nx-sp-8);">
                <div style="width:48px; height:48px; background:var(--nx-blue-subtle); border-radius:var(--nx-radius-md); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <span style="font-weight:800; color:var(--nx-blue); font-size:0.75rem;">1991</span>
                </div>
                <div>
                    <h4 style="color:var(--nx-blue); margin-bottom:var(--nx-sp-1);">Linux'un Doğuşu</h4>
                    <p style="margin:0; color:var(--nx-text-muted); font-size:var(--nx-fs-sm);">Linus Torvalds, Helsinki'de "hobi amaçlı" bir çekirdek yazmaya başladı. GNU araçlarıyla birleşerek GNU/Linux doğdu.</p>
                </div>
            </div>
            <div class="reveal" style="display:flex; align-items:flex-start; gap:var(--nx-sp-6); margin-bottom:var(--nx-sp-8);">
                <div style="width:48px; height:48px; background:var(--nx-green-subtle); border-radius:var(--nx-radius-md); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <span style="font-weight:800; color:var(--nx-green); font-size:0.75rem;">2004</span>
                </div>
                <div>
                    <h4 style="color:var(--nx-green); margin-bottom:var(--nx-sp-1);">Ubuntu Devrimi</h4>
                    <p style="margin:0; color:var(--nx-text-muted); font-size:var(--nx-fs-sm);">Mark Shuttleworth, "herkes için Linux" vizyonuyla Ubuntu'yu çıkardı. Masaüstü Linux kullanımını patlattı.</p>
                </div>
            </div>
            <div class="reveal" style="display:flex; align-items:flex-start; gap:var(--nx-sp-6); margin-bottom:var(--nx-sp-8);">
                <div style="width:48px; height:48px; background:var(--nx-amber-subtle); border-radius:var(--nx-radius-md); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <span style="font-weight:800; color:var(--nx-amber); font-size:0.70rem;">2024+</span>
                </div>
                <div>
                    <h4 style="color:var(--nx-amber); margin-bottom:var(--nx-sp-1);">Günümüz — Her Yerde Linux</h4>
                    <p style="margin:0; color:var(--nx-text-muted); font-size:var(--nx-fs-sm);">Bulut, AI, süper bilgisayarlar, Steam Deck, Android — Linux artık her yerde. %100 pazar payıyla süper bilgisayar tahtı.</p>
                </div>
            </div>
        </div>
        
        <div class="text-center reveal">
            <a href="index.php?page=history" class="btn-outline">
                <i class="fa-solid fa-clock-rotate-left"></i> Tam Tarihçeyi Gör
            </a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     SECTION 8: GÜVENLİK & PERFORMANS
     ═══════════════════════════════════════ -->
<section class="nx-section nx-section-alt">
    <div class="container">
        <?php sectionTitle('Güvenlik & Performans', 'Neden Geliştiriciler Linux Tercih Eder?', 'Güvenlik, hız, kontrol ve özgürlük — Linux\'u vazgeçilmez kılan dört temel.'); ?>
        
        <div class="grid grid-4 gap-6 reveal-stagger">
            <div class="nx-infographic-card reveal">
                <div class="nx-icon-box nx-icon-box-green mx-auto mb-4" style="margin:0 auto var(--nx-sp-5) auto;">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h4>İzin Sistemi</h4>
                <p class="text-muted" style="font-size:var(--nx-fs-sm);">Root ve kullanıcı ayrımı. Zararlı yazılım sudo izni olmadan sisteme zarar veremez.</p>
            </div>
            <div class="nx-infographic-card reveal">
                <div class="nx-icon-box nx-icon-box-blue mx-auto mb-4" style="margin:0 auto var(--nx-sp-5) auto;">
                    <i class="fa-solid fa-gauge-high"></i>
                </div>
                <h4>Düşük Kaynak</h4>
                <p class="text-muted" style="font-size:var(--nx-fs-sm);">GUI olmadan 50MB RAM ile çalışır. Eski donanımlarda bile akıcı performans.</p>
            </div>
            <div class="nx-infographic-card reveal">
                <div class="nx-icon-box nx-icon-box-purple mx-auto mb-4" style="margin:0 auto var(--nx-sp-5) auto;">
                    <i class="fa-solid fa-sliders"></i>
                </div>
                <h4>Tam Özelleştirme</h4>
                <p class="text-muted" style="font-size:var(--nx-fs-sm);">Çekirdeği yeniden derleyin, masaüstünü değiştirin, her piksel sizin kontrolünüzde.</p>
            </div>
            <div class="nx-infographic-card reveal">
                <div class="nx-icon-box nx-icon-box-cyan mx-auto mb-4" style="margin:0 auto var(--nx-sp-5) auto;">
                    <i class="fa-solid fa-box-open"></i>
                </div>
                <h4>Paket Yönetimi</h4>
                <p class="text-muted" style="font-size:var(--nx-fs-sm);">APT, DNF, Pacman — güvenli depolardan tek komutla yazılım kurulumu.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     SECTION 9: TERMİNAL DENEYİMİ
     ═══════════════════════════════════════ -->
<section class="nx-section">
    <div class="container">
        <?php sectionTitle('Terminal', 'Linux Komut Satırını Deneyin', 'Gerçek Linux terminal deneyimini hissedin. Komut yazın, sonuçları görün.'); ?>
        
        <div style="max-width:700px; margin:0 auto;">
            <?php require_once 'includes/terminal-widget.php'; ?>
            <p class="text-center text-muted mt-4" style="font-size:var(--nx-fs-xs);">
                <i class="fa-solid fa-circle-info"></i> Bu simüle edilmiş bir terminaldir. Güvenli ortamda çalışır.
                Deneyin: <code>ls</code>, <code>pwd</code>, <code>whoami</code>, <code>neofetch</code>, <code>help</code>
            </p>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     SECTION 10: ÖĞRENME & TOPLULUK
     ═══════════════════════════════════════ -->
<section class="nx-section nx-section-alt">
    <div class="container">
        <?php sectionTitle('Topluluk', 'Öğrenme Yolculuğunuza Başlayın', 'Linux dünyasına adım atmanız için her şey hazır.'); ?>
        
        <div class="grid grid-3 gap-6 reveal-stagger">
            <div class="nx-feature-card reveal text-center">
                <div class="nx-icon-box nx-icon-box-blue mx-auto mb-4" style="margin:0 auto var(--nx-sp-5) auto; width:64px; height:64px; font-size:1.6rem;">
                    <i class="fa-solid fa-compass"></i>
                </div>
                <h4>Dağıtım Rehberi</h4>
                <p class="text-muted" style="font-size:var(--nx-fs-sm);">Hangi dağıtım size uygun? Quiz ile en doğru seçimi yapın.</p>
                <a href="index.php?page=quiz" class="btn-primary btn-sm mt-4">Teste Başla</a>
            </div>
            <div class="nx-feature-card reveal text-center">
                <div class="nx-icon-box nx-icon-box-green mx-auto mb-4" style="margin:0 auto var(--nx-sp-5) auto; width:64px; height:64px; font-size:1.6rem;">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <h4>Linux Nedir?</h4>
                <p class="text-muted" style="font-size:var(--nx-fs-sm);">Çekirdek, dağıtım, açık kaynak — temel kavramları öğrenin.</p>
                <a href="index.php?page=what-is-linux" class="btn-outline btn-sm mt-4">Öğrenmeye Başla</a>
            </div>
            <div class="nx-feature-card reveal text-center">
                <div class="nx-icon-box nx-icon-box-purple mx-auto mb-4" style="margin:0 auto var(--nx-sp-5) auto; width:64px; height:64px; font-size:1.6rem;">
                    <i class="fa-solid fa-layer-group"></i>
                </div>
                <h4>Mimari Derinlik</h4>
                <p class="text-muted" style="font-size:var(--nx-fs-sm);">Kernel, shell, dosya sistemi — Linux nasıl çalışır öğrenin.</p>
                <a href="index.php?page=architecture" class="btn-outline btn-sm mt-4">Mimariyi Keşfet</a>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     SECTION 11: CTA BANNER
     ═══════════════════════════════════════ -->
<section class="nx-section">
    <div class="container">
        <div class="nx-cta-banner reveal">
            <h2 style="font-size:var(--nx-fs-3xl); margin-bottom:var(--nx-sp-4);">
                Geleceği <span class="nx-text-gradient">Açık Kaynak</span> ile İnşa Edin
            </h2>
            <p style="font-size:var(--nx-fs-md); color:var(--nx-text-muted); max-width:560px; margin:0 auto var(--nx-sp-8) auto;">
                NEXOS topluluğuna katılın. Dağıtımları keşfedin, quiz çözün, ilerlemenizi takip edin ve özgür yazılım dünyasının bir parçası olun.
            </p>
            <div class="d-flex gap-4 justify-center flex-wrap">
                <a href="index.php?page=register" class="btn-gradient btn-lg">
                    <i class="fa-solid fa-user-plus"></i> Hemen Başla
                </a>
                <a href="index.php?page=distros" class="btn-outline btn-lg">
                    Dağıtımları Keşfet
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
