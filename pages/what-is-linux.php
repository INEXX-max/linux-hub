<?php
// pages/what-is-linux.php — NEXOS Premium Content Page
require_once 'includes/header.php';
require_once 'includes/section-title.php';
?>

<section class="nx-page-hero nx-bg-grid">
    <div class="nx-glow-orb nx-glow-orb-blue" style="top:-30%; right:10%;"></div>
    <div class="container">
        <div class="nx-hero-label mx-auto" style="display:inline-flex;"><i class="fa-solid fa-book-open"></i> Temel Bilgi</div>
        <h1 class="nx-text-gradient-static">Linux Nedir?</h1>
        <p>Açık kaynaklı, güçlü ve özgür — dünyayı sessizce yöneten işletim sistemi çekirdeği.</p>
    </div>
</section>

<section class="nx-section-sm">
    <div class="container">
        <div class="nx-article-layout">
            <!-- Sidebar -->
            <aside class="nx-article-sidebar">
                <div class="nx-card" style="padding:var(--nx-sp-5);">
                    <h4 class="text-primary mb-4" style="font-size:var(--nx-fs-sm);">İÇİNDEKİLER</h4>
                    <ul>
                        <li><a href="#tanim">Linux Nedir?</a></li>
                        <li><a href="#cekirdek">Çekirdek vs Dağıtım</a></li>
                        <li><a href="#acik-kaynak">Açık Kaynak Mantığı</a></li>
                        <li><a href="#avantajlar">Temel Avantajları</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Article Body -->
            <article class="nx-article-body reveal">
                <h1 id="tanim" style="font-size:var(--nx-fs-3xl); color:var(--nx-blue); margin-bottom:var(--nx-sp-6);">Linux Nedir?</h1>
                
                <p>Linux, bilgisayarlar, sunucular, akıllı telefonlar (Android aracılığıyla), gömülü sistemler ve hatta arabalar dâhil olmak üzere sayısız cihazda çalışan, UNIX benzeri açık kaynaklı bir işletim sistemi çekirdeğidir (kernel). Linus Torvalds tarafından 1991 yılında geliştirilen Linux, bugün dünyadaki en büyük ortak çalışma yazılım projesidir.</p>

                <h2 id="cekirdek">İşletim Sistemi Değil, Çekirdek (Kernel)</h2>
                <p>Çoğu zaman "Linux" denildiğinde tam teşekküllü bir işletim sistemi (örneğin Ubuntu, Fedora) kastedilse de, teknik olarak Linux <strong>sadece bir kernel'dir</strong>. Kernel, cihazın donanımı (CPU, RAM, Disk) ile yazılımı arasındaki iletişimi sağlayan temel çekirdektir.</p>
                <p>Bir Linux işletim sistemi oluşturmak için Linux çekirdeğinin üzerine GNU projesinden gelen temel araçlar, masaüstü ortamları (GNOME, KDE) ve kullanıcı yazılımları (Tarayıcı, LibreOffice vb.) eklenir. Bu paket halinde sunulan bütüne <strong>Linux Dağıtımı (Distribution / Distro)</strong> denir.</p>

                <h2 id="acik-kaynak">Açık Kaynak (Open Source) Felsefesi</h2>
                <p>Linux sadece bir kod yığını değil, aynı zamanda bilgi paylaşımının manifestosudur. Açık kaynak kodlu demek, Linux çekirdeğinin kodlarının herkes tarafından okunabilir, değiştirilebilir ve dağıtılabilir olması anlamına gelir.</p>
                
                <div class="nx-alert" style="margin:var(--nx-sp-6) 0;">
                    <strong><i class="fa-solid fa-shield-halved"></i> Gerçek Sistem Hâkimi Sizsiniz</strong><br><br>
                    Kapalı kaynaklı sistemlerde arka planda telemetri verilerinizin neden toplandığını bilemez veya sistemi engelleyemezsiniz. Linux'ta ise kod açıktır; isterseniz bir servisi silebilir, çekirdeği yeniden derleyebilir, her şeyi şeffaf bir şekilde yönetebilirsiniz.
                </div>

                <h2 id="avantajlar">Temel Avantajları</h2>
                <div class="grid grid-2 gap-5" style="margin-top:var(--nx-sp-5);">
                    <div class="nx-card-glow" style="padding:var(--nx-sp-6);">
                        <div class="nx-icon-box nx-icon-box-green mb-3" style="width:42px; height:42px;"><i class="fa-solid fa-shield"></i></div>
                        <h4>Yüksek Güvenlik</h4>
                        <p class="text-muted mb-0" style="font-size:var(--nx-fs-sm);">Dosya izinleri ve modüler yapısı sayesinde virüslere karşı çok dirençlidir.</p>
                    </div>
                    <div class="nx-card-glow" style="padding:var(--nx-sp-6);">
                        <div class="nx-icon-box nx-icon-box-blue mb-3" style="width:42px; height:42px;"><i class="fa-solid fa-server"></i></div>
                        <h4>Stabilite</h4>
                        <p class="text-muted mb-0" style="font-size:var(--nx-fs-sm);">Linux sistemleri yeniden başlatılmadan yıllarca açık kalabilir.</p>
                    </div>
                    <div class="nx-card-glow" style="padding:var(--nx-sp-6);">
                        <div class="nx-icon-box nx-icon-box-purple mb-3" style="width:42px; height:42px;"><i class="fa-solid fa-laptop-code"></i></div>
                        <h4>Geliştirici Dostu</h4>
                        <p class="text-muted mb-0" style="font-size:var(--nx-fs-sm);">Tüm yazılımcı araçlarına tek terminal komutuyla erişilir.</p>
                    </div>
                    <div class="nx-card-glow" style="padding:var(--nx-sp-6);">
                        <div class="nx-icon-box nx-icon-box-cyan mb-3" style="width:42px; height:42px;"><i class="fa-solid fa-leaf"></i></div>
                        <h4>Özgürlük</h4>
                        <p class="text-muted mb-0" style="font-size:var(--nx-fs-sm);">Lisans ücreti yok. %99'u tamamen ücretsizdir.</p>
                    </div>
                </div>

                <div class="text-center mt-10">
                    <a href="index.php?page=history" class="btn-gradient">
                        Linux'un Tarihçesini Öğren <i class="fa-solid fa-arrow-right" style="margin-left:6px;"></i>
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
