<?php
// pages/use_cases.php
// Linux kullanım alanları ve senaryoları detaylı olarak incelenir.
require_once 'includes/header.php';
?>

<div class="container mt-5 mb-5">
    <div class="text-center mb-5">
        <h1 class="text-primary" style="font-size: 2.8rem;">İhtiyaca Göre Kullanım Senaryoları</h1>
        <p class="text-muted" style="max-width: 800px; margin: 0 auto; font-size: 1.1rem;">"En iyi Linux dağıtımı hangisi?" sorusunun tek bir cevabı yoktur. Cevap tamamen sizin onu ne için kullanacağınıza bağlıdır.</p>
    </div>

    <!-- Senaryolar -->
    <div style="display:flex; flex-direction:column; gap:40px;">

        <!-- 1. Yazılım Geliştirme (Software Development) -->
        <div class="card d-flex" style="flex-direction:row; align-items:center; gap:30px; background: rgba(59, 130, 246, 0.05); border-left: 5px solid var(--primary-color);">
            <div style="width: 150px; text-align:center;">
                <i class="fa-solid fa-code" style="font-size: 5rem; color: var(--primary-color);"></i>
            </div>
            <div style="flex-grow:1;">
                <h3 class="text-primary mb-2">Yazılım Geliştirme (Development / DevOps)</h3>
                <p class="text-muted mb-3">Linux, programcılar tarafından programcılar için tasarlanmıştır. Docker ve Kubernetes gibi günümüzün standart altyapıları yerel (native) olarak Linux üzerinde çalışır (Windows ve Mac'te sadece sanallaştırma ile). Python, Rust, Go, C++ derleyicileri kutudan çıkar çıkmaz terminalinizdedir.</p>
                <div>
                    <strong>Öne Çıkan Dağıtımlar:</strong> Ubuntu (Geniş kütüphane), Fedora (Güncel araçlar), Arch Linux (Tam kontrol).
                </div>
            </div>
        </div>

        <!-- 2. Oyun (Gaming) -->
        <div class="card d-flex" style="flex-direction:row; align-items:center; gap:30px; background: rgba(139, 92, 246, 0.05); border-left: 5px solid #8b5cf6;">
            <div style="width: 150px; text-align:center;">
                <i class="fa-solid fa-gamepad" style="font-size: 5rem; color: #8b5cf6;"></i>
            </div>
            <div style="flex-grow:1;">
                <h3 style="color:#8b5cf6; margin-bottom:10px;">Oyun & Eğlence (Gaming)</h3>
                <p class="text-muted mb-3">Eskiden "Linux'ta oyun oynanmaz" tabusu hakimdi. Ancak Valve'in Proton uyumluluk katmanı ve Steam Deck'in çıkışıyla işler değişti. Steam kütüphanenizin %85'inden fazlası (Elden Ring, Cyberpunk 2077 vb.) bazen Windows'tan bile daha yüksek FPS ile çalışabiliyor. Sadece bazı rekabetçi oyunların (Valorant) Anti-Cheat motorları bilerek Linux'u engellemektedir.</p>
                <div>
                    <strong>Öne Çıkan Dağıtımlar:</strong> Pop!_OS (Dâhilî NVIDIA Sürücüleri), Nobara Linux, ChimeraOS.
                </div>
            </div>
        </div>

        <!-- 3. Siber Güvenlik (Penetration Testing) -->
        <div class="card d-flex" style="flex-direction:row; align-items:center; gap:30px; background: rgba(236, 72, 153, 0.05); border-left: 5px solid #ec4899;">
            <div style="width: 150px; text-align:center;">
                <i class="fa-solid fa-mask" style="font-size: 5rem; color: #ec4899;"></i>
            </div>
            <div style="flex-grow:1;">
                <h3 style="color:#ec4899; margin-bottom:10px;">Siber Güvenlik (Pentest / Hacking)</h3>
                <p class="text-muted mb-3">Ağ trafiğini manipüle etme, Wi-Fi kırma veya zafiyet analizi araçları yüksek ayrıcalıklı ağ yetkilerine ihtiyaç duyar. Linux çekirdeği (Kernel) ağ modüllerini (Network Stack) doğrudan manipüle etmeye izin verir. Bu araçlar özel sistemlerde toplanmıştır, bu sayede siber güvenlik uzmanlarının saatlerce alet kurmasına gerek kalmaz.</p>
                <div>
                    <strong>Öne Çıkan Dağıtımlar:</strong> Kali Linux (Endüstri Standardı), Parrot OS (Günlük kullanıma bir tık daha uygun).
                </div>
            </div>
        </div>

        <!-- 4. Sunucu İşletmesi (Server) -->
        <div class="card d-flex" style="flex-direction:row; align-items:center; gap:30px; background: rgba(245, 158, 11, 0.05); border-left: 5px solid #f59e0b;">
            <div style="width: 150px; text-align:center;">
                <i class="fa-solid fa-server" style="font-size: 5rem; color: #f59e0b;"></i>
            </div>
            <div style="flex-grow:1;">
                <h3 style="color:#f59e0b; margin-bottom:10px;">Sunucu ve Bulut Yönetimi</h3>
                <p class="text-muted mb-3">Masaüstü ortamı (GUI) kurulu olmadığı için boşta sadece 100MB civarı RAM tüketen Linux sunucuları, yıllar boyunca kapatılmadan inanılmaz bir hızla hizmet verebilirler. İnternette gezdiğiniz sistemlerin tamamına yakını bu görünmez kahramanların üzerinde çalışır.</p>
                <div>
                    <strong>Öne Çıkan Dağıtımlar:</strong> Debian (Efsanevi stabilite), CentOS Stream, Ubuntu Server, Alpine Linux (Aşırı küçük).
                </div>
            </div>
        </div>

        <!-- 5. Eski Bilgisayarları Diriltmek -->
        <div class="card d-flex" style="flex-direction:row; align-items:center; gap:30px; background: rgba(16, 185, 129, 0.05); border-left: 5px solid #10b981;">
            <div style="width: 150px; text-align:center;">
                <i class="fa-solid fa-laptop-medical" style="font-size: 5rem; color: #10b981;"></i>
            </div>
            <div style="flex-grow:1;">
                <h3 style="color:#10b981; margin-bottom:10px;">Eski Bilgisayarları Diriltmek</h3>
                <p class="text-muted mb-3">15 yıllık bir Windows laptop düşünün; tarayıcı açması bile dakikalar alır. İşletim sisteminin gereksiz arka plan hizmetlerinden arındırıldığı çok hafif (XFCE, LXQt masaüstüne sahip) bir Linux kurarak onu sıfır gibi hızlı yapabilirsiniz (Özellikle bir SSD eklerseniz).</p>
                <div>
                    <strong>Öne Çıkan Dağıtımlar:</strong> Lubuntu, Xubuntu, Linux Lite, antiX.
                </div>
            </div>
        </div>

    </div>

    <!-- CTA -->
    <div class="text-center mt-5 p-5 card" style="background: rgba(11, 15, 25, 0.8); border: 1px solid var(--border-color);">
        <h2 class="text-primary mb-3">Kafanız Karıştıysa Bize Bırakın</h2>
        <p class="text-muted mb-4" style="max-width: 600px; margin: 0 auto;">Yukarıdaki senaryoları tam anlamlandıramadıysanız, sizi yapay zekâ destekli analiz testimize alalım. İhtiyaçlarınızı işaretleyin, size en uygun sistemi yüzdelik uygunluk oranıyla sunalım.</p>
        <a href="index.php?page=quiz" class="btn-highlight" style="font-size: 1.1rem; padding: 12px 30px;"><i class="fa-solid fa-bolt"></i> Hangi Linux'u Seçmeliyim? (Test)</a>
    </div>

</div>

<style>
@media(max-width:768px){
    .card.d-flex { flex-direction:column !important; text-align:center; padding:30px 15px;}
    .card.d-flex > div:first-child { width:100% !important; margin-bottom:20px; }
}
</style>

<?php require_once 'includes/footer.php'; ?>
