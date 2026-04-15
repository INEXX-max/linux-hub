<?php
// pages/history.php — NEXOS Timeline Page
require_once 'includes/header.php';
require_once 'includes/section-title.php';
?>

<section class="nx-page-hero nx-bg-grid">
    <div class="nx-glow-orb nx-glow-orb-purple" style="top:-30%; left:20%;"></div>
    <div class="container">
        <div class="nx-hero-label mx-auto" style="display:inline-flex;"><i class="fa-solid fa-clock-rotate-left"></i> Zaman Çizelgesi</div>
        <h1 class="nx-text-gradient-static">Linux'un Tarihçesi</h1>
        <p>Dev oda büyüklüğündeki Unix makinelerinden cebimizdeki akıllı telefonlara uzanan özgür yazılımın serüveni.</p>
    </div>
</section>

<section class="nx-section">
    <div class="container">
        <div class="nx-timeline">
            <!-- 1969 — Unix -->
            <div class="nx-timeline-item reveal">
                <div class="nx-timeline-left">
                    <div class="nx-timeline-card">
                        <h3 style="color:var(--nx-blue);">1969 — Unix'in Doğuşu</h3>
                        <p>Bell Laboratuvarlarında Ken Thompson ve Dennis Ritchie önderliğinde "Unix" işletim sistemi geliştirildi. Çoklu görev konseptini başlattı ama kapalı kaynak ve inanılmaz pahalıydı.</p>
                    </div>
                </div>
                <div class="nx-timeline-dot"></div>
                <div class="nx-timeline-spacer"></div>
            </div>

            <!-- 1983 — GNU -->
            <div class="nx-timeline-item reveal">
                <div class="nx-timeline-spacer"></div>
                <div class="nx-timeline-dot green"></div>
                <div class="nx-timeline-right">
                    <div class="nx-timeline-card">
                        <h3 style="color:var(--nx-green);">1983 — GNU Projesi ve Özgür Yazılım</h3>
                        <p>Richard Stallman, yazılımların özel mülkiyet olmasına tepki olarak <strong>GNU (GNU's Not Unix)</strong> projesini başlattı. Terminal araçları ve derleyiciler geliştirildi; ancak eksik olan tek şey bir çekirdekti.</p>
                    </div>
                </div>
            </div>

            <!-- 1991 — Linux -->
            <div class="nx-timeline-item reveal">
                <div class="nx-timeline-left">
                    <div class="nx-timeline-card">
                        <h3 style="color:var(--nx-cyan);">1991 — Linus Torvalds Sahneye Çıkıyor</h3>
                        <p>Helsinki Üniversitesi öğrencisi Linus Torvalds, "hobi amaçlı" bir çekirdek yazmaya başladı. GNU geliştiricileri bu çekirdeği hemen GNU araçlarıyla birleştirdi. İşte <strong>GNU/Linux</strong> böyle doğdu!</p>
                    </div>
                </div>
                <div class="nx-timeline-dot" style="background:var(--nx-cyan); box-shadow:0 0 0 4px var(--nx-cyan-subtle), 0 0 20px var(--nx-cyan-glow);"></div>
                <div class="nx-timeline-spacer"></div>
            </div>

            <!-- 2000s — Server -->
            <div class="nx-timeline-item reveal">
                <div class="nx-timeline-spacer"></div>
                <div class="nx-timeline-dot purple"></div>
                <div class="nx-timeline-right">
                    <div class="nx-timeline-card">
                        <h3 style="color:var(--nx-purple);">1990'lar & 2000'ler — Sunucu Hakimiyeti</h3>
                        <p>Linux inanılmaz derecede kararlı çalışıyordu. <strong>LAMP</strong> yığını (Linux, Apache, MySQL, PHP) popülerleşti ve web sitelerinin çoğunluğu Linux üzerinde barındırılmaya başlandı.</p>
                    </div>
                </div>
            </div>

            <!-- 2008 — Android -->
            <div class="nx-timeline-item reveal">
                <div class="nx-timeline-left">
                    <div class="nx-timeline-card">
                        <h3 style="color:var(--nx-green);">2008 — Android'in Çıkışı</h3>
                        <p>Google, Linux çekirdeğinin üzerine bir mobil sistem inşa etti: Android. Dünyada en çok kullanılan tüketici işletim sistemi de teknik olarak "Linux" ekosistemine dahil oldu.</p>
                    </div>
                </div>
                <div class="nx-timeline-dot green"></div>
                <div class="nx-timeline-spacer"></div>
            </div>

            <!-- Present -->
            <div class="nx-timeline-item reveal">
                <div class="nx-timeline-spacer"></div>
                <div class="nx-timeline-dot amber"></div>
                <div class="nx-timeline-right">
                    <div class="nx-timeline-card" style="border-color:rgba(245,158,11,0.3);">
                        <h3 style="color:var(--nx-amber);">Günümüz — Masaüstü, Bulut ve AI</h3>
                        <p>Bulut bilişimin %90'ı, Top500 süper bilgisayarların <strong>%100'ü</strong> Linux kullanmaktadır. Steam Deck sayesinde oyun dünyasında da yükseliyor.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-10 reveal">
            <a href="index.php?page=architecture" class="btn-primary btn-lg">
                <i class="fa-solid fa-layer-group"></i> Linux Mimarisi Nasıl Çalışır?
            </a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
