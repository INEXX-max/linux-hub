<?php
// pages/architecture.php
require_once 'includes/header.php';
?>

<div class="container mt-5 mb-5">
    
    <div class="text-center mb-5">
        <h1 class="text-primary" style="font-size: 2.8rem;">İçeride Neler Oluyor?</h1>
        <p class="text-muted" style="font-size: 1.1rem;">Linux Mimarisi, her bir donanımın ve yazılımın mükemmel bir hiyerarşi içinde nasıl iletişim kurduğunu gösteren muazzam bir mühendislik harikasıdır.</p>
    </div>

    <!-- Mimari Katmanları Görselleştirmesi -->
    <div class="architecture-layers" style="max-width: 600px; margin: 0 auto 50px auto; text-align:center;">
        
        <!-- User Space / GUI -->
        <div class="layer-gui" style="background:#575fcf; padding: 20px; border-radius: 12px 12px 0 0; border: 2px solid #575fcf; font-weight:bold; font-size:1.2rem; color:#fff;">
            User Space (Uygulamalar, GUI, Tarayıcılar)
        </div>
        
        <!-- Shell & Utilities (GNU) -->
        <div class="layer-shell" style="background:#0fb9b1; padding: 15px; border-left: 2px solid #0fb9b1; border-right: 2px solid #0fb9b1; font-weight:bold; color:#fff;">
            Shell (Bash / Zsh) & GNU Araçları
        </div>

        <!-- The Kernel Space -->
        <div class="layer-kernel" style="background:#f53b57; padding: 25px; border-left: 2px solid #f53b57; border-right: 2px solid #f53b57; font-weight:bold; font-size:1.3rem; color:#fff;">
            Linux Kernel (Çekirdek - Kalp)
            <div style="font-size:0.85rem; font-weight:normal; margin-top:5px; color:#f8d5d8;">Bellek Yönetimi, Süreçler, Sürücüler, Ağ</div>
        </div>

        <!-- Hardware -->
        <div class="layer-hw" style="background:#485460; padding: 20px; border-radius: 0 0 12px 12px; border: 2px solid #485460; font-weight:bold; color:#fff; display:flex; justify-content:center; gap:20px;">
            <span><i class="fa-solid fa-microchip"></i> CPU</span>
            <span><i class="fa-solid fa-memory"></i> RAM</span>
            <span><i class="fa-solid fa-hard-drive"></i> SSD</span>
        </div>

    </div>

    <!-- Detaylı Açıklamalar Grid -->
    <div class="architecture-details">
        
        <h2 class="mb-4 text-accent" style="border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">Temel Bileşenler</h2>

        <div class="layout-grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <div class="card">
                <h4><i class="fa-solid fa-heart-pulse text-primary"></i> The Kernel (Çekirdek)</h4>
                <p class="text-muted" style="font-size:0.95rem;">Donanım ile doğrudan iletişim kuran sistemin beynidir. Memory management (RAM tahsisi), süreç (process) planlama, donanım sürücüleri (drivers) burada bulunur. Sistemin donmaması büyük oranda bu katmanın güvenilirliğindendir.</p>
            </div>
            
            <div class="card">
                <h4><i class="fa-solid fa-terminal text-primary"></i> Shell (Kabuk)</h4>
                <p class="text-muted" style="font-size:0.95rem;">Kullanıcı komutlarını alıp kernel'ın anlayacağı dile çeviren arayüzdür. <code>Bash</code> en yaygın olanıdır. Grafiksel ortam (GUI) çökse bile sistem arkada Shell ile mükemmel çalışmaya devam eder.</p>
            </div>

            <div class="card">
                <h4><i class="fa-solid fa-folder-tree text-primary"></i> Dosya Sistemi Hiyerarşisi</h4>
                <p class="text-muted" style="font-size:0.95rem;">Windows'taki (C: veya D:) sürücü harfleri burada yoktur. Her şey kök dizinden <code>/</code> (Root) başlar. <code>/home</code> kullanıcı dosyalarını, <code>/etc</code> ayar dosyalarını, <code>/var</code> logları tutar. "Her şey bir dosyadır" felsefesi esastır.</p>
            </div>
            
            <div class="card">
                <h4><i class="fa-solid fa-box-open text-primary"></i> Paket Yöneticileri (Package Manager)</h4>
                <p class="text-muted" style="font-size:0.95rem;">Yazılım kurmanın güvenli yoludur. <code>APT</code> (Debian/Ubuntu), <code>DNF</code> (Fedora) veya <code>Pacman</code> (Arch). İnternette ".exe" arayıp virüs tehlikesi yaşamak yerine, güvenli resmi depolardan komutla bağımlılık sorunları yaşanmadan yazılım kurmanızı sağlar.</p>
            </div>

            <div class="card">
                <h4><i class="fa-solid fa-users-gear text-primary"></i> Root ve İzin Sistemi</h4>
                <p class="text-muted" style="font-size:0.95rem;">Linux çok kullanıcılı (multi-user) olarak doğmuştur. En tepede Tanrı yetkisi olan <strong><code>root</code></strong> kullanıcısı vardır. Normal kullanıcılar zararlı bir dosya indirse bile <code>sudo</code> (root izni) olmadan o dosya sisteme hiçbir zarar veremez.</p>
            </div>

            <div class="card">
                <h4><i class="fa-solid fa-window-restore text-primary"></i> GUI vs CLI Farkları</h4>
                <p class="text-muted" style="font-size:0.95rem;">Windows'ta Masaüstü ortadan kalkarsa sistem kullanılamaz. Linux'ta Ekran Görüntü Sunucusu (Xorg/Wayland) ve Masaüstü ortamı (GNOME/KDE) sadece kernel üstünde çalışan sıradan programlardır. İstenirse silinebilir (Sunucularda GUI olmaz).</p>
            </div>
        </div>

        <h2 class="mt-5 mb-4 text-accent" style="border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">Neden Yenilmez (Güvenilir)?</h2>
        <ul style="list-style:none; padding-left:10px;">
            <li class="mb-3 d-flex"><i class="fa-solid fa-circle-check text-primary" style="margin-top:5px; margin-right:15px;"></i> <div><strong>İzole Süreçler (Process Isolation):</strong> Bir program (örneğin Firefox) çökerse, sadece kendisi kapanır. Belleği bozan uygulama tüm sistemi mavi ekrana (kernel panic) sokmaz.</div></li>
            <li class="mb-3 d-flex"><i class="fa-solid fa-circle-check text-primary" style="margin-top:5px; margin-right:15px;"></i> <div><strong>Geliştirici Odaklı (Developer Friendly):</strong> Açık kaynaklı olduğu için dünya çapındaki siber güvenlikçiler (Pentester, Hackerlar) güvenlik açığı bulduğunda, bunu Microsoft gibi aylarca bekletmeden dakikalar içinde yamalayabilir.</div></li>
            <li class="mb-3 d-flex"><i class="fa-solid fa-circle-check text-primary" style="margin-top:5px; margin-right:15px;"></i> <div><strong>Sıfır Parçalanma:</strong> NT dosya sistemi gibi Disk Birleştirme (Defrag) gerektirmez. EXT4 / BTRFS dosya sistemleri verileri öyle bir yazar ki, hiçbir zaman fragmentasyona uğramaz ve yıllarca %100 hızda çalışır.</div></li>
        </ul>

    </div>

</div>

<?php require_once 'includes/footer.php'; ?>
