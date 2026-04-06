<?php
// pages/history.php
require_once 'includes/header.php';
?>

<div class="container mt-5 mb-5">
    <div class="text-center mb-5">
        <h1 class="text-primary" style="font-size: 2.8rem;">Linux'un Tarihçesi</h1>
        <p class="text-muted" style="max-width: 800px; margin: 0 auto; font-size: 1.1rem;">Büyük bir oda büyüklüğündeki Unix makinelerinden cebimizdeki akıllı telefonlara kadar uzanan özgür yazılımın büyüleyici serüveni.</p>
    </div>

    <!-- Timeline Yapısı -->
    <div class="timeline-container relative" style="max-width: 900px; margin: 0 auto; padding: 20px 0;">
        
        <!-- Timeline Çizgisi -->
        <div style="position: absolute; left: 50%; top: 0; bottom: 0; width: 4px; background: var(--border-color); transform: translateX(-50%);"></div>

        <!-- UNIX (1969) -->
        <div class="timeline-item w-100 d-flex justify-between align-center mb-5" style="position: relative;">
            <div style="width: 45%; text-align: right; padding-right: 30px;">
                <h3 class="text-accent">1969 - Unix'in Doğuşu</h3>
                <p class="text-muted" style="font-size: 0.95rem;">Bell Laboratuvarlarında (Ken Thompson ve Dennis Ritchie önderliğinde) "Unix" işletim sistemi geliştirildi. Bu sistem aslen üniversiteler ve dev bilgisayarlar içindi. Çoklu görev (multitasking) konseptini başlattı fakat kapalı kaynak ve inanılmaz pahalıydı.</p>
            </div>
            <div style="width: 20px; height: 20px; background: var(--primary-color); border-radius: 50%; position: absolute; left: 50%; transform: translateX(-50%); border: 4px solid var(--bg-color);"></div>
            <div style="width: 45%;"></div>
        </div>

        <!-- GNU (1983) -->
        <div class="timeline-item w-100 d-flex justify-between align-center mb-5" style="position: relative;">
            <div style="width: 45%;"></div>
            <div style="width: 20px; height: 20px; background: var(--accent-color); border-radius: 50%; position: absolute; left: 50%; transform: translateX(-50%); border: 4px solid var(--bg-color);"></div>
            <div style="width: 45%; text-align: left; padding-left: 30px;">
                <h3 class="text-primary">1983 - GNU Projesi ve Özgür Yazılım</h3>
                <p class="text-muted" style="font-size: 0.95rem;">Richard Stallman, yazılımların özel mülkiyet olmasına tepki olarak <strong>GNU (GNU's Not Unix)</strong> projesini başlattı. Amacı, Unix'e benzeyen ama tamamen ücretsiz ve özgür bir sistem yapmaktı. Terminal araçları, derleyiciler geliştirildi; ancak eksik olan tek şey bir çekirdekti (Kernel).</p>
            </div>
        </div>

        <!-- LINUX (1991) -->
        <div class="timeline-item w-100 d-flex justify-between align-center mb-5" style="position: relative;">
            <div style="width: 45%; text-align: right; padding-right: 30px;">
                <h3 class="text-accent">1991 - Linus Torvalds Sahneye Çıkıyor</h3>
                <p class="text-muted" style="font-size: 0.95rem;">Helsinki Üniversitesi öğrencisi Linus Torvalds, kendi kişisel bilgisayarı için "hobi amaçlı" bir çekirdek yazmaya başladı. Bunu internette paylaştığında tüm dünyadan GNU geliştiricileri bu çekirdeği hemen GNU araçlarıyla birleştirdi. İşte <strong>GNU/Linux</strong> böyle doğdu!</p>
            </div>
            <div style="width: 20px; height: 20px; background: var(--primary-color); border-radius: 50%; position: absolute; left: 50%; transform: translateX(-50%); border: 4px solid var(--bg-color);"></div>
            <div style="width: 45%;"></div>
        </div>

        <!-- SERVER DOMINANCE (2000s) -->
        <div class="timeline-item w-100 d-flex justify-between align-center mb-5" style="position: relative;">
            <div style="width: 45%;"></div>
            <div style="width: 20px; height: 20px; background: var(--accent-color); border-radius: 50%; position: absolute; left: 50%; transform: translateX(-50%); border: 4px solid var(--bg-color);"></div>
            <div style="width: 45%; text-align: left; padding-left: 30px;">
                <h3 class="text-primary">1990'lar & 2000'ler - Sunucu Dünyasını Ele Geçirme</h3>
                <p class="text-muted" style="font-size: 0.95rem;">Linux geliştirildikçe, Windows NT gibi rakiplerine göre inanılmaz derecede kararlı (stabil) çalışıyordu. Web sunucularının omurgası olan <strong>LAMP</strong> yığını (Linux, Apache, MySQL, PHP) popülerleşti ve dünyadaki web sitelerinin çoğunluğu Linux üzerinde barındırılmaya başlandı.</p>
            </div>
        </div>

        <!-- ANDROID (2008) -->
        <div class="timeline-item w-100 d-flex justify-between align-center mb-5" style="position: relative;">
            <div style="width: 45%; text-align: right; padding-right: 30px;">
                <h3 class="text-accent">2008 - Android'in Çıkışı</h3>
                <p class="text-muted" style="font-size: 0.95rem;">Mobil cihazlar hızla gelişirken Google, Linux çekirdeğinin üzerine bir mobil sistem inşa etti: Android. Böylece dünyada en çok kullanılan tüketici işletim sistemi de teknik olarak "Linux" ekosistemine dahil oldu.</p>
            </div>
            <div style="width: 20px; height: 20px; background: var(--primary-color); border-radius: 50%; position: absolute; left: 50%; transform: translateX(-50%); border: 4px solid var(--bg-color);"></div>
            <div style="width: 45%;"></div>
        </div>

        <!-- PRESENT (Bugün) -->
        <div class="timeline-item w-100 d-flex justify-between align-center mb-5" style="position: relative;">
            <div style="width: 45%;"></div>
            <div style="width: 20px; height: 20px; background: #ff9f43; border-radius: 50%; position: absolute; left: 50%; transform: translateX(-50%); border: 4px solid var(--bg-color); box-shadow: 0 0 15px #ff9f43;"></div>
            <div style="width: 45%; text-align: left; padding-left: 30px;">
                <h3 style="color:#ff9f43">Günümüz - Masaüstü, Bulut ve Yapay Zekâ</h3>
                <p class="text-muted" style="font-size: 0.95rem;">Bulut bilişimin (AWS, Azure - evet Azure bile Linux çalıştırır) %90'ı, Top500 süper bilgisayarların <strong>%100'ü</strong> Linux kullanmaktadır. Masaüstünde ise oyun dağıtıcılarının (Steam Deck) Linux atılımları sayesinde, Windows tekelini kırmaya başlamış ve oyuncular / içerik üreticileri için güçlü bir alternatif haline gelmiştir.</p>
            </div>
        </div>
    </div> <!-- Timeline end -->
    
    <div class="text-center mt-5">
        <a href="index.php?page=architecture" class="btn-primary">Linux Mimarisi Nasıl Çalışır?</a>
    </div>

</div>

<style>
@media (max-width: 768px) {
    .timeline-container > div:first-child {
        left: 20px !important;
    }
    .timeline-item {
        flex-direction: column !important;
    }
    .timeline-item > div:nth-child(1), .timeline-item > div:nth-child(3) {
        width: 100% !important;
        text-align: left !important;
        padding-left: 50px !important;
        padding-right: 0 !important;
    }
    .timeline-item > div:nth-child(2) {
        left: 20px !important;
    }
}
</style>

<?php require_once 'includes/footer.php'; ?>
