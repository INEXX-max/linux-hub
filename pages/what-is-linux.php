<?php
// pages/what-is-linux.php
require_once 'includes/header.php';
?>

<div class="container mt-5 mb-5">
    <div class="layout-grid" style="display: grid; grid-template-columns: 250px 1fr; gap: 40px; position:relative;">
        
        <!-- Sidebar - Table of Contents -->
        <aside class="sidebar-nav" style="position: sticky; top: 100px; height: fit-content;">
            <div class="card" style="padding: 20px;">
                <h4 class="text-primary mb-3">İçindekiler</h4>
                <ul style="list-style: none;">
                    <li class="mb-2"><a href="#tanim" class="text-muted">Linux Nedir?</a></li>
                    <li class="mb-2"><a href="#cekirdek" class="text-muted">Çekirdek vs Dağıtım</a></li>
                    <li class="mb-2"><a href="#acik-kaynak" class="text-muted">Açık Kaynak Mantığı</a></li>
                    <li class="mb-2"><a href="#avantajlar" class="text-muted">Temel Avantajları</a></li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <article class="content-article card" style="padding: 40px;">
            <h1 class="text-primary" style="font-size: 2.5rem; margin-bottom: 20px;" id="tanim">Linux Nedir?</h1>
            
            <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
                Linux, bilgisayarlar, sunucular, akıllı telefonlar (Android aracılığıyla), gömülü sistemler ve hatta arabalar dâhil olmak üzere sayısız cihazda çalışan, UNIX benzeri açık kaynaklı bir işletim sistemi çekirdeğidir (kernel). Linus Torvalds tarafından 1991 yılında geliştirilen Linux, bugün dünyadaki en büyük ortak çalışma yazılım projesidir.
            </p>

            <h2 id="cekirdek" class="mt-5 mb-3 text-accent">İşletim Sistemi Değil, Çekirdek (Kernel)</h2>
            <p style="line-height: 1.8; margin-bottom: 15px;">
                Çoğu zaman "Linux" denildiğinde tam teşekküllü bir işletim sistemi (örneğin Ubuntu, Fedora) kastedilse de, teknik olarak Linux <strong>sadece bir kernel'dir</strong>. Kernel, cihazın donanımı (CPU, RAM, Disk) ile yazılımı arasındaki iletişimi sağlayan temel çekirdektir.
            </p>
            <p style="line-height: 1.8; margin-bottom: 20px;">
                Bir Linux işletim sistemi oluşturmak için Linux çekirdeğinin üzerine GNU projesinden gelen temel araçlar, masaüstü ortamları (GNOME, KDE) ve kullanıcı yazılımları (Tarayıcı, LibreOffice vb.) eklenir. Bu paket halinde sunulan bütüne <strong>Linux Dağıtımı (Distribution / Distro)</strong> denir.
            </p>

            <h2 id="acik-kaynak" class="mt-5 mb-3 text-accent">Açık Kaynak (Open Source) Felsefesi</h2>
            <p style="line-height: 1.8; margin-bottom: 20px;">
                Linux sadece bir kod yığını değil, aynı zamanda bilgi paylaşımının manifestosudur. Açık kaynak kodlu demek, Linux çekirdeğinin kodlarının herkes tarafından okunabilir, değiştirilebilir ve dağıtılabilir olması anlamına gelir. IBM, Google, Microsoft, Intel gibi dünya devlerinin yanı sıra bağımsız binlerce gönüllü, her saniye Linux'u daha iyi ve güvenli yapmak için kod yazmaktadır.
            </p>

            <div class="alert mt-4 mb-4" style="background: rgba(59, 130, 246, 0.1); border-left: 4px solid var(--primary-color); padding: 20px;">
                <strong>Gerçek Sistem Hâkimi Sizsiniz</strong><br><br>
                Kapalı kaynaklı sistemlerde arka planda telemetri verilerinizin neden toplandığını bilemez veya sistemi engelleyemezsiniz. Linux'ta ise kod açıktır; isterseniz bir servisi silebilir, çekirdeği yeniden derleyebilir, her şeyi şeffaf bir şekilde yönetebilirsiniz.
            </div>

            <h2 id="avantajlar" class="mt-5 mb-3 text-accent">Temel Avantajları</h2>
            
            <div class="features-grid" style="grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="background: var(--surface-light); padding: 20px; border-radius:8px;">
                    <h4><i class="fa-solid fa-shield text-primary"></i> Yüksek Güvenlik</h4>
                    <p class="text-muted" style="font-size:0.95rem;">Dosya izinleri ve modüler yapısı sayesinde virüslere karşı çok dirençlidir. Antivirüs kullanmak genellikle gerekmez.</p>
                </div>
                <div style="background: var(--surface-light); padding: 20px; border-radius:8px;">
                    <h4><i class="fa-solid fa-server text-primary"></i> Stabilite</h4>
                    <p class="text-muted" style="font-size:0.95rem;">Linux sunucuları ve sistemleri, mavi ekran (BSOD) vermeden, sistem yeniden başlatılmadan yıllarca açık kalabilir.</p>
                </div>
                <div style="background: var(--surface-light); padding: 20px; border-radius:8px;">
                    <h4><i class="fa-solid fa-laptop-code text-primary"></i> Geliştirici Dostu</h4>
                    <p class="text-muted" style="font-size:0.95rem;">Programlama dilleri derleyicileri, paket yöneticileri gibi tüm temel yazılımcı araçlarına tek terminal komutuyla erişilir.</p>
                </div>
                <div style="background: var(--surface-light); padding: 20px; border-radius:8px;">
                    <h4><i class="fa-solid fa-leaf text-primary"></i> Özgürlük</h4>
                    <p class="text-muted" style="font-size:0.95rem;">Aylık veya yıllık lisans ücretleri ödemenize gerek yoktur. Temel işletim sistemi ve uygulamalarının %99'u tamamen ücretsizdir.</p>
                </div>
            </div>

            <div class="mt-5 text-center">
                <a href="index.php?page=history" class="btn-highlight">Linux'un Tarihçesini Öğren <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            
        </article>
    </div>
</div>

<style>
@media (max-width: 992px) {
    .layout-grid {
        grid-template-columns: 1fr !important;
    }
    .sidebar-nav {
        display:none; /* Mobilde sidebar gizle alanı açsın */
    }
}
</style>

<?php require_once 'includes/footer.php'; ?>
